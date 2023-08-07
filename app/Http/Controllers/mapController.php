<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\map;

class mapController extends Controller
{
    public function addimg(){
        return view('map/map_add');
    }
    public function storeimg(Request $request){
        $name = $request->name;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('image/maps'),$imageName);

        //save data to table
        $maps = new map();
        $maps->name = $name;
        $maps->imgname = $imageName;
        $maps->save();

        return back()->with('map_added','image record has been saved');
    }
    //show img
    public function imgs(){
        $maps = map::all();
        return view('map/map_all',compact('maps'));
    }

    ////update img

    public function updateimg(Request $request){
        $name = $request->name;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('image/maps'),$imageName);
        
        ///uupdate
        $maps = map::find($request->id);
        unlink(public_path('image/maps').'/'.$maps->imgname);
        $maps->delete();
        
        $maps->name = $name;
        $maps->imgname = $imageName;
        $maps->save();

        return back()->with('map_updated','image record update success');
    }
    ////edit img
    public function editimg($id){
        $maps = map::find($id);
        return view('map/map_edit',compact('maps'));
    }

    public function deleteimg($id){
        $maps = map::find($id);
        unlink(public_path('image/maps').'/'.$maps->imgname);
        $maps->delete();

        return back()->with('img.delete','This image record has been deleted');
    }
}
