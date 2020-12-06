<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use Notifiable;
    
    protected $table='user_info';
    public function user(){
        return $this->belongTo('App\User');
    }
}
