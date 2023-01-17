<?php

namespace App\Resources;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class UnitModel extends Model implements AuthenticatableContract
{
    use Authenticatable;
    protected $table = 'unit';
    protected $primaryKey = 'id';
    protected $fillable = ['unit_name'];
}
