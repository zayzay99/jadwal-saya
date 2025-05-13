<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
     use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'assigned_at',
        'status',
    ];
    protected $dates = [
        'assigned_at',
        
    ];
    protected $casts = [
   'last_active_at' => 'datetime',
    'expired_at' => 'datetime',
     'assigned_at' => 'datetime',
];
}
