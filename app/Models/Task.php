<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;
    
    protected $table = 'tasks';

    protected $fillable = [
        'title',
        'description',
        'user_id'
    ];

    public function user (): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }
}
