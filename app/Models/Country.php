<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = "countries";
    protected $fillable = ["code", "name_ar", "name_en", "phone_key"];
    public $timestamps = false;

    public function multiMedia()
    {
        return $this->hasMany(MultiMedia::class, "element_id", "id");
    }

}
