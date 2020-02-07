<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class userponencia extends Model
{
     use SoftDeletes; 

    protected $table = 'userponencia';
    

    protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['iduser', 'idponencia']; 
    
     
    
           public function ponencia() {
        return $this->belongsTo('App\ponencia', 'idponencia');
    }
             public function post() {
        return $this->belongsTo('App\user', 'iduser');
    }
}
