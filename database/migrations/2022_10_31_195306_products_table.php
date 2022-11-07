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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name_ar");
            $table->string("name_en");
            $table->double("price")->default(0);
            $table->string("logo")->nullable();
            $table->integer("active")->default(1);
            $table->unsignedBigInteger("sub_category_id");
            $table->foreign("sub_category_id")->references("id")->on("sub_category");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
