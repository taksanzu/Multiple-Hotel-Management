<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'stars',
        'status',
        'number_of_rooms',
        'deleted',
        'created_by',
        'videolink',
        'link360',
        'image360',
    ];

    public function roomImages()
    {
        return $this->hasMany(room_images::class, 'room_id', 'id');
    }
}
