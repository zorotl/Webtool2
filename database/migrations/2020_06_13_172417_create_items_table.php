<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('warehouse_id')->unsigned();
            $table->bigInteger('storage_location_id')->unsigned();
            $table->bigInteger('storage_place_id')->unsigned();
            $table->bigInteger('brand_id')->unsigned();
            $table->bigInteger('item_condition_id')->unsigned();
            $table->bigInteger('item_type_id')->unsigned();
            $table->integer('anzahl');
            $table->string('name');
            $table->string('name2')->nullable()->default(null);
            $table->string('beschreibung')->nullable()->default(null);
            $table->string('artikel_nummer')->nullable()->default(null);
            $table->string('ean')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('warehouse_id')->references('id')->on('warehouses')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('storage_location_id')->references('id')->on('storage_locations')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('storage_place_id')->references('id')->on('storage_places')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('brand_id')->references('id')->on('brands')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('item_condition_id')->references('id')->on('item_conditions')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('item_type_id')->references('id')->on('item_types')
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
        Schema::dropIfExists('items');
    }
}
