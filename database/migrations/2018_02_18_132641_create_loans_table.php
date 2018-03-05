<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('fileno')->unique();
            $table->string('department');
            $table->string('date_of_appointment');
            $table->string('rank');
            $table->string('type_of_loan');
            $table->string('date_joined');
            $table->decimal('amount_saved');
            $table->string('date_of_last_loan');
            $table->decimal('amount_outstanding');
            $table->decimal('amount_of_advance');
            $table->string('period_of_payment');
            $table->string('purpose_of_loan');
            $table->string('phone');
            $table->string('e_account');
            $table->string('status');
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
        Schema::dropIfExists('loans');
    }
}
