<?php

namespace App\Resources;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class GroupModel extends Model implements AuthenticatableContract
{
    use Authenticatable;
    protected $table = 'group';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
}
