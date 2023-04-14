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
        public function SliderView()
    {
        $sliders = Slider::latest()->get();// The latest syntax access and stored in variables ($ slider)
        return view('backend.slider.slider_view', compact('sliders')); // return to see in the backend folder and Sliders transformation to compact function
    }
    public function SliderStore(Request $request)
    {
        $request->validate([
            'slider_image' => 'required',
            'title' => 'required',
            'description' => 'required',
        ], [
            'slider_image.required' => 'Please Input Slider Image',
            'title.required' => 'Please Input Slider Title',
            'description.required' => 'Please Input Slider Description',
        ]);
        $image = $request->file('slider_image');
        $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/slider_images/' . $name_generate);
        $save_url = 'upload/slider_images/' . $name_generate;
        Slider::insert([
            'slider_image' => $request->slider_image,
            'title' => $request->title,
            'description' => $request->description,

            // 'slider_image' => strtolower(str_replace(' ', '-', $request->slider_image)),
            // 'title' => strtolower(str_replace(' ', '-', $request->title)),
            // 'description' => strtolower(str_replace(' ', '-', $request->description)),
            'slider_image' => $save_url,
        ]);
        $notification = array(
            'message' => 'Slider Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function SliderEdit($id){
        $slider = Slider::findOrFail($id);
        return view('backend.slider.slider_edit', compact('slider'));
    }
    public function SliderUpdate(Request $request ){
        $slider_id = $request->id;
        $old_img = $request->old_image;
        // if user choose any image
        if($request->file('slider_image')){
            unlink($old_img);
            $image = $request->file('slider_image');
            $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/slider_images/' . $name_generate);
            $save_url = 'upload/slider_images/' . $name_generate;
            Slider::findOrFail($slider_id)->update([
                'slider_image' => $request->slider_image,
                'title' => $request->title,
                'description' => $request->description,

                // 'slider_image' => strtolower(str_replace(' ', '-', $request->slider_image)),
                // 'title' => strtolower(str_replace(' ', '-', $request->title)),
                // 'description' => strtolower(str_replace(' ', '-', $request->description)),
                'slider_image' => $save_url,
            ]);
            $notification = array(
                'message' => 'Slider Updated Successfully',
                'alert-type' => 'info',
            );
            return redirect()->route('manage-slider')->with($notification);
        }else{
            Slider::findOrFail($slider_id)->update([
            'slider_image' => $request->slider_image,
            'title' => $request->title,
            'description' => $request->description,

            // 'slider_image' => strtolower(str_replace(' ', '-', $request->slider_image)),
            // 'title' => strtolower(str_replace(' ', '-', $request->title)),
            // 'description' => strtolower(str_replace(' ', '-', $request->description)),

            ]);
            $notification = array(
                'message' => 'Slider Updated Successfully',
                'alert-type' => 'info',
            );
            return redirect()->route('manage-slider')->with($notification);
        }
    }

    // inactivate Slider
    public function SliderInactive($id)
    {
        Slider::findOrFail($id)->update([
            'status' => 0,
        ]);
        $notification = array(
            'message' => 'Slider Inactivated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    // activate Slider
    public function SliderActive($id)
    {
        Slider::findOrFail($id)->update([
            'status' => 1,
        ]);
        $notification = array(
            'message' => 'Slider Activated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    // Delete Slider
    public function SliderDelete($id){
        $slider = Slider::findOrFail($id);
        $img = $slider->slider_image;
        unlink($img);
        Slider::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'info',
        );
        return redirect()->back()->with($notification);
    }
}
