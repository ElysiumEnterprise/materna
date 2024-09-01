<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;

class ResetPasswordController extends Controller
{
    public function sendResetLinkEmail(Request $request){

        //validação dos campos

        $request->validate(
            [
                
                'email' => 'required||email',
            
            ],

            [
                'email.required'=>'Preencha esse campo!',
                'email.email'=>'Email inválido!'
            ]
        );

        $response = Password::broker()->sendResetLink($request->only('email'));

        return $response == Password::RESET_LINK_SENT ? back()->with('status', _($response)): back()->withErrors(['email'=>_($response)]);
    }
}
