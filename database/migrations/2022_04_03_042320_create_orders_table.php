<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->bigInteger('total_pay');
            $table->integer('status',0)->comment('0 = Belum Bayar','1 = Sudah Bayar','2 = Sudah Dikirim','3 = Sudah Diterima','4 = Dibatalkan, 5 = Kadaluarsa');
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
        Schema::dropIfExists('orders');
    }
}
