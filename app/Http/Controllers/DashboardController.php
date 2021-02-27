<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Models\Provinsi;
use App\Http\Models\RW;
use App\Http\Models\Tracking;
use DB;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{

    public function index()
    {
        // Count Up
        $positif = DB::table('trackings')
            ->sum('positif'); 
        $sembuh = DB::table('trackings')
            ->sum('sembuh');
        $meninggal = DB::table('trackings')
            ->sum('meninggal');

        $global = file_get_contents('https://api.kawalcorona.com/positif');
        $posglobal = json_decode($global, TRUE);

        // Date
        $tanggal = Carbon::now()->format('D d-M-Y');

        // Table Provinsi
        $tampil = DB::table('provinsis')
        ->select('provinsis.id', 'provinsis.nama_provinsi', 'provinsis.kode_provinsi',
            DB::raw('sum(trackings.positif) as positif'),
            DB::raw('sum(trackings.sembuh) as sembuh'),
            DB::raw('sum(trackings.meninggal) as meninggal'))
                ->join('kotas', 'provinsis.id', '=', 'kotas.id_provinsi')
                ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
                ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
                ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
                ->join('trackings', 'rws.id', '=', 'trackings.id_rw')
        ->groupBy('provinsis.id')
        ->get();

        // Table Global
        $datadunia= file_get_contents("https://api.kawalcorona.com/");
        $dunia = json_decode($datadunia, TRUE);
            
        return view('dashboard.index',compact('positif','sembuh','meninggal','posglobal', 'tanggal','tampil','dunia'));
    }

    
}