<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'service';

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }

    public function service_user()
    {
        return $this->hasMany(ServiceUser::class, 'service_id');
    }
}
