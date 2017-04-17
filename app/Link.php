<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //

  public function user() {
    #link may belong to user
    return $this->belongsTo('App\User');
  }
}
