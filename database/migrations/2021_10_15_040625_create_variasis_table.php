<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('foto');
            $table->unsignedBigInteger('produk_id');
            $table->foreign('produk_id')->on('produks')->references('id')->onDelete('cascade');
            $table->integer('stok');
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
        Schema::dropIfExists('variasis');
    }
}
