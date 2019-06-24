<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function categoryProduct(){
        $categories = Category::all();
        return view('product.category', compact('categories'));
    }
    public function addCategory(Request $request){
        $request->validate([
        'product_category' => 'required|unique:categories,product_category'
        ]);
        if(isset($request->menu_status)){
            Category::insert([
                'product_category' => $request->product_category,
                'menu_status' => true,
                'created_at' =>Carbon::now('Asia/Dhaka')
            ]);
        }else{
            Category::insert([
                'product_category' => $request->product_category,
                'menu_status' => false,
                'created_at' =>Carbon::now('Asia/Dhaka')
            ]);
        }

      return back()->with('status', 'Category inserted');
    }
    public function menuProduct($id){
        $menu_products = Product::where('category_id', $id)->get();
        $categories = Category::where('id', $id)->get();
       return view('menuProduct', compact('menu_products', 'categories'));
    }
}
