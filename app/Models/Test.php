<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'test_date',
        'location',
    ];

    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name . ' ' . $this->middle_name;
    }

    public function setCriteriaByScore(): void
    {
        if (!(int)$this->score) return;

        $this->criterion = match (true) {
            $this->score <= 60 => 100,
            $this->score > 60 && $this->score <= 80 => 200,
            $this->score > 80 && $this->score <= 90 => 300,
            $this->score > 90 && $this->score <= 100 => 500,
        };
    }

    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'manager_id');
    }
}
