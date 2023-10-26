<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('ref_no')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->tinyInteger('featured')->default(0);
            $table->enum('type',['Rent','Sale']);
            $table->integer('category_id');
            $table->text('description');
            $table->string('image')->nullable();
            $table->integer('bedroom');
            $table->integer('bathroom');
            $table->string('area_sqm');
            $table->string('area_sqf');
            $table->string('price_sqm');
            $table->string('price_sqf');
            $table->integer('user_id')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('address')->nullable();
            $table->integer('attitude')->nullable();
            $table->integer('longitude')->nullable();
            $table->string('near_by')->nullable();
            $table->enum('furnished_status',['Furnished','Unfurnished']);
            $table->string('rental_period')->nullable();
            $table->string('parking_lots')->nullable();
            $table->string('qr_code')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
