<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $fillable = ["name_ar", "name_en", "logo", "active"];
    public function sub_category()
    {
        return $this->hasMany(SubCategory::class, "category_id", "id");
    }
}