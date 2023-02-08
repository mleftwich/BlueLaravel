<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* Create Todo model */
class Todo extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $casts = [
        'is_complete' => 'boolean',
    ];
    public $timestamps = false;
}
