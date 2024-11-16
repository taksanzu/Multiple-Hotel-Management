<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceUser extends Model
{
    use HasFactory;

    protected $table = 'service_user';

    protected $fillable = [
        'room_id',
        'service_id',
        'status',
    ];
}
