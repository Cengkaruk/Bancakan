<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUseUnasignedInteger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('questions', function (Blueprint $table) {
        $table->unsignedinteger('user_id')->change();
      });

      Schema::table('question_topic', function (Blueprint $table) {
        $table->unsignedinteger('question_id')->change();
        $table->unsignedinteger('topic_id')->change();
      });

      // Special case
      // - report_questions
      // - vote_questions
      // Cast from string to unsignedinteger
      Schema::table('report_questions', function (Blueprint $table) {
        $table->unsignedinteger('user_id')->change();
        $table->unsignedinteger('question_id_change_type')->nullable();
      });

      Schema::table('vote_questions', function (Blueprint $table) {
        $table->unsignedinteger('user_id')->change();
        $table->unsignedinteger('question_id_change_type')->nullable();
      });

      Schema::table('answers', function (Blueprint $table) {
        $table->unsignedinteger('user_id')->change();
        $table->unsignedinteger('question_id')->change();
      });

      Schema::table('vote_answers', function (Blueprint $table) {
        $table->unsignedinteger('user_id')->change();
        $table->unsignedinteger('answer_id')->change();
      });

      Schema::table('report_answers', function (Blueprint $table) {
        $table->unsignedinteger('user_id')->change();
        $table->unsignedinteger('answer_id')->change();
      });

      Schema::table('replies', function (Blueprint $table) {
        $table->unsignedinteger('user_id')->change();
        $table->unsignedinteger('answer_id')->change();
        $table->unsignedinteger('reply_id')->change();
      });

      Schema::table('report_replies', function (Blueprint $table) {
        $table->unsignedinteger('user_id')->change();
        $table->unsignedinteger('reply_id')->change();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('questions', function (Blueprint $table) {
        $table->integer('user_id')->change();
      });

      Schema::table('question_topic', function (Blueprint $table) {
        $table->integer('question_id')->change();
        $table->integer('topic_id')->change();
      });

      Schema::table('report_questions', function (Blueprint $table) {
        $table->integer('user_id')->change();
        $table->integer('question_id')->change();
      });

      Schema::table('vote_questions', function (Blueprint $table) {
        $table->integer('user_id')->change();
        $table->integer('question_id')->change();
      });

      Schema::table('answers', function (Blueprint $table) {
        $table->integer('user_id')->change();
        $table->integer('question_id')->change();
      });

      Schema::table('vote_answers', function (Blueprint $table) {
        $table->integer('user_id')->change();
        $table->integer('answer_id')->change();
      });

      Schema::table('report_answers', function (Blueprint $table) {
        $table->integer('user_id')->change();
        $table->integer('answer_id')->change();
      });

      Schema::table('replies', function (Blueprint $table) {
        $table->integer('user_id')->change();
        $table->integer('answer_id')->change();
        $table->integer('reply_id')->change();
      });

      Schema::table('report_replies', function (Blueprint $table) {
        $table->integer('user_id')->change();
        $table->integer('reply_id')->change();
      });
    }
}
