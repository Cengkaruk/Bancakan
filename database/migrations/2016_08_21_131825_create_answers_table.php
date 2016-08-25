<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('answers', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedinteger('user_id');
      $table->unsignedinteger('question_id');
      $table->text('answer');
      $table->boolean('blocked')->default(False);
      $table->boolean('anonymouse')->default(False);
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::drop('answers');
  }
}
