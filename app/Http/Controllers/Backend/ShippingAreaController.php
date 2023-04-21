<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\ShipProvince;
use App\Models\ShipDistrict;

class ShippingAreaController extends Controller
{
    public function ProvinceView(){
        $provinces = ShipProvince::orderBy('id','DESC')->get();
        return view('backend.ship.province.province_view',compact('provinces'));
    }
    public function ProvinceStore(Request $request){
        $request->validate([
            'province_name' => 'required',
            
        ], [
            'province_name.required' => 'Please Input Province Name',
        ]);
       
        ShipProvince::insert([
            'province_name' => strtoupper($request->province_name),
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Province Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function ProvinceEdit($id){
        $province = ShipProvince::findOrFail($id);
        return view('backend.ship.province.province_edit',compact('province'));
    }
    public function ProvinceUpdate(Request $request){
        $province_id = $request->id;
        $request->validate([
            'province_name' => 'required',
            
        ], [
            'province_name.required' => 'Please Input Province Name',
        ]);
        ShipProvince::findOrFail($province_id)->update([
            'province_name' => strtoupper($request->province_name),
            'updated_at' => Carbon::now()
           
        ]);
        $notification = array(
            'message' => 'Province Updated Successfully',
            'alert-type' => 'info',
        );
        return redirect()->route('manage-province')->with($notification);
    }
    public function ProvinceDelete($id){
        ShipProvince::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Province Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    // DISTRICT
    public function DistrictView(){
        $provinces = ShipProvince::orderBy('id','DESC')->get();
        $districts = ShipDistrict::orderBy('id','DESC')->get();
        return view('backend.ship.district.district_view',compact('districts','provinces'));
    }
    public function DistrictStore(Request $request){
        $request->validate([
            'province_id' => 'required',
            'district_name' => 'required',
            
        ], [
            'province_id.required' => 'Please Choose Province',
            'district_name.required' => 'Please Input District Name',
        ]);
       
        ShipDistrict::insert([
            'province_id' => $request->province_id,
            'district_name' => strtoupper($request->district_name),
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'District Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function DistrictEdit($id){
        $provinces = ShipProvince::orderBy('id','DESC')->get();
        $district = ShipDistrict::findOrFail($id);
        return view('backend.ship.district.district_edit',compact('district','provinces'));
    }
    public function DistrictUpdate(Request $request){
        $district_id = $request->id;
        $request->validate([
            'province_id' => 'required',
            'district_name' => 'required',
            
        ], [
            'province_id.required' => 'Please Choose Province',
            'district_name.required' => 'Please Input Province Name',
        ]);
        ShipDistrict::findOrFail($district_id)->update([
            'province_id' => $request->province_id,
            'district_name' => strtoupper($request->district_name),
            'updated_at' => Carbon::now()
           
        ]);
        $notification = array(
            'message' => 'District Updated Successfully',
            'alert-type' => 'info',
        );
        return redirect()->route('manage-district')->with($notification);
    }
    public function DistrictDelete($id){
        ShipDistrict::findOrFail($id)->delete();
        $notification = array(
            'message' => 'District Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}