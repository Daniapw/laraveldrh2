<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 400);
            $table->string('author', 300)->default('Desconocido');
            $table->bigInteger('genre_id')->unsigned();
            $table->text('synopsis')->default("-");
            $table->text('expanded_info')->default("-");
            $table->string('cover_img_file', 300)->default('default_cover.jpg');
            $table->date('publication_date');
            $table->timestamps();

            $table->foreign('genre_id')->references('id')->on('genres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
