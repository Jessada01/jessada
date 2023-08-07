<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\activity;

class activityController extends Controller
{
    public function addimg(){
        return view('activity/activity_add');
    }
    public function storeimg(Request $request){
        $name = $request->name;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('image/activity'),$imageName);

        //save data to table
        $activity = new activity();
        $activity->name = $name;
        $activity->imgname = $imageName;
        $activity->save();

        return back()->with('activity_added','image record has been saved');
    }
    //show img
    public function imgs(){
        $activitys = activity::all();
        return view('activity/activity_all',compact('activitys'));
    }

    ////update img

    public function updateimg(Request $request){
        $name = $request->name;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('image/activity'),$imageName);
        
        ///uupdate
        $activity = activity::find($request->id);
        unlink(public_path('image/activity').'/'.$activity->imgname);
        $activity->delete();
        $activity->name = $name;
        $activity->imgname = $imageName;
        $activity->save();

        return back()->with('activity_updated','image record update success');
    }
    ////edit img
    public function editimg($id){
        $activity = activity::find($id);
        return view('activity/activity_edit',compact('activity'));
    }

    public function deleteimg($id){
        $activity = activity::find($id);
        unlink(public_path('image/activity').'/'.$activity->imgname);
        $activity->delete();

        return back()->with('img.delete','This image record has been deleted');
    }
}
