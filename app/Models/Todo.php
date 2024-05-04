<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'datetime',
        'done',
        'user_id',
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . $filters['search'] . '%')
                ->orWhere('description', 'like', '%' . $filters['search'] . '%');
        }

        if ($filters['type'] ?? false) {
            if ($filters['type'] == 'today') {
                $query->where('datetime', 'like', '%' . Carbon::now()->toDateString() . '%');
            } else if ($filters['type'] == 'week') {
                $now = Carbon::now();

                $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
                $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');

                $query->whereBetween('datetime', [$weekStartDate, $weekEndDate]);
            } else if ($filters['type'] == 'month') {
                $monthStartDate = $filters['dateObject']->firstOfMonth()->format('Y-m-d H:i');
                $monthEndDate = $filters['dateObject']->lastOfMonth()->format('Y-m-d H:i');

                $query->whereBetween('datetime', [$monthStartDate, $monthEndDate]);
            }
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
