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
        Schema::create('t_terminals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string("mac_address");
            $table->unsignedBigInteger('store_id');
            $table->timestamps();
            $table->engine ="InnoDB";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_terminals');
    }
};
