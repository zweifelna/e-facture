<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->date('limitDate');
            $table->string('description');
            $table->double('hourlyRate');
            $table->double('hourNumber');
            $table->double('HTAmount');
            $table->double('TTCAmount');
            $table->tinyInteger('TVA');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('status_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('status_id')->references('id')->on('status');
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
        Schema::dropIfExists('invoices');
    }
}
