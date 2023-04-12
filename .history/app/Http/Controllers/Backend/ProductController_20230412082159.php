<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    public function AddProduct()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.product_add', compact('categories', 'brands'));
    }
    public function StoreProduct(Request $request)
    {
        $request->validate([
            'brand_id' => 'require',
            'subsubcategory_id' => 'require',
            'product_name_en' =>'require',
            'product_name_cn' =>'require',
            'product_name_vn' => 'require',
            'product_slug_en' => 'require',
            'product_slug_vn' => 'require',
            'product_slug_cn' => 'require',

            'product_code' =>'require',
            'product_quantity' => 'require',
            'discount_price' => 'require',
            'selling_price' => 'require',

            'product_tags_en' => 'require',
            'product_tags_vn' => 'require',
            'product_tags_cn' => 'require',

            'product_size_en' => 'require',
            'product_size_vn' => 'require',
            'product_size_cn' => 'require',
            'product_size_vn' => 'require',

            'product_color_en' => 'require',
            'product_color_vn' => 'require',
            'product_color_cn' => 'require',

            'short_description_en' => 'require',
            'short_description_vn' => 'require',
            'short_description_cn' => 'require',
            'long_description_en' => 'require',
            'long_description_vn' => 'require',
            'long_description_cn' => 'require',

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'product_thumbnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),
        ], [
            'brand_id.required' => 'Please Input Brand English Name',
            'subsubcategory_id.required' => 'Please Input Brand Vietnamese Name',
            'product_name_en.required' => 'Please Input Brand Chinese Name',
            'product_name_vn.required' => 'Please Input Brand Image',
            'product_name_cn.required' => 'Please Input Brand Image',
            'product_slug_en.required' => 'Please Input Brand Image',
            'product_name_vn.required' => 'Please Input Brand Image',
            'product_name_vn.required' => 'Please Input Brand Image',
            'product_name_vn.required' => 'Please Input Brand Image',
            'product_name_vn.required' => 'Please Input Brand Image',
            'product_name_vn.required' => 'Please Input Brand Image',
        ]);
        $image = $request->file('product_thumbnail');
        $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thumbnail/' . $name_generate);
        $save_url = 'upload/products/thumbnail/' . $name_generate;
        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_cn' => $request->product_name_cn,
            'product_name_vn' => $request->product_name_vn,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_vn' => strtolower(str_replace(' ', '-', $request->product_name_vn)),
            'product_slug_cn' => strtolower(str_replace(' ', '-', $request->product_name_cn)),

            'product_code' => $request->product_code,
            'product_quantity' => $request->product_quantity,
            'discount_price' => $request->discount_price,
            'selling_price' => $request->selling_price,

            'product_tags_en' => $request->product_tags_en,
            'product_tags_vn' => $request->product_tags_vn,
            'product_tags_cn' => $request->product_tags_cn,

            'product_size_en' => $request->product_size_en,
            'product_size_vn' => $request->product_size_vn,
            'product_size_cn' => $request->product_size_cn,
            'product_size_vn' => $request->product_size_vn,

            'product_color_en' => $request->product_color_en,
            'product_color_vn' => $request->product_color_vn,
            'product_color_cn' => $request->product_color_cn,

            'short_description_en' => $request->short_description_en,
            'short_description_vn' => $request->short_description_vn,
            'short_description_cn' => $request->short_description_cn,
            'long_description_en' => $request->long_description_en,
            'long_description_vn' => $request->long_description_vn,
            'long_description_cn' => $request->long_description_cn,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'product_thumbnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);
        ////////// MULTIPLE IMAGE UPLOAD
        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multi-image/' . $make_name);
            $uploadPath = 'upload/products/multi-image/' . $make_name;
            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('manage-product')->with($notification);

    }
    public function ManageProduct()
    {
        $products = Product::latest()->get();
        return view('backend.product.product_view', compact('products'));
    }
    public function EditProduct($id)
    {
        $multiImgs = MultiImg::where('product_id', $id)->get();
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $product = Product::findOrFail($id);
        return view('backend.product.product_edit', compact('categories', 'brands', 'subcategories', 'subsubcategories', 'product', 'multiImgs'));
    }
    public function ProductDataUpdate(Request $request)
    {
        $product_id = $request->id;
        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_cn' => $request->product_name_cn,
            'product_name_vn' => $request->product_name_vn,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_vn' => strtolower(str_replace(' ', '-', $request->product_name_vn)),
            'product_slug_cn' => strtolower(str_replace(' ', '-', $request->product_name_cn)),

            'product_code' => $request->product_code,
            'product_quantity' => $request->product_quantity,
            'discount_price' => $request->discount_price,
            'selling_price' => $request->selling_price,

            'product_tags_en' => $request->product_tags_en,
            'product_tags_vn' => $request->product_tags_vn,
            'product_tags_cn' => $request->product_tags_cn,

            'product_size_en' => $request->product_size_en,
            'product_size_vn' => $request->product_size_vn,
            'product_size_cn' => $request->product_size_cn,
            'product_size_vn' => $request->product_size_vn,

            'product_color_en' => $request->product_color_en,
            'product_color_vn' => $request->product_color_vn,
            'product_color_cn' => $request->product_color_cn,

            'short_description_en' => $request->short_description_en,
            'short_description_vn' => $request->short_description_vn,
            'short_description_cn' => $request->short_description_cn,
            'long_description_en' => $request->long_description_en,
            'long_description_vn' => $request->long_description_vn,
            'long_description_cn' => $request->long_description_cn,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'status' => 1,
            'updated_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Product Updated Without Image Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('manage-product')->with($notification);
    }
    /// Multi Image Update
    public function ProductMultiImageUpdate(Request $request)
    {
        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multi-image/' . $make_name);
            $uploadPath = 'upload/products/multi-image/' . $make_name;
            MultiImg::where('id', $id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Product Multi Image Updated Successfully',
            'alert-type' => 'info',
        );
        return redirect()->back()->with($notification);
    }
    // update main thumbnail of product
    public function ProductThumbnailUpdate(Request $request)
    {
        $pro_id = $request->id;
        $oldImg = $request->oldimage;
        unlink($oldImg);
        $image = $request->file('product_thumbnail');
        $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thumbnail/' . $name_generate);
        $save_url = 'upload/products/thumbnail/' . $name_generate;
        Product::findOrFail($pro_id)->update([
            'product_thumbnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Product Thumbnail Updated Successfully',
            'alert-type' => 'info',
        );
        return redirect()->back()->with($notification);
    }
    // multi image delete
    public function DeleteMultiImage($id)
    {
        $oldimage = MultiImg::findOrFail($id);
        unlink($oldimage->photo_name);
        MultiImg::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Product Image Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    // inactivate product
    public function ProductInactive($id)
    {
        Product::findOrFail($id)->update([
            'status' => 0,
        ]);
        $notification = array(
            'message' => 'Product Inactivated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    // activate product
    public function ProductActive($id)
    {
        Product::findOrFail($id)->update([
            'status' => 1,
        ]);
        $notification = array(
            'message' => 'Product Activated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    // Delete product
    public function ProductDelete($id)
    {
        $product = Product::findOrFail($id);
        unlink($product->product_thumbnail);
        Product::findOrFail($id)->delete();
        $images = MultiImg::where('product_id', $id)->get();
        foreach ($images as $image) {
            unlink($image->photo_name);
        }
        MultiImg::where('product_id', $id)->delete();
        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);

    }
    // Detail Product
    public function ProductDetail($id)
    {
        $multiImgs = MultiImg::where('product_id', $id)->get();
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $product = Product::findOrFail($id);
        return view('backend.product.product_detail', compact('product', 'multiImgs', 'categories', 'brands', 'subcategories', 'subsubcategories'));
    }
}