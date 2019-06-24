<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;
use Image;
class ProductController extends Controller
{
    public function addProduct(){
     $all_product = Product::paginate(5);
     $deleted_product = Product::onlyTrashed()->get();
     $categories = Category::all();
        return view('product.addproduct', compact('all_product', 'deleted_product', 'categories'));
    }
    public function productInsert(Request $request){


        $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required|numeric',
            'product_quantity' => 'required',
            'product_alert_quantity' => 'required|numeric'
        ]);
    $last_inserted_id = Product::insertGetId([
        'category_id' => $request->category_id,
        'product_name' => $request->product_name,
        'product_description' => $request->product_description,
        'product_price' => $request->product_price,
        'product_quantity' => $request->product_quantity,
        'product_alert_quantity' => $request->product_alert_quantity,
    ]);

        if($request->hasFile('product_image')){
            //echo $last_inserted_id;
            $photo_to_uploaded = $request->product_image;
            $filename = $last_inserted_id. '.' .$photo_to_uploaded->getClientOriginalExtension();

           Image::make($photo_to_uploaded)->resize(400,450)->save(base_path('public/uploads/product_photo/' . $filename));
           Product::find($last_inserted_id)->update([
               'product_image' => $filename
           ]);
        }
    return back()->with('status', 'Data inserted successfully');
    }
    public function deleteProduct($id){
       Product::where('id', $id)->delete();
       return back()->with('deletemsg', 'Data deleted');
    }
    public function editProduct($id){
        $product = Product::findOrFail($id);
        return view('product.editProduct', compact('product'));
    }
    public function updateProduct(Request $request){
        if($request->hasFile('product_image')){
            if (Product::find($request->id)->product_image == 'defaultproductphoto.jpg'){
                $photo_to_uploaded = $request->product_image;
                $filename = $request->id. '.' .$photo_to_uploaded->getClientOriginalExtension();

                Image::make($photo_to_uploaded)->resize(400,450)->save(base_path('public/uploads/product_photo/' . $filename));
                Product::find($request->id)->update([
                    'product_image' => $filename
                ]);
            }else{
                //first delete the old photo
                $del_this_photo = Product::find($request->id)->product_image;
                unlink(base_path('public/uploads/product_photo/' . $del_this_photo));
                //upload new photo
                $photo_to_uploaded = $request->product_image;
                $filename = $request->id. '.' .$photo_to_uploaded->getClientOriginalExtension();
                Image::make($photo_to_uploaded)->resize(400,450)->save(base_path('public/uploads/product_photo/' . $filename));
                Product::find($request->id)->update([
                    'product_image' => $filename
                ]);
            }
        }
        Product::find($request->id)->update([
            'product_name' => $request->product_name,
        'product_description' => $request->product_description,
        'product_price' => $request->product_price,
        'product_quantity' => $request->product_quantity,
        'product_alert_quantity' => $request->product_alert_quantity,
        ]);
        return back()->with('updatedmsg', 'Data updated successfully');
    }
    public function restoreProduct($id){
        Product::withTrashed()->where('id', $id)->restore();
        return back();
    }
    public function forceDeleteProduct($id){
        //force delete photo
        $del_this_photo = Product::onlyTrashed()->find($id)->product_image;
        unlink(base_path('public/uploads/product_photo/' . $del_this_photo));
        Product::onlyTrashed()->find($id)->forceDelete();
        return back();
    }

}
