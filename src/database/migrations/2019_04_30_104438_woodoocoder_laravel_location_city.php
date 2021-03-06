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
        $tablePrefix = config('woodoocoder.location.table_prefix');
        
        Schema::create($tablePrefix.'cities',
            function (Blueprint $table) use ($tablePrefix) {
                $table->increments('id');
                $table->integer('country_id')->unsigned()->nullable();
                $table->integer('region_id')->unsigned()->nullable();
                $table->string('name', 255)->nullable();
                $table->string('en_name', 255);
                $table->decimal('latitude', 10, 8)->nullable();
                $table->decimal('longitude', 11, 8)->nullable();
                $table->boolean('approved')->default(false);
                $table->timestamps();
                $table->softDeletes();

                $table->foreign('country_id')->references('id')
                        ->on($tablePrefix.'countries')
                        ->onDelete('cascade');

                $table->foreign('region_id')->references('id')
                        ->on($tablePrefix.'regions')
                        ->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists(config('woodoocoder.location.table_prefix').'cities');
    }
}
