<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use DB;

class QuestionController extends Controller{
    function QuestionIndex(){
        $page = DB::table('page')
            ->get();

        $data_page = [];
        $i = 0;

        foreach($page as $d){
            $data_page[$i] = [ 
               'id_page' => $d->id_page,
               'name'    => $d->name
            ];
            $i++;
        }  

        $category = DB::table('category')
            ->get();
        $data_category = [];
        $j = 0;

        foreach($category as $d){
            $data_category[$j] =[
                'id'        => $d->id_category,
                'id_page'   => $d->id_page,
                'name'      => $d->name
            ];
            $j++;
        }

        $question = DB::table('question')
            ->get();
        
        $data_question = [];
        $k = 0;

        foreach($question as $d){
            $data_question[$k] = [
                'id'            => $d->id_question,
                'id_category'   => $d->id_category,
                'question'      => $d->question
            ];
            $k++;
        }
        // dd($data_question);
        return view('question.question', compact('data_page','data_category','data_question'));
    }

    function QuestionIndexExpert(){
        $page = DB::table('page')
            ->get();

        $data_page = [];
        $i = 0;

        foreach($page as $d){
            $data_page[$i] = [ 
               'id_page' => $d->id_page,
               'name'    => $d->name
            ];
            $i++;
        }  

        $category = DB::table('category')
            ->get();
        $data_category = [];
        $j = 0;

        foreach($category as $d){
            $data_category[$j] =[
                'id'        => $d->id_category,
                'id_page'   => $d->id_page,
                'name'      => $d->name
            ];
            $j++;
        }

        $question = DB::table('question')
            ->get();
        
        $data_question = [];
        $k = 0;

        foreach($question as $d){
            $data_question[$k] = [
                'id'            => $d->id_question,
                'id_category'   => $d->id_category,
                'question'      => $d->question
            ];
            $k++;
        }
        // dd($data_question);
        return view('question.question-expert', compact('data_page','data_category','data_question'));
    }
}