<?php

namespace App\Resources;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class PackageModel extends Model implements AuthenticatableContract
{
    use Authenticatable;
    protected $table = 'packages';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'slogan', 'totalprice', 'discountprice', 'subscribtion_type', 'trial_days', 'benifit', 'group_id', 'status', 'created_by', 'updated_by'];
}
