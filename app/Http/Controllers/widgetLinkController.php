<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\widgetLink;
use App\Models\widget;
use Auth;
use Str;
use Image;
use Validator;
use Session;

class widgetLinkController extends Controller
{
    public function index(){
        $widgetLink = null;
        if(widgetLink::count() > 0){
            $widgetLink = widgetLink::orderBy("id","DESC")->get();
        }

        $widget = null;
        if(widget::where("status", 1)->count() > 0){
            $widget = widget::where("status", 1)->orderBy("id","DESC")->get();
        }
        return view('backend.wedget.wedgetlink', compact('widget','widgetLink'));
    }


    public function store(Request $request){

        if($request->isMethod('post')){
            $validator = Validator::make($request->all(),[
                "name"          => "required",
                "wedgetid"      => "required",
                "target"        => "required",
                "targetdata"    => "required"
            ]);
            if($validator->fails()){
                return response()->json([
                    "status" => "validatorError",
                    "data" => $validator->errors(),
                ]);
            }

            $widgetLink             = new widgetLink();
            $widgetLink->name       = $request->name;
            $widgetLink->slug       = Str::slug($request->name);
            $widgetLink->wedgetid   = $request->wedgetid;
            $widgetLink->linkstatus = $request->linkstatus;
            $widgetLink->target     = $request->target;
            if($request->target == 1){
                if(isset($request->targetdata)){

                    $validator = Validator::make($request->all(),[
                        "targetdata"     => "required|mimes:pdf|max:5120",
                    ],[
                           "targetdata.max"        => "Pdf size less than 5 MB.",
                    ]);

                    if($validator->fails()){
                        return response()->json([
                            "status" => "validatorError",
                            "data" => $validator->errors(),
                        ]);
                    }

                    $file       = $request->targetdata;
                    $extension  = $file->getClientOriginalExtension();
                    $fileWithExtension = "notice/".substr(md5(time()), 0, 10).".".$extension;
                    $file->move("notice/",$fileWithExtension);
                    $widgetLink->targetdata   = $fileWithExtension;
                }
            }else{
                $widgetLink->targetdata = $request->targetdata;
            }
            $widgetLink->status     = $request->status;
            $widgetLink->save();
            if($widgetLink){
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

        $widgetLink = widgetLink::findOrFail($request->id);
        if($widgetLink){
            return response()->json([
                "status"    => "getSelectdata",
                "data"      => $widgetLink
            ]);
        }

    }



    public function update(Request $request){

        if($request->isMethod('post')){
            $validator = Validator::make($request->all(),[
                "name"           => "required",
                "wedgetid"       => "required",
                "target"         => "required"
            ]);

            if($validator->fails()){
                return response()->json([
                    "status" => "validatorError",
                    "data" => $validator->errors(),
                ]);
            }

            $widgetLink             = widgetLink::find($request->id);
            $widgetLink->name       = $request->name;
            $widgetLink->slug       = Str::slug($request->name);
            $widgetLink->wedgetid   = $request->wedgetid;
            $widgetLink->linkstatus = $request->linkstatus;
            $widgetLink->target     = $request->target;
            
            if($request->target == 1){

                if(isset($request->targetdata_up_img)){

                    $validator = Validator::make($request->all(),[
                        "targetdata_up_img"     => "required|mimes:pdf|max:5120",
                    ],[
                           "targetdata_up_img.max" => "Pdf size less than 5 MB.",
                    ]);

                    if($validator->fails()){
                        return response()->json([
                            "status"    => "validatorError",
                            "data"      => $validator->errors(),
                        ]);
                    }

                    @unlink($widgetLink->targetdata);
                    $file               = $request->targetdata_up_img;
                    $extension          = $file->getClientOriginalExtension();
                    $fileWithExtension  = "notice/".substr(md5(time()), 0, 10).".".$extension;
                    $file->move("notice/",$fileWithExtension);
                    $widgetLink->targetdata   = $fileWithExtension;
                }

            }else{
                $widgetLink->targetdata = $request->targetdata_up;
            }

            $widgetLink->status     = $request->status;
            $widgetLink->save();
            if($widgetLink){
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
        $widgetLink = widgetLink::findOrFail($request->id);
        if($widgetLink->target == 1){
            @unlink($widgetLink->targetdata);
        }
        $widgetLink->delete();
        if($widgetLink){
            return redirect(route('wedgetlink.index'));
        }
    }

}
