<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
class StoreAuthAdminController extends Controller
{
    public function index(){
        return view('login/login');
    }
    public function auth(Request $req){
        $username = $req->username;
        $pwd   = $req->password;
        if (Auth::attempt(['username' => $username, 'password' => $pwd])) {
            $user=User::where('username',$username)->first();
            $req->session()->put('id',$user->id);
            $req->session()->put('username',$user->username);
            $req->session()->put('name',$user->name);
            $req->session()->put('email',$user->email);
            $req->session()->put('role',$user->role);

            if (Auth::user()->role=="admin"){
                return redirect('/dashboard_admin');
            } else if (Auth::user()->role=="customer"){
                return redirect('/dashboard');
            }
        }
        else{
            echo "<script>alert('Maaf Username dan Password Anda Salah.');</script>";
            return redirect('/login');
        }
    }

    public function logout(){
        session()->flush();
        Auth::logout(); 
        return redirect ('/login');
    }
}
