<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
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
}
