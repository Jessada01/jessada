<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\location;

class locationController extends Controller
{
    public function addimg(){
        return view('location/location_add');
    }
    public function storeimg(Request $request){
        $Bnum = $request->num;
        $Bname = $request->name;
        $Lat = $request->lat;
        $Long = $request->long;
        $Des = $request->des;

        //save data to table
        $location = new location();
        $location->BNum = $Bnum;
        $location->BName = $Bname;
        $location->Latitude = $Lat;
        $location->Longitude = $Long;
        $location->Description = $Des;
        $location->save();

        return back()->with('location_added','image record has been saved');
    }
    //show img
    public function imgs(){
        $location = location::all();
        return view('location/location_all',compact('location'));
    }

    ////update img

    public function updateimg(Request $request){
        $Bnum = $request->num;
        $Bname = $request->name;
        $Lat = $request->lat;
        $Long = $request->long;
        $Des = $request->des;
        ///uupdate
        $location = location::find($request->id);
        
        $location->BNum = $Bnum;
        $location->BName = $Bname;
        $location->Latitude = $Lat;
        $location->Longitude = $Long;
        $location->Description = $Des;
        $location->save();

        return back()->with('location_updated','image record update success');
    }
    ////edit img
    public function editimg($id){
        $location = location::find($id);
        return view('location/location_edit',compact('location'));
    }

    public function deleteimg($id){
        $location = location::find($id);
        $location->delete();

        return back()->with('img.delete','This image record has been deleted');
    }
}
