<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentHistory extends Model
{
    protected $fillable = [
        'user_id',
        'student_name',
        'student_id_number',
        'violation_type',
        'description',
        'incident_date',
        'location',
        'severity',
        'status',
        'sanctions',
        'resolved_date',
        'handled_by',
        'notes',
    ];

    protected $casts = [
        'incident_date' => 'date',
        'resolved_date' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function handler(): BelongsTo
    {
        return $this->belongsTo(User::class, 'handled_by');
    }
}
