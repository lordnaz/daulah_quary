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
            $table->id('table_id');
            $table->string('item_name')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('type')->nullable();
            $table->string('subtype')->nullable();
            $table->string('SerialNum')->nullable();
            $table->string('image')->nullable();
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('items');
    }
}
