<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('product_info', function (Blueprint $table) {
            $table->id();
            $table->string("discription_ar");
            $table->string("discription_en");
            $table->string("size")->nullable();
            $table->string("color")->nullable();
            $table->integer("qty")->default(0);
            $table->unsignedBigInteger("product_id");
            $table->foreign("product_id")->references("id")->on("products");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
             Schema::dropIfExists('product_info');
    }
};
