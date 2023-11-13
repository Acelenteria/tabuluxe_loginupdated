<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function criterias()
    {
        return $this->hasMany(Criteria::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
