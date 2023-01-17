<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    protected $table = 'booking';
    protected $fillable = ['name' , 'email' , 'phone' , 'date' , 'time' , 'booking_type' , 'address'];

    public function booking_test()
    {
        return $this->hasMany(BookingTest::class , 'booking_id');
    }
}
