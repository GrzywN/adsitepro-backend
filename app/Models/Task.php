<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'owner_id',
        'assigned_user_id',
        'estimated_minutes',
        'assigned_at',
        'completed_at',
    ];

    protected $casts = [
        'assigned_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function markAsCompleted(): self
    {
        $this->completed_at = now();
        $this->save();

        return $this;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(TaskCategory::class)->withTrashed();
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function assignedUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_user_id');
    }
}
