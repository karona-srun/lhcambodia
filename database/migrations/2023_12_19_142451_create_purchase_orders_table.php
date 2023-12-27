<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_order_no')->nullable();
            $table->bigInteger('customer_id');
            $table->string('purchase_order');
            $table->string('reference');
            $table->date('sale_order_date');
            $table->date('expected_shipment_date');
            $table->string('warehouse')->nullable();
            $table->string('purchase_person')->nullable();
            $table->string('delivery_method')->nullable();
            $table->integer('delivery_method_status')->nullable()->comment('1 Waiting, 2 Delivery, 3 Done');
            $table->bigInteger('user_id')->nullable();
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
        Schema::dropIfExists('purchase_orders');
    }
}
