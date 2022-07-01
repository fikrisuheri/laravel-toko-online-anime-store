<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->timestamp('paid_at')->nullable();
            $table->string('recipient_name');
            $table->string('snap_token')->nullable();
            $table->string('destination');
            $table->string('address_detail');
            $table->string('courier');
            $table->string('subtotal');
            $table->string('shipping_cost');
            $table->string('shipping_method');
            $table->string('receipt_number')->nullable();
            $table->string('total_weight');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
