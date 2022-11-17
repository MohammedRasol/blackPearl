<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductInfo;

class Color extends Model
{
    use HasFactory;
    protected $table = "colors";
    protected $fillable = ["name_ar", "name_en", "hex"];
    public $timestamps = false;

    public function productInfo()
    {
        return $this->belongsTo(ProductInfo::class, "id", "color_id");
    }
}
