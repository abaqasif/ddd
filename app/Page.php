<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User', 'page_user', 'page_id' , 'user_id');
    }
}
