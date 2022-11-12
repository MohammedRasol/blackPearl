<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductInfo;
use App\Models\SubCategory;
use App\Models\SpecialProduct;
use App\Models\ProductReviews;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = ["name_ar", "name_en", "logo", "active", "price", "sub_category_id "];
    public function product_info()
    {
        return $this->hasOne(ProductInfo::class, "product_id", "id");
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, "id", "id");
    }
    public function specialProduct()
    {
        return $this->belongsTo(SpecialProduct::class, "id", "product_id");
    }
    public function productReviews()
    {
        return $this->hasMany(ProductReviews::class, "product_id", "id");
    }
    public function productRateAvg()
    {
        return $this->hasMany(ProductReviews::class, "product_id", "id")->selectRaw("product_id,AVG(rate) as rating")->groupBy('product_id');
    }
}
