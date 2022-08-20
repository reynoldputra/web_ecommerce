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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomor_transaksi');
            $table->string('bank_user');
<<<<<<< HEAD
            $table->foreignId('admin_id')->constrained('admins'); // ini harusnya nullable
            $table->foreignId('cart_id')->constrained('cart')->onDelete('cascade');
=======
            $table->foreignId('admin_id')->constrained('users'); // ini harusnya nullable
            $table->foreignId('cart_id')->constrained('cart');
>>>>>>> 812f57f31f368f39563f40cd21d385e45aaee599
            $table->foreignId('status_transaksi_id')->constrained('status_transaksis');
            $table->foreignId('bank_id')->constrained('banks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};
