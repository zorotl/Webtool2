<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoragePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storage_places', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('storage_location_id')->unsigned();
            $table->string('lagerplatz');
            $table->timestamps();

            $table->foreign('storage_location_id')->references('id')->on('storage_locations')
                ->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('storage_places');
    }
}
