<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;
use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{

    public function showResetForm($token){

        return view('novasenha')->with(['token'  => $token]);
    }

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

        $response = Password::broker()->sendResetLink($request->only('email'),
            function ($user, $token) use ($request){
                Mail::to($request->email)->send(new ResetPasswordMail($token, $request->email));
            }
        );

        return $response == Password::RESET_LINK_SENT ? back()->with('status', _('Verifique seu email!')): back()->withErrors(['email'=>_($response)]);
    }


    public function reset(Request $request){

        $request->validate(
            [
                'email'=> 'required|email',
                'password'=>'required|confirmed|min:8',
                'token'=>'required',
            ],

            [
                'email.required'=> 'Preencha esse campo!',
                'email.email'=> 'Email inválido!',
                'password.required'=>'Preencha esse campo!',
                'password.min'=> 'A senha precisa conter no mínimo 8 caracteres!',
                'password.confirmed'=>'A senhas não são iguais!'
            ]
        );
        
        $response = Password::reset(

            $request->only('email', 'password', 'password_confirmation' , 'token'),

            function ($usuarios, $senha){
                $usuarios->senha=Hash::make($senha);
                $usuarios->save();
            }

        );
        
        return $response == Password::PASSWORD_RESET ? redirect('/')->with('status', __('Senha atualizada com sucesso!')) : back()->withError(['email' => __($response)]);

    }
}
