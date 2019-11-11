<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepertmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depertments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('session_id')->nullable();
            $table->integer('batch_id')->nullable();
            $table->string('name')->nullable();
            $table->string('roll_no')->nullable();
            $table->string('hostel')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->text('address')->nullable();
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
        Schema::dropIfExists('depertments');
    }
}
