<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';
    protected $fillable = [
        'name',
        'phone',
        'email',
        'notes',
        'checkin',
        'checkout',
        'number_of_adults',
        'number_of_children',
        'number_of_rooms',
        'room_type',
        'created_at',
        'updated_at',
        'status',
        'user_id',
    ];

    public function room()
    {
        return $this->belongsTo(Rooms::class, 'room_type');
    }
}
