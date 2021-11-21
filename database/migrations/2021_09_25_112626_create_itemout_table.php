<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemout', function (Blueprint $table) {
            $table->id('itemout_id');
            $table->integer('quantityout')->nullable();
            $table->string('item')->nullable();
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->foreignId('table_id')->index();
            $table->foreignId('user_id')->index();
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
        Schema::dropIfExists('itemout');
    }
}
