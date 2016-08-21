<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
  use SoftDeletes;

  protected $dates = ['deleted_at'];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function votes()
  {
    return $this->hasMany('App\VoteAnswer');
  }

  public function reports()
  {
    return $this->hasMany('App\ReportAnswer');
  }

  public function replies()
  {
    return $this->hasMany('App\Reply');
  }
}
