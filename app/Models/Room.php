<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'floor',
        'room_no',
        'room_type_id',
    ];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id', 'id');
    }

    public function services()
    {
        return $this->belongsToMany(ServiceFacility::class, 'room_service_facility');
    }

    public function bookings()
    {
        return $this->belongsToMany(Booking::class, 'booking_room');
    }
}
