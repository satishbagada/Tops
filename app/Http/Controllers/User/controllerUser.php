<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DataTables;

class controllerUser extends Controller
{
    public function showdata(Request $request)
    {
        if ($request->ajax()) {
            $data = User::get();
            return Datatables::of($data)->make(true);
        }
        return view('User.index');
    }

    // public function dashboard()
    // {
    //     return view("Dashboard.index");
    // }

    public function create()
    {
        return view("User.Add");
    }
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'user_name'=>'required',
            'user_email'=>'required|email',
            'user_type'=>'required',
            'user_profile'=>'required|image|mimes:jpg,png,jpeg|',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required'
        ]);
        if ($validator->fails()) {
             return response()->json(['status'=>403,'error'=>$validator->errors()]);
            
        }

        if ($request->hasFile('user_profile')) {
            $file = $request->file('user_profile');
            $destinationPath = 'assets/images';
            $filename = time() . '' . $file->getClientOriginalName();
            $file->move(public_path($destinationPath), $filename);
        }
         else
        {
            return response()->json(['status' => 403, 'message' => 'Please upload proper profile.']);
        }
        if ($request->password == $request->password_confirmation) {
            $data = new User;
            $data->name = $request->user_name;
            $data->email = $request->user_email;
            $data->user_profile=$filename;
            $data->type=$request->user_type;
            $data->password = Hash::make($request->password);
            $data->actual_password=$request->password;
            $data->save();
            return response()->json(['status' => 200, 'message' => 'Registration successfully']);
        } 
        else
        {
            return response()->json(['status' => 403, 'message' => 'Password do not match']);
        }


    }

public function active($id)
    {

        if ($id > 0) {
            $data = User::find($id);
            $status = ($data->user_status == "0") ? "-1" : "0";
            $data->user_status = $status;
            $data->save();
            return response()->json(["status" => 200, "message" => "User Deactivated Successfully."]);
        } else
            return response()->json(["status" => 404, "message" => "There is some Error."]);
    }
    public function counter()
    {
        return view("welcome");
    }
}
