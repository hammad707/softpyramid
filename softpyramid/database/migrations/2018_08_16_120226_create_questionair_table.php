<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionairTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('questionair', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
          	$table->integer('total_questions')->unsigned();
            $table->string('duration');
            $table->boolean('resumable')->default('0');
			$table->boolean('ispublish')->default('0');
			$table->integer('user_id')->unsigned();
           	$table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::dropIfExists('questionair');
    }
}
