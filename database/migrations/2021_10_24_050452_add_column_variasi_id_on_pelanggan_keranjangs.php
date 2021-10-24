<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnVariasiIdOnPelangganKeranjangs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pelanggan_keranjangs', function (Blueprint $table) {
            $table->dropForeign('produk_id');
            $table->dropColumn('produk_id');
            $table->unsignedBigInteger('variasi_id');
            $table->foreign('variasi_id')->on('variasis')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pelanggan_keranjangs', function (Blueprint $table) {
            $table->dropForeign('variasi_id');
            $table->dropColumn('variasi_id');
            $table->unsignedBigInteger('produk_id');
            $table->foreign('produk_id')->on('produks')->references('id')->onDelete('cascade');
        });
    }
}
