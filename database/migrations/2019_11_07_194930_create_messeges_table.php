<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messeges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sender_id')->nullable();
            $table->integer('receiver_id')->nullable();
            $table->string('subject')->nullable();
            $table->text('messege')->nullable();
            $table->string('type')->nullable();
            $table->string('phone')->nullable();
            $table->string('is_phone')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('messeges');
    }
}
