<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Registration;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

use App\Http\Controllers\Controller;

class DashboardAdminController extends Controller{
    function DashboardIndex(){
        return view('admin.dashboard');
    }

    function ReportDataDashboard(){
        $respondent = DB::table('respondent')
            ->select([
                'id_respondent',
                'name',
                'jenkel',
                'umur',
                'email',
                'phone_number',
                'pekerjaan',
                'pengalaman',
            ])
            ->get();
        
        $pengalaman = [];
        $i = 0;

        foreach($respondent as $d){
            if($d->pengalaman == 1){
                $pengalaman[$i] = '< 1 Tahun';
            }
            elseif($d->pengalaman == 2){
                $pengalaman[$i] = '1 - 5 Tahun';
            }
            elseif($d->pengalaman == 3){
                $pengalaman[$i] = '> 5 Tahun';
            }
            $i++;
        }
        
        $data = [];
        $i = 0;
// dd($pengalaman);
        foreach($respondent as $d){
            $data[$i] = [
                $d->id_respondent,
                $d->name,
                $d->jenkel,
                $d->umur,
                $d->email,
                $d->phone_number,
                $d->pekerjaan,
                $pengalaman[$i],
            ];

            $i++;
        }

        return response($data);

    }
    
}