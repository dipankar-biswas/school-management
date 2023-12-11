<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Image;
use Session;
use Str;
use Validator;

class userController extends Controller
{
    public function index(){
        $user      = null;
        if(User::count() > 0){
            $user = User::orderBy("name","ASC")->get();
        }
        return view("backend.user.adduser", compact('user'));
    }

    public function store(Request $request){
        if($request->isMethod('post')){

            $validator = Validator::make($request->all(),[
                "name"                  => "required",
                "email"                 => "required|unique:Users",
                "password"              => "required|confirmed",
                "password_confirmation" => "required"
            ]);

            if($validator->fails()){
                return response()->json([
                    "status" => "validatorError",
                    "data" => $validator->errors(),
                ]);
            }

            $user = new User();
            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->password     = bcrypt($request->password);
            $user->save();
        
            if($user){
                Session::put('success', 'New user created!');
                return response()->json([
                    "reload" => true
                ]);
            }else{
                Session::put('error', 'Not user created!');
                return response()->json([
                    "reload" => true
                ]);
            }
        }
    }

    public function edit(Request $request){
        $user = User::findOrFail($request->id);
        if($user){
            return response()->json([
                "status"    => "getSelectdata",
                "data"      => $user
            ]);
        }
    }

    public function update(Request $request){

         if($request->isMethod('post')){

            $validator = Validator::make($request->all(),[
                "name"                  => "required",
                "email"                 => "required|email|unique:Users,email,".$request->id
            ]);

            if($validator->fails()){
                return response()->json([
                    "status" => "validatorError",
                    "data" => $validator->errors(),
                ]);
            }
            
            $user               = User::find($request->id);
            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->password     = bcrypt($request->password);
            $user->save();
        
            if($user){
                Session::put('success', 'New user updated!');
                return response()->json([
                    "reload" => true
                ]);
            }else{
                Session::put('error', 'Not user created!');
                return response()->json([
                    "reload" => true
                ]);
            }
        }
    }

    public function delete(Request $request){
        $user = User::findOrFail($request->id);
        $user->delete();
        if($user){
            return redirect(route('userdd.index'));
        }
    }

}
