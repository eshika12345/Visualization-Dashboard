<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FilterController extends Controller
{
    public static function end_year(){
    $endYear = DB::table('data_tbl')->select('end_year')->groupBy('end_year')->get();
    return view('end-year',["end_year"=>$endYear]);
    }
    public static function end_yearSubmit(Request $request){
        $endYear = DB::table('data_tbl')->where('end_year',$request->end_year)->get();
        return view('table',["endYearData"=>$endYear]);
    }
    public static function topic(){
        $topic = DB::table('data_tbl')->select('topic')->groupBy('topic')->get();
        return view('topic',["topic"=>$topic]);
    }
    public static function topicSubmit(Request $request){
        $topicData = DB::table('data_tbl')->where('topic',$request->topic)->get();
        return view('tableByTopic',["topicData"=>$topicData]);
    }
}
