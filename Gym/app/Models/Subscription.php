<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{

protected $fillable = ['type' , 'price'];


public function Users(){

return $this->belongsToMany(User::class , 'subscription_user')->withPivot('price', 'count', 'start_date', 'end_date')
->withTimestamps();
;

}




}
