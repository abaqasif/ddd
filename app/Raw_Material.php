<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raw_Material extends Model
{
    //
    public function recipes(){
        return $this->belongsToMany('App\Recipe','recipe_rm','rm_code','recipe_id');
    }
}
