<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('batch_id')->nullable();
            $table->unsignedBigInteger('session_id')->nullable();
            $table->unsignedBigInteger('alumni_id')->nullable();
            $table->string('roll_no')->nullable();
            $table->string('designation')->nullable();
            $table->text('occupation')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
             $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');  
             $table->foreign('batch_id')
                ->references('id')
                ->on('batches')
                ->onDelete('set null');   
                
             $table->foreign('session_id')
                ->references('id')
                ->on('sessions')
                ->onDelete('set null');  

                
             $table->foreign('alumni_id')
                ->references('id')
                ->on('alumnis')
                ->onDelete('set null');     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
