<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const MAX_MONTHLY_CAPACITY_IN_MINUTES = 9600;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isCapableForTaskAssignment(int $potentialMinutesForTask): bool
    {
        $alreadyAssignedMinutes = Task::where('assigned_user_id', $this->id)
            ->whereDate('assigned_at', '>=', now()->startOfMonth())
            ->sum('estimated_minutes');

        return $alreadyAssignedMinutes + $potentialMinutesForTask <= self::MAX_MONTHLY_CAPACITY_IN_MINUTES;
    }

    public function ownedTasks(): HasMany
    {
        return $this->hasMany(Task::class, 'owner_id');
    }

    public function assignedTasks(): HasMany
    {
        return $this->hasMany(Task::class, 'assigned_user_id');
    }

    public function taskCategories(): HasMany
    {
        return $this->hasMany(TaskCategory::class);
    }
}
