<?php

namespace App\Resources;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class TestModel extends  Model implements AuthenticatableContract
{
    use Authenticatable;
    protected $table = 'test';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'group_id', 'status', 'price', 'duration', 'prference_range', 'unit_id', 'detail'];
}
