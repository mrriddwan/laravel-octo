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
        Schema::create('show_times', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('theater_id')->nullable()->constrained();
            $table->foreign('theater_id')
                ->references('id')
                ->on('theaters')
                ->onDelete('cascade');

            $table->unsignedBigInteger('movie_id')->nullable()->constrained();
            $table->foreign('movie_id')
                ->references('id')
                ->on('movies')
                ->onDelete('cascade');
            $table->dateTime('time_start')->nullable()->constrained();
            $table->dateTime('time_end')->nullable()->constrained();
            $table->integer('theater_room_no')->nullable()->constrained();
            
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
        Schema::dropIfExists('show_times');
    }
};
