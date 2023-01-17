<?php

namespace App\Resources;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Spatie\Permission\Traits\HasRoles;
use Laratrust\Traits\LaratrustUserTrait;

class UserModel extends Model implements AuthenticatableContract
{

    use LaratrustUserTrait;
    use Authenticatable;
    protected $table = 'users';
}
