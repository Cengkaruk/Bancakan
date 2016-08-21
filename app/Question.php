<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
  use SoftDeletes;

  protected $dates = ['deleted_at'];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function topics()
  {
    return $this->belongsToMany('App\Topic');
  }

  public function reports()
  {
    return $this->hasMany('App\ReportQuestion');
  }

  public function votes()
  {
    return $this->hasMany('App\VoteQuestion');
  }

  public function answers()
  {
    return $this->hasMany('App\Answer');
  }
}
