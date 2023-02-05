<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $guarded = [""];
    public $timestamps = false;

    public function subCategory()
    {
        return $this->hasMany(Category::class, "parent_id", "id");
    }

    public function multiMedia()
    {
        return $this->hasMany(MultiMedia::class, "element_id", "id");
    }

}
