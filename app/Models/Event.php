<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';
    protected $guarded = ['id'];

    public function eventType()
    {
        return $this->belongsTo(EventType::class,'event_type_id');
    }

    public function event_partner()
    {
        return $this->belongsToMany(Brand::class,'event_partner','event_id','brand_id')->withTimestamps();
    }

    public function event_participant()
    {
        return $this->belongsToMany(User::class,'event_participant','event_id','user_id')->withPivot('is_attend')->withTimestamps();
    }

    public function digital()
    {
        return $this->hasMany(Digital::class,'event_id');
    }
}
