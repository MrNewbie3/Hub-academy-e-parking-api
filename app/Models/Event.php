<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_name',
        'event_date',
        'event_start',
    ];
    protected $casts = [
        'event_date' => 'date',
        'event_start' => 'string',
    ];
    protected $table = 'event';
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
