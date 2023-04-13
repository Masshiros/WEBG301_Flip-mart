<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;

class SliderController extends Controller
{
    public function SliderView(){
        $slider = Slider::latest()->get();
        return view('backend.slider.slider_view', compact('slider'));
    }

        public function SliderStore(Request $request)
    {
        $request->validate([
            'slider_image' => 'required',
            'title' => 'required',
            'status' => 'required',
            'description' => 'required',
        ], [
            'slider_image.required' => 'Please Input Slider English Name',
            'title.required' => 'Please Input Slider Vietnamese Name',
            'status.required' => 'Please Input Slider Chinese Name',
            'description.required' => 'Please Input Slider Image',
        ]);
        $image = $request->file('Slider_image');
        $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/Slider_images/' . $name_generate);
        $save_url = 'upload/Slider_images/' . $name_generate;
        Slider::insert([
            'Slider_name_en' => $request->Slider_name_en,
            'Slider_name_vn' => $request->Slider_name_vn,
            'Slider_name_cn' => $request->Slider_name_cn,
            'Slider_slug_en' => strtolower(str_replace(' ', '-', $request->Slider_name_en)),
            'Slider_slug_vn' => strtolower(str_replace(' ', '-', $request->Slider_name_vn)),
            'Slider_slug_cn' => strtolower(str_replace(' ', '-', $request->Slider_name_cn)),
            'Slider_image' => $save_url,
        ]);
        $notification = array(
            'message' => 'Slider Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function SliderEdit($id){
        $Slider = Slider::findOrFail($id);
        return view('backend.Slider.Slider_edit', compact('Slider'));
    }
    public function SliderUpdate(Request $request ){
        $Slider_id = $request->id;
        $old_img = $request->old_image;
        // if user choose any image
        if($request->file('Slider_image')){
            unlink($old_img);
            $image = $request->file('Slider_image');
            $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/Slider_images/' . $name_generate);
            $save_url = 'upload/Slider_images/' . $name_generate;
            Slider::findOrFail($Slider_id)->update([
                'Slider_name_en' => $request->Slider_name_en,
                'Slider_name_vn' => $request->Slider_name_vn,
                'Slider_name_cn' => $request->Slider_name_cn,
                'Slider_slug_en' => strtolower(str_replace(' ', '-', $request->Slider_name_en)),
                'Slider_slug_vn' => strtolower(str_replace(' ', '-', $request->Slider_name_vn)),
                'Slider_slug_cn' => strtolower(str_replace(' ', '-', $request->Slider_name_cn)),
                'Slider_image' => $save_url,
            ]);
            $notification = array(
                'message' => 'Slider Updated Successfully',
                'alert-type' => 'info',
            );
            return redirect()->route('all.Slider')->with($notification);
        }else{
            Slider::findOrFail($Slider_id)->update([
                'Slider_name_en' => $request->Slider_name_en,
                'Slider_name_vn' => $request->Slider_name_vn,
                'Slider_name_cn' => $request->Slider_name_cn,
                'Slider_slug_en' => strtolower(str_replace(' ', '-', $request->Slider_name_en)),
                'Slider_slug_vn' => strtolower(str_replace(' ', '-', $request->Slider_name_vn)),
                'Slider_slug_cn' => strtolower(str_replace(' ', '-', $request->Slider_name_cn)),

            ]);
            $notification = array(
                'message' => 'Slider Updated Successfully',
                'alert-type' => 'info',
            );
            return redirect()->route('all.Slider')->with($notification);
        }
    }
    public function SliderDelete($id){
        $Slider = Slider::findOrFail($id);
        $img = $Slider->Slider_image;
        unlink($img);
        Slider::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'info',
        );
        return redirect()->back()->with($notification);
    }

}
