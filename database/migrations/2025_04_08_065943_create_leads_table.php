<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
             $table->id('id_leads');
            $table->date('tanggal');
            $table->unsignedBigInteger('id_sales');
            $table->unsignedBigInteger('id_produk');
            $table->string('no_wa');
            $table->string('nama_lead');
            $table->string('kota');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_sales')->references('id_sales')->on('sales');
            $table->foreign('id_produk')->references('id_produk')->on('produk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
        Schema::table('leads',function(Blueprint $table){
            $table->dropSoftDeletes();
        });
    }
};
