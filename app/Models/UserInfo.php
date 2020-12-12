<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class UserInfo extends Model
{
    use Notifiable;
    
    protected $table='user_info';
    protected $fillable = ['user_id','fullname','address'];
    public function user(){
        return $this->belongTo('App\User');
    }
}
