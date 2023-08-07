<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\rights;

class rightsController extends Controller
{
    public function addimg(){
        return view('rights/rights_add');
    }
    public function storeimg(Request $request){
        $name = $request->name;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('image/rights'),$imageName);

        //save data to table
        $rights = new rights();
        $rights->name = $name;
        $rights->imgname = $imageName;
        $rights->save();

        return back()->with('rights_added','image record has been saved');
    }
    //show img
    public function imgs(){
        $right = rights::all();
        return view('rights/rights_all',compact('right'));
    }

    ////update img

    public function updateimg(Request $request){
        $name = $request->name;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('image/rights'),$imageName);
        
        ///uupdate
        $rights = rights::find($request->id);
        unlink(public_path('image/rights').'/'.$rights->imgname);
        $rights->delete();
        $rights->name = $name;
        $rights->imgname = $imageName;
        $rights->save();

        return back()->with('rights_updated','image record update success');
    }
    ////edit img
    public function editimg($id){
        $rights = rights::find($id);
        return view('rights/rights_edit',compact('rights'));
    }

    public function deleteimg($id){
        $rights = rights::find($id);
        unlink(public_path('image/rights').'/'.$rights->imgname);
        $rights->delete();

        return back()->with('img.delete','This image record has been deleted');
    }
}
