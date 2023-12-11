<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminProfileController extends Controller
{
    public function index(){
        return view("backend.setup.user-profile");
    }

    public function profileUpdate(Request $req){
      
        if($req->method("POST")){

            $errors = Validator::make($req->all(),[
                "name" => "required",
                "email" => "required|unique:users,email,".$req->id,
            ]);

            if(is_numeric($req->email)){
                $errors = Validator::make($req->all(),[
                    "email" => "email",
                ],[
                    "email.email" => "Please valid email address.",
                    "email.unique" => "Email address already exists."
                ]);
            }

            if ($errors->fails()) {
                return response()->json([
                    "status" => false,
                    "message" => "error",
                    "data" => $errors->errors()
                ]);
            }

            $user = User::where('id',Auth::user()->id)->first();

            $user->name         = $req->name;
            $user->email        = $req->email;
            $user->save();

            if($user){
                Session::put("success","Profile updated successfully!");
                return response()->json([
                    "status" => "reload"
                ]);
            }else{
                Session::put("error","Profile updated unsuccessful!");
                return response()->json([
                    "status" => "reload"
                ]);            
            }

        }

    }

    public function passwordChange(Request $req){
        $errors = Validator::make($req->all(), [
            "oldpassword" => "required",
            "password" => "required|min:6",
            "repassword" => "required|same:password",
        ]);

        if ($errors->fails()) {
            return response()->json([
                "status" => false,
                "message" => "error",
                "data" => $errors->errors()
            ]);
        }


        $check_data = User::where('id', Auth::user()->id)->first();

        if (Hash::check($req->oldpassword, $check_data->password)) {
            $user = User::where('id',Auth::user()->id)->first();
            $user->password = Hash::make($req->password);
            $user->save();
            if($user){
                Session::put("success","Password change successfully");
                return response()->json([
                    "status" => "reload"
                ]);
            }else{
                Session::put("error","Something Wrong!");
                return response()->json([
                    "status" => "reload"
                ]);
            }
        }else{
            Session::put("error","Old password not match!");
            return response()->json([
                "status" => "reload"
            ]);
        }
    }
}
