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
        'slug',
        'price',
        'link360',
        'image360',
    ];

    public function roomImages()
    {
        return $this->hasMany(room_images::class, 'room_id', 'id');
    }

    public function service_user()
    {
        return $this->hasMany(ServiceUser::class, 'room_id', 'id');
    }
    public function userCreated()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
