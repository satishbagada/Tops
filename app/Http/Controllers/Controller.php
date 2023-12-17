<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
        return view('User.Login');
    }
    public function Login(Request $request)
    {   

        // $data=new User();
        // $data->name='user';
        // $data->email='user@gmail.com';
        // $data->password=Hash::make('123456');
        // $data->type='2';
        // $data->save();
        // return redirect('/');
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $credential=$request->only('email','password');
        $users = User::where('email', $request->email)->get();
        if(sizeof($users)==0){
            return redirect()->back()->withDanger('Email Does not exist.');
        }
        else if(Auth::attempt($credential)){
            return redirect('User/index')->withSuccess('Login Successfully.');
        }
        else
        {
            return redirect()->back()->withWarning('Login detail are not valid.');
        }
        
    }
}
