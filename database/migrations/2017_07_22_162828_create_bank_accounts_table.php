<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('checking_credits');
            $table->integer('savings_credits');
            $table->integer('other_credits');
            $table->integer('checking_debits');
            $table->integer('savings_debits');
            $table->integer('other_debits');
            $table->integer('checking_total');
            $table->integer('savings_total');
            $table->integer('other_total');
            $table->integer('total');
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
        Schema::dropIfExists('bank_accounts');
    }
}
