<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
        'license_plate',
        'owner_name',
        'entry_hour',
    ];
    protected $casts = [
        // 'entry_hour' => 'time',
    ];
    protected $table = 'attendance';

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
