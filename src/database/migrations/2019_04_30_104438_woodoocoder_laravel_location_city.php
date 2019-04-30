<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WoodoocoderLaravelLocationCity extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('location_cities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->unsigned();
            $table->integer('region_id')->unsigned();
            $table->string('name', 255)->nullable();
            $table->string('en_name', 255);
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->boolean('approved')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('country_id')->references('id')
                    ->on('location_countries')
                    ->onDelete('cascade');

            $table->foreign('region_id')->references('id')
                    ->on('location_regions')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('location_cities');
    }
}
