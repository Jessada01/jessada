<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.registration') ;
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $anwer = $user->save();

        if($anwer){
            return back()->with('succuess','Save!!!');
        }else{
            return back()->with('fail','Do not Save!');
        }
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('loginUser',$user->id);
                return redirect('dashboard');
            }else{
                return back()->with('fail','Password ไม่ถูกต้อง.');
            }
        }else{
            return back()->with('fail','email และ Password ไม่ถูกต้อง!');
        }
    }

    public function dashboard()
    {
        $user = array();
        if(Session::has('loginUser')){
            $user = User::where('id','=',Session::get('loginUser'))->first();
        }
        return view('auth.dashboard',compact('user')) ;
    }

    public function logout()
    {
        if(Session::has('loginUser')){
            Session::pull('loginUser');
            return redirect('login');
        }
    }


}
