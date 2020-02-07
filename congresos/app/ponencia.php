<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ponencia extends Model
{
    
        public function ponencia() {
        return $this->hasMany('App\ponencia');
    }
}
