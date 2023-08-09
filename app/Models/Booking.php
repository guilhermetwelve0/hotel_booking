<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'total',
        'guest_id',
        'check_in_date',
        'check_out_date'
    ];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }
}
