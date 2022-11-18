<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Color;

class ProductInfo extends Model
{
    use HasFactory;
    protected $table = "product_info";
    protected $fillable = ["discription_en", "discription_ar", "size", "color", "product_id","qty"];
    protected $hidden = ["product_id", "id"];
    public $timestamps = false;


    public function product()
    {
        return $this->belongsTo(Category::class, "product_id", "id");
    }

    public function color()
    {
        return $this->hasOne(Color::class, "id", "color_id");
    }
}
