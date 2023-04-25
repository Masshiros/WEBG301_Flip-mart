<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class WishlistController extends Controller
{
     // add to wish list
     public function AddToWishList(Request $request, $id){
        if(Auth::check()){
            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$id)->first();
            if(!$exists){
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $id,
                    'created_at' => Carbon::now(),
                    
                ]);
                return response()->json(['success' => 'Successfully Added On Your Wishlist']);
            }
            else{
                return response()->json(['error' => 'This Product Has Already on Your Wishlist']);
            }
           
        }else{
            return response()->json(['error' => 'At First Login Your Account']);
        }
    }
    // end method
    // view wishlist
    public function ViewWishList(){
        return view('frontend.user.wishlist.view_wishlist');
    }
    public function GetWishlistProduct(){
        $wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
        return response()->json($wishlist);
    } // end method
    //remove wish list
    public function RemoveWishlistProduct($product_id){
        Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->delete();
        return response()->json(['success' => 'Successfully Deleted From Your Wishlist']);
        
    }
}