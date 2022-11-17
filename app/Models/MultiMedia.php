<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class MultiMedia extends Model
{
    use HasFactory;
    protected $table = "multimedia";
    protected $fillable = ["element_type", "element_id", "path","color"];
    public $timestamps = false;
    public function products()
    {
        return $this->belongsTo(Product::class, "element_id", "id");
        // "mediable_type", "mediable_id", "id"
    }
}
