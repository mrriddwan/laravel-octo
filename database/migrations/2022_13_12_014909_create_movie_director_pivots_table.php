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
        Schema::create('movie_director_pivots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')
                ->references('id')
                ->on('movies')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('movie_director_id')
                ->references('id')
                ->on('movie_directors')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');
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
        Schema::dropIfExists('movie_director_pivots');
    }
};
