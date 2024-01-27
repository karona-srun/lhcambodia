<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_categories', function (Blueprint $table) {
            $table->string('name_km')->nullable()->after('name');
        });

        Schema::table('product_sub_categoories', function (Blueprint $table) {
            $table->string('name_km')->nullable()->after('name');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->string('product_name_km')->nullable()->after('product_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_categories', function (Blueprint $table) {
            //
        });

        Schema::table('product_sub_categoories', function (Blueprint $table) {
            //
        });

        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
