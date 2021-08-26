<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $table = 'userslogs';
    protected $guarded = [] ;

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
