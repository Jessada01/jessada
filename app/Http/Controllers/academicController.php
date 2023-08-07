<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\academic;

class academicController extends Controller
{
    public function addimg(){
        return view('academic/academic_add');
    }
    public function storeimg(Request $request){
        $name = $request->name;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('image/academic'),$imageName);

        //save data to table
        $academic = new academic();
        $academic->name = $name;
        $academic->imgname = $imageName;
        $academic->save();

        return back()->with('academic_added','image record has been saved');
    }
    //show img
    public function imgs(){
        $academics = academic::all();
        return view('academic/academic_all',compact('academics'));
    }

    ////update img

    public function updateimg(Request $request){
        $name = $request->name;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('image/academic'),$imageName);
        
        ///uupdate
        $academic = academic::find($request->id);
        unlink(public_path('image/academic').'/'.$academic->imgname);
        $academic->delete();
        $academic->name = $name;
        $academic->imgname = $imageName;
        $academic->save();

        return back()->with('academic_updated','image record update success');
    }
    ////edit img
    public function editimg($id){
        $academic = academic::find($id);
        return view('academic/academic_edit',compact('academic'));
    }

    public function deleteimg($id){
        $academic = academic::find($id);
        unlink(public_path('image/academic').'/'.$academic->imgname);
        $academic->delete();

        return back()->with('img.delete','This image record has been deleted');
    }
}
