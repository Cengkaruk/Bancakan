<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateQuestionIdType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      $report_questions = App\ReportQuestion::all();
      foreach ($report_questions as $report) {
        $report->question_id_change_type = intval($report->question_id);
        $report->save();
      }

      Schema::table('report_questions', function (Blueprint $table) {
        $table->dropColumn('question_id')->change();
        $table->renameColumn('question_id_change_type', 'question_id');
      });

      Schema::table('report_questions', function (Blueprint $table) {
        $table->unsignedinteger('question_id')->nullable(false)->change();
      });

      $vote_questions = App\VoteQuestion::all();
      foreach ($vote_questions as $vote) {
        $vote->question_id_change_type = intval($vote->question_id);
        $vote->save();
      }

      Schema::table('vote_questions', function (Blueprint $table) {
        $table->dropColumn('question_id')->change();
        $table->renameColumn('question_id_change_type', 'question_id');
      });

      Schema::table('vote_questions', function (Blueprint $table) {
        $table->unsignedinteger('question_id')->nullable(false)->change();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
