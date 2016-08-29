<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('replies', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id');
        $table->integer('answer_id')->nullable();
        $table->integer('reply_id')->nullable();
        $table->string('reply');
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
      Schema::drop('replies');
    }
}
