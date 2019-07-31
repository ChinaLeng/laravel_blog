<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;

class SocialUser extends Model implements AuthenticatableContract, AuthorizableContract
{
	use Authenticatable, Authorizable, Notifiable;
	protected $table = 'social_users';
    protected $fillable = [
        'socialite_client_id','name','avatar','openid','access_token','last_login_ip','email','is_admin','is_speak'
    ];
}