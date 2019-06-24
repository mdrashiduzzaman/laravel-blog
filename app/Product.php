<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
   use SoftDeletes;
   protected  $fillable = ['product_name', 'product_description', 'product_price', 'product_quantity', 'product_alert_quantity', 'product_image' ];
   protected $dates = ['deleted_at'];

   function relationcategory(){
       return $this->hasOne('App\Category', 'id', 'category_id', );
   }
}
