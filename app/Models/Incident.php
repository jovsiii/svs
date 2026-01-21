<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Incident extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'reported_by',
        'is_anonymous',
        'type',
        'description',
        'incident_date',
        'location',
        'status',
        'people_involved_names',
        'people_involved_type',
        'evidence_type',
        'evidence_path',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'incident_date' => 'date',
            'is_anonymous' => 'boolean',
        ];
    }

    public function reporter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reported_by');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reported_by');
    }
}
