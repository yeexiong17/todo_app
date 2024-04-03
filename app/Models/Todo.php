<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'datetime', 'done'];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['type'] == 'today') {
            $query->where('datetime', 'like', '%' . Carbon::now()->toDateString() . '%');
        } else if ($filters['type'] == 'week') {
            $now = Carbon::now();
            $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
            $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');

            $query->whereBetween('datetime', [$weekStartDate, $weekEndDate]);
        } else if ($filters['type'] == 'week') {
            $now = Carbon::now();
            $monthStartDate = $now->firstOfMonth()->format('Y-m-d H:i');
            $monthEndDate = $now->lastOfMonth()->format('Y-m-d H:i');

            $query->whereBetween('datetime', [$monthStartDate, $monthEndDate]);
        }
    }
}
