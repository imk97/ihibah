<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDividensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dividens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bank');
            $table->string('account', 30);
            $table->date('startDura');
            $table->date('endDura');
            $table->bigInteger('month');
            $table->double('interest', 3, 2);
            $table->date('lastDura');
            $table->double('valLastDura', 10, 2);
            $table->double('total', 10, 2);
            $table->string('accBill', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dividens');
    }
}
