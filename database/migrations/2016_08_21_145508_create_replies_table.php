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
        $table->unsignedinteger('user_id');
        $table->unsignedinteger('answer_id')->nullable();
        $table->unsignedinteger('reply_id')->nullable();
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
