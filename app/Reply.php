<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
  use SoftDeletes;

  protected $dates = ['deleted_at'];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function answer()
  {
    return $this->belongsTo('App\Answer');
  }

  public function replied()
  {
    return $this->belongsTo('App\Reply', 'reply_id');
  }

  public function replies()
  {
    return $this->hasMany('App\Reply');
  }

  public function getReply($reply_id)
  {
    return Reply::find($reply_id);
  }

  public static function getReplyAuthor($reply_id)
  {
    return Reply::find($reply_id)->user;
  }
}
