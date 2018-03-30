<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('surname');
            $table->string('othername');
            $table->string('fileno')->unique();
            $table->string('department');
            $table->string('appointment');
            $table->string('rank');
            $table->string('date_joined');
            $table->decimal('amount', 10, 2);
            $table->string('next_of_kin');
            $table->string('address');
            $table->string('phone');
            $table->string('bank');
            $table->string('acc_name');
            $table->string('acc_no');
            $table->string('image');
            $table->string('status');
            $table->softDeletes();
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
        Schema::dropIfExists('members');
    }
}
