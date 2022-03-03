<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\email;

class emailController extends Controller
{
    public function store(Request $request)
    {
        $validation = email::where('email',$request->emailAdmin)->first();

        if(empty($validation)){
            email::latest('id')->first()->delete();
            $email = new email([
                'email' => $request->emailAdmin,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $email->save();

            if($email){
                return response()->json([
                    'message' => 'ok'
                ]);
            }
        }else{
            return response()->json([
                'message' => 'error',
                'alerta' => "El correo ingresado es el que se encuentra actualmente"
            ]);
        }
        

        

        

    }
}
