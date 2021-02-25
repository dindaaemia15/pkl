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
                  ->join('kotas','kotas.id_provinsi','=','provinsis.id')
                  ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
                  ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
                  ->join('rws','rws.id_kelurahan','=','kelurahans.id')
                  ->join('trackings','trackings.id_rw','=','rws.id')
                  ->select('nama_provinsi',
                          DB::raw('SUM(trackings.positif) as Positif'),
                          DB::raw('SUM(trackings.sembuh) as Sembuh'),
                          DB::raw('SUM(trackings.meninggal) as Meninggal'))
                  ->groupBy('nama_provinsi')->orderBy('nama_provinsi','ASC')
                  ->get();

        // Table Global
        $datadunia= file_get_contents("https://api.kawalcorona.com/");
        $dunia = json_decode($datadunia, TRUE);
            
        return view('dashboard.index',compact('positif','sembuh','meninggal','posglobal', 'tanggal','tampil','dunia'));
    }

    
}