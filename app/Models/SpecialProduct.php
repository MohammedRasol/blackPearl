<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class SpecialProduct extends Model
{
    use HasFactory;
    protected $fillable = ["product_id", "fromDate", "endDate", "type"];
    protected $table = "special_products";

    public function products()
    {
        return $this->hasMany(Product::class, "id", "product_id");
    }
}
