<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use Validator;
use Session;

class loginController extends Controller
{
    public function ulogin(){
        if(Auth::check()){
            return redirect(route('dashboard.index'));
        }else{
            return view("backend.login.login");
        }
        
    }

    public function uloginCheck(Request $request){
        if($request->isMethod("post")){
            $validator = Validator::make($request->all(),[
                "email" => "required|email",
                "password" => "required",
            ]);
            if($validator->fails()){
                return response()->json([
                    "status" => "validatorError",
                    "data" => $validator->errors(),
                ]);
            }
            if(Auth::attempt(["email" => $request->email, "password" => $request->password], $request->chbox)){

                Session::put('success', 'Admin login success!');
                return response()->json([
                    "reload" => true
                ]);

            }else{
                Session::put('error', 'Your credential wrong!');
                return response()->json([
                    "reload" => true
                ]);
            }
        }
    }


    public function ulogout(Request $request){
        Auth::logout();
        return redirect(Route('login'));
        
    }

}
