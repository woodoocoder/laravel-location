<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WoodoocoderLaravelLocationRegion extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $tablePrefix = config('woodoocoder.location.table_prefix');
        
        Schema::create($tablePrefix.'regions',
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('country_id')->unsigned();
                $table->string('name', 255)->nullable();
                $table->string('en_name', 255);
                $table->boolean('approved')->default(false);
                $table->timestamps();
                $table->softDeletes();

                $table->foreign('country_id')->references('id')
                        ->on($tablePrefix.'countries')
                        ->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists(config('woodoocoder.location.table_prefix').'regions');
    }
}
