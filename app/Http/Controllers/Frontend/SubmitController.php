<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Carbon\Carbon;

class SubmitController extends Controller{
    function SubmitAllData(Request $request){
        // dd($request);
        $registrasi = explode(';', $request['data_diri']);
        $id_respondent = DB::table('respondent')
            ->insertGetId([
                'name'          => $registrasi[0],
                'jenkel'        => $registrasi[1],
                'umur'          => $registrasi[2],
                'email'         => $registrasi[3],
                'phone_number'  => $registrasi[4],
                'pekerjaan'     => $registrasi[5],
                'pengalaman'    => $registrasi[6],
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]);
       
        $id_q = DB::table('question')
            ->select([
                'id_question'
            ])
            ->get();
            
        $i = 0;
        foreach($id_q as $d){
            $array[$i] = [
                    'id_respondent'     => $id_respondent,
                    'id_question'       => $d->id_question,
                    'answer'            => $request['soal' .$d->id_question],
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),

            ];
            $i++;
        }
        
        DB::table('answer')
            ->insert($array);
        
        return response()->json([
            'code'      =>200
        ]);
    }
}