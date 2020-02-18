<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class UserponenciaC extends Model
{
     use SoftDeletes; 

    protected $table = 'userponencia';
    

    protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['iduser', 'idponencia']; 
    
     
    
           public function ponencia() {
        return $this->belongsTo('App\Ponencia', 'idponencia');
    }
             public function user() {
        return $this->belongsTo('App\User', 'iduser');
    }
}
