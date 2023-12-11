<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\notice;
use Image;
use Session;
use Str;
use Validator;

class noticeController extends Controller
{
    public function index(){
        $notice = null;
        if(notice::count() > 0){
            $notice = notice::orderBy("id","DESC")->get();
        }
        return view("backend.notice.addnotice", compact('notice'));
    }

    public function store(Request $request){
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(),[
                "name"      => "required|unique:members",
                "file"      => "required|mimes:pdf|max:5120",
            ]);
            if($validator->fails()){
                return response()->json([
                    "status" => "validatorError",
                    "data" => $validator->errors(),
                ]);
            }
            $notice = new notice();
            $notice->name               = $request->name;
            $notice->slug               = Str::slug($request->name);
            if(isset($request->file)){
                $file       = $request->file;
                $extension  = $file->getClientOriginalExtension();
                $fileWithExtension = "notice/".substr(md5(time()), 0, 10).".".$extension;
                $file->move("notice/",$fileWithExtension);
                $notice->file           = $fileWithExtension;
            }

            $notice->status             = $request->status;
            $notice->save();
            if($notice){
                Session::put('success', 'Data inserted successfully!');
                return response()->json([
                    "reload" => true
                ]);
            }else{
                Session::put('error', 'Data not deleted!');
                return response()->json([
                    "reload" => true
                ]);
            }
        }
    }


    public function edit(Request $request){
        $notice = notice::findOrFail($request->id);
        if($notice){
            return response()->json([
                "status"    => "getSelectdata",
                "data"      => $notice
            ]);
        }
    }

    public function update(Request $request){

         if($request->isMethod('post')){
            $validator = Validator::make($request->all(),[
                "name"      => "required|unique:notices,name,".$request->id,
            ]);

            if($validator->fails()){
                return response()->json([
                    "status" => "validatorError",
                    "data" => $validator->errors(),
                ]);
            }
            $notice                     = notice::find($request->id);
            $notice->name               = $request->name;
            $notice->slug               = Str::slug($request->name);
            if(isset($request->file)){
                $validator = Validator::make($request->all(),[
                    "file"      => "required|mimes:pdf|max:5120",
                ]);
                if($validator->fails()){
                    return response()->json([
                        "status" => "validatorError",
                        "data" => $validator->errors(),
                    ]);
                }
                @unlink($notice->file);
                $file       = $request->file;
                $extension  = $file->getClientOriginalExtension();
                $fileWithExtension = "notice/".substr(md5(time()), 0, 10).".".$extension;
                $file->move("notice/",$fileWithExtension);
                $notice->file           = $fileWithExtension;
            }

            $notice->status             = $request->status;
            $notice->save();
            if($notice){
                Session::put('success', 'Data updated successfully!');
                return response()->json([
                    "reload" => true
                ]);
            }else{
                Session::put('error', 'Data not deleted!');
                return response()->json([
                    "reload" => true
                ]);
            }
        }
    }

    public function delete(Request $request){
        $notice = notice::findOrFail($request->id);
        @unlink($notice->file);
        $notice->delete();
        if($notice){
            return redirect(route('noticeadd.index'));
        }
    }








    // Frontend Function
    public function viewNotice(){
        $notices = null;
        if(notice::count() > 0){
            $notices = notice::orderBy("id","DESC")->get();
        }
        return view('frontend.home.notice-list',compact('notices'));
    }

    public function noticeDetails($slug){
        $notice = notice::where("slug",$slug)->where("status", 1)->firstOrFail();
        return view('frontend.home.notice-details',compact('notice'));
    }
}
