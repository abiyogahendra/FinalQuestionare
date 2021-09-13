<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Registration;

class RegistrationController extends Controller
{
    public function InputRegistration(Registration $request)
    {

        // dd($request->role);
        if ($request->role == "Expert") {
            return response()->json([
                'code' => 300,
            ]);
        }else{
            return response()->json([
                'code' => 200,
            ]);
        }

    }
}
