<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;

class OauthClient extends Model
{
    //
	protected $fillable=['id', 'secret', 'name'];
}
