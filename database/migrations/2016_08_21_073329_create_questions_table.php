<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('questions', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('user_id');
      $table->string('slug');
      $table->string('question');
      $table->text('detail');
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
    Schema::drop('questions');
  }
}
