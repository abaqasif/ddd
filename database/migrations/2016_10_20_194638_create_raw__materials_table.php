<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRawMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_materials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rm_code')->unique();
            $table->string('desc');
            $table->string('UOM');
            $table->integer('supplier_id')->unsigned();
            $table->integer('rate');
            $table->integer('re_order');
            $table->integer('open_balance');
            $table->boolean('empty')->default(false);
            $table->boolean('running')->default(false);
            $table->boolean('active')->default(false);
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
        Schema::dropIfExists('raw__materials');
    }
}
