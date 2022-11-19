<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = "sub_category";
    protected $fillable = ["name_ar", "name_en", "logo", "active", "category_id"];
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id", "id");
    }
    public function products()
    {
        return $this->hasMany(Product::class, "sub_category_id", "id");
    }
    public function multiMedia()
    {
        return $this->hasMany(MultiMedia::class, "element_id", "id");
    }
}
