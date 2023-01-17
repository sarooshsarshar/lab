<?php

namespace App;

use App\Resources\TestModel;
use Illuminate\Database\Eloquent\Model;

class BookingTest extends Model
{
    protected $table = 'booking_test';
    protected $fillable = ['booking_id' , 'test_id' ];

    public function test()
    {
        return $this->hasOne(TestModel::class , 'id' , 'test_id');
    }
}
