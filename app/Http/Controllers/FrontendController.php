<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;
use App\Product;
use App\Contact;

use Mail;
use App\Mail\ContactMessage;



class FrontendController extends Controller
{
    public function welcome(){
        $products = Product::all();
        $categories = Category::all();
        return view('welcome', compact('products', 'categories'));
    }
   public function product($id){
       $single_product = Product::findOrFail($id);
       $related_product = Product::where('id', '!=', $id)->where('category_id', $single_product->category_id)->get();
       return view('product', compact('single_product', 'related_product'));
   }
   public function contact(){
    return view('contact');
   }
   public function contactinsert(Request $request){
    Contact::insert($request->except('_token'));

    //send mail to the company
    $first_name = $request->first_name;
    $message = $request->message;
      Mail::to('rashu_255@yahoo.com')->send(new ContactMessage($first_name, $message));
    //Contact::insert([
      //'first_name' => $request->first_name,
      //'last_name' => $request->last_name,
      //'subject' => $request->subject,
      //'message' => $request->message,

    //])
      // return redirect('link here');
    //return back()->with('status', 'Message has been sent successfully !');
   }
}
