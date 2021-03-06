<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->string('firstName', 30);
            $table->string('company', 30);
            $table->string('address', 60);
            $table->string('city', 30);
            $table->smallInteger('postalCode');
            $table->string('email', 60)();
            $table->integer('phone')->unsigned();
            $table->integer('mobilePhone')->unsigned();
            $table->integer('fax')->unsigned();
            $table->integer('category_id', 10);
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
        Schema::dropIfExists('customers');
    }
}
