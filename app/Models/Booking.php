<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'total',
        'guest_id',
        'check_in_date',
        'check_out_date'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid()->toString();

            $authUserId = Auth::id();

            if ($authUserId) {
                $model->created_by = $authUserId;
            }
        });

        static::updating(function ($model) {
            $authUserId = Auth::id();

            if ($authUserId) {
                $model->updated_by = $authUserId;
            }
        });
    }

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }
    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'booking_room');
    }
    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function updatedByUser()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
