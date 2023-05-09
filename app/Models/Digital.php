<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Digital extends Model
{
    use HasFactory;

    protected $table = 'digitals';
    protected $guarded = ['id'];

    public function event()
    {
        return $this->belongsTo(Event::class,'event_id');
    }
}
