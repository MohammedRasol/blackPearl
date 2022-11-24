<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class MultiMedia extends Model
{
    use HasFactory;
    protected $table = "multimedia";
    protected $fillable = ["element_type", "element_id", "logo", "path", "color"];
    public $timestamps = false;
    public function products()
    {
        return $this->belongsTo(Product::class, "element_id", "id");
    }
    public function categories()
    {
        return $this->belongsTo(Category::class, "element_id", "id");
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, "element_id", "id");
    }
    public function user()
    {
        return $this->belongsTo(User::class, "element_id", "id");
    }
    public function country()
    {
        return $this->belongsTo(Country::class, "element_id", "id");
    }
}
