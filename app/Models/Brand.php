<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';
    protected $guarded = ['id'];

    public function event_partner()
    {
        return $this->belongsToMany(Event::class,'event_partner','brand_id','event_id')->withTimestamps();
    }
}
