<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Client extends Model implements Transformable
{
    use TransformableTrait;

   protected $fillable= ['user_id',
                         'address',
                         'phone',
                         'city',
                         'state',
                         'zipcode',
                         ];
    
    public function users()
    {
        return $this->hasOne(User::class,'id','user_id');    
    
    }
    
}
