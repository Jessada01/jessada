<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\image;

class imageController extends Controller
{
    public function addimg(){
        return view('image/image_add');
    }
    public function storeimg(Request $request){
        $name = $request->name;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('image/etc'),$imageName);

        //save data to table
        $image = new image();
        $image->name = $name;
        $image->imgname = $imageName;
        $image->save();

        return back()->with('image_added','image record has been saved');
    }
    //show img
    public function imgs(){
        $images = image::all();
        return view('image/image_all',compact('images'));
    }

    ////update img

    public function updateimg(Request $request){
        $name = $request->name;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('image/etc'),$imageName);
        
        ///uupdate
        $image = image::find($request->id);
        unlink(public_path('image/etc').'/'.$image->imgname);
        $image->delete();
        $image->name = $name;
        $image->imgname = $imageName;
        $image->save();

        return back()->with('image_updated','image record update success');
    }
    ////edit img
    public function editimg($id){
        $image = image::find($id);
        return view('image/image_edit',compact('image'));
    }

    public function deleteimg($id){
        $image = image::find($id);
        unlink(public_path('image/etc').'/'.$image->imgname);
        $image->delete();

        return back()->with('image_deleted','This image record has been deleted');
    }
}
