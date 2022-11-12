<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductReviews extends Model
{
    use HasFactory;
    protected  $table = "product_reviews";
    protected $fillable = ["user_id", "product_id", "rate", "comment"];
    protected $hidden = ["user_id", "product_id"];

    public function product()
    {
        return $this->belongsTo(Product::class, "product_id", "id");
    }

 
}
