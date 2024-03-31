<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'title',
        'description',
        'images',
        'contents',
        'type',
        'videolink',
        'link360',
        'status',
        'slug',
        'deleted',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
    ];

    public function userCreated()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function userUpdated()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

}
