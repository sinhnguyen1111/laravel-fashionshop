<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\User;


class Image extends Model
{
    use Notifiable;
    
    protected $table='images';
    protected $fillable = [
        'name','path','product_id','user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
