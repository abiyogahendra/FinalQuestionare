<?php

namespace App\Http\Controllers\Modal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ReportIndexController extends Controller
{
    function IndexModalReport(Request $request){
        $category = DB::table('question')
            ->join('category', 'question.id_category','category.id_category')
            ->select([
                'question.id_category',
                'category.name',
                DB::raw('count(question.question) as j_quest')
                ])
            ->groupBy([
                'question.id_category',
                'category.name',
            ])
            ->get();

        $answer = DB::table('answer')
            ->where('answer.id_respondent',$request->id_respondent)
            ->join('question', 'answer.id_question','question.id_question')
            ->select([
                'answer.answer',
                'question.question',
                'question.id_question',
                'question.id_category'
            ])
            ->get();

        foreach($answer as $d){
            if($d->answer == 5){
                $jawaban[$d->id_question] = 'Sangat Tidak Sesuai';
            }
            elseif($d->answer == 4){
                $jawaban[$d->id_question] = 'Tidak Sesuai';
            }
            elseif($d->answer == 3){
                $jawaban[$d->id_question] = 'Normal';
            }
            elseif($d->answer == 2){
                $jawaban[$d->id_question] = 'Sesuai';
            }
            elseif($d->answer == 1){
                $jawaban[$d->id_question] = 'Sangat Sesuai';
            }
        }
       
        return view('admin.modal.report-modal', compact('category','answer','jawaban'));

    }
}