<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public static function dashboard(){
    $data = DB::table('data_tbl')->orderBy('intensity', 'DESC')->limit(4)->get();
    $env = DB::table('data_tbl')->select('pestle')->groupBy('pestle')->get()->toArray();
    $likelihood = DB::table('data_tbl')->select('pestle', DB::raw('count(*) as total'))->groupBy('pestle')->get();
    $sector = DB::table('data_tbl')->select('sector', DB::raw('round(avg(data_tbl.relevance)) as relevance'))->groupBy('sector')->get();
    $year = DB::table('data_tbl')->select('end_year',DB::raw('count(*) as total'))->groupBy('end_year')->get();
    $country = DB::table('data_tbl')->select('country', DB::raw('count(*) as total'))->groupBy('country')->get();
    return view('dashboard',["data"=>$data,"sector"=>$sector,"year"=>$year,"country"=>$country])
    ->with('env',json_encode($env,JSON_NUMERIC_CHECK))
    ->with('likelihood',json_encode($likelihood,JSON_NUMERIC_CHECK));
    //return $country;
    }
}
