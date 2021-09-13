<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class ValidationQuestionController extends Controller{
    function ValidationController(Request $request){
        $data = [];
        $i = 0;

        $d = $request->toArray();
        
        // dd($d['id_page']);
        
        $q_id = DB::table('question')
            ->join('category','question.id_category','category.id_category')
            ->join('page','category.id_page','page.id_page')
            ->where('page.id_page',$d['id_page'])
            ->select([
                'question.id_question'
            ])
            ->get();
            // dd($q_id);
        foreach($q_id as $q){
            // $format = [$q->id_question => 'required'];
            // $data = array_push($data, $format);
            $data['soal' . $q->id_question] = 'required';
        }
        // dd($data);

        $f =  $request->validate($data);    
        
        $get_count_page = DB::table('page')
            ->count();
        $next_page = $d['id_page'] + 1;

        if($get_count_page == $d['id_page']){
            return response()->json([
                'code' => 500,
            ]);
        }else{
            return response()->json([
                'code'  => 200,
                'next_page' => $next_page
            ]);
        }
    }

    function BackPageCheck(Request $request){
        
    }
}