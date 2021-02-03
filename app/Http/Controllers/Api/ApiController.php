<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Rw;
use App\Models\Tarcking;
use DB;

class ApiController extends Controller
{
    public function Rw()
    {
        $rw = DB::table('trackings')
               ->select([
                   DB::raw('SUM(positif) as Positif'),
                   DB::raw('SUM(sembuh) as sembuh'),
                   DB::raw('SUM(meninggal) as Meninggal'),   
               ])
               ->groupBy('tanggal')->get();
        $positif = DB::table('rws')
               ->select('trackings.positiif',
               'trackings.sembuh','trackings.meninggal')
               ->join('trackings','rws.id','=','trackings.id_rw')
               ->sum('trackings.positif');
        $sembuh = DB::table('rws')
               ->select('trackings.positiif',
               'trackings.sembuh','trackings.meninggal')
               ->join('trackings','rws.id','=','trackings.id_rw')
               ->sum('trackings.sembuh');
        $meninggal = DB::table('rws')
               ->select('trackings.positiif',
               'trackings.sembuh','trackings.meninggal')
               ->join('trackings','rws.id','=','trackings.id_rw')
               ->sum('trackings.meninggal');
            return response([
                'success' => true,
                'data' => ['Hari Ini' => $rw,
                          ],
                'Total' => [ 'Jumlah Positif'   => $positif,
                             'Jumlah Sembuh'    => $sembuh,
                             'Jumlah Meninggal' => $meninggal,
                           ],
                'message' => 'Berhasil'
            ], 200);
    }
}
