<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return Inertia::render('Login');
    }

    public function auth(Request $request){
       
        $regras = [
            'user' => 'email',
            'password' => 'required'
        ];

        $message = [
            'user.email'=>'Um email precisa ser passado',
            'password.required'=>'o campo senha é obrigatorio'
        ];

        $request->validate($regras,$message);
        $user = $request->get('user');
        $password =  $request->get('password');

        $usuario = new User();

       $existe = $usuario->where('email',$user)->where('password',$password)->get()->first();
       

        if(isset($existe->email)){
            session_start();
            $_SESSION['email'] = $existe->email;
            $_SESSION['name'] = $existe->name;
            return redirect()->route('cliente');
        }else{
            return redirect()->route('login');
        }

        }
        
        public function cliente(){
            return Inertia::render('Cliente');
        }



}
