<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{

protected $fillable = ['type' , 'price'];


public function Users(){

return $this->belongsToMany(User::class , 'users_subscriptions');

}




}
