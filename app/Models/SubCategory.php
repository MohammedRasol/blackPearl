<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = "sub_category";
    protected $fillable = ["name_ar", "name_en", "logo", "active", "category_id"];
    public function category()
    {
        return $this->belongsTo(Category::class, "category_id", "id");
    }
}
