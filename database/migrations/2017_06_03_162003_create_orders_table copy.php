<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
            $table->string('voucherno');
            $table->string('paymentmethod');
            $table->string('transaction_id');
            $table->string('totalproduct');
            $table->string('totalquantity');
            $table->string('totalprice');
			$table->enum('status', ['Approved', 'Delivered', 'Pending']);
            $table->enum('seen', ['0', '1'])->default('0');
			$table->timestamp('created_at')->useCurrent = true; 
            $table->timestamp('updated_at')->useCurrent = true;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
