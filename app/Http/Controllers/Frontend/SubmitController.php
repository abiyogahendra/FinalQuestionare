<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Carbon\Carbon;

class SubmitController extends Controller{
    function SubmitAllData(Request $request){
        // echo $request;

        $role = $request['role'];
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
                'role'          => $role,
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
            // echo "R".$d->id_question." : ".$request['reason' .$d->id_question]."\n";
            if (!empty($request['reason' .$d->id_question])) {
                $array[$i] = [
                        'id_respondent'     => $id_respondent,
                        'id_question'       => $d->id_question,
                        'answer'            => $request['soal' .$d->id_question],
                        'reason'            => $request['reason' .$d->id_question],
                        'created_at'        => Carbon::now(),
                        'updated_at'        => Carbon::now(),
                ];
            }else{
                $array[$i] = [
                        'id_respondent'     => $id_respondent,
                        'id_question'       => $d->id_question,
                        'answer'            => $request['soal' .$d->id_question],
                        'reason'            => "-",
                        'created_at'        => Carbon::now(),
                        'updated_at'        => Carbon::now(),
                ];
            }
            $i++;
        }
        
        DB::table('answer')
            ->insert($array);


        if ($role == 'Expert') {
           
                $id_c = DB::table('category')
                    ->select([
                        'id_category'
                    ])
                    ->get();
                
                $j = 0;
                foreach($id_c as $c){

                    if (!empty($request['comment' .$c->id_category])) {
                        $arr[$j] = [
                                'id_category'     => $c->id_category,
                                'id_respondent'   => $id_respondent,
                                'comment'     => $request['comment' .$c->id_category],
                        ];
                    }else{
                        $arr[$j] = [
                                'id_category'     => $c->id_category,
                                'id_respondent'   => $id_respondent,
                                'comment'     => "-",
                        ];                        
                    }
                    $j++;
                }

                DB::table('comment')
                    ->insert($arr);
        }

        return response()->json([
            'code'      =>200
        ]);
    }
}