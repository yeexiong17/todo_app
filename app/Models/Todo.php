<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'datetime'];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['type'] == 'today') {
            $query->where('datetime', 'like', '%' . Carbon::now()->toDateString() . '%');
        }
    }
}
