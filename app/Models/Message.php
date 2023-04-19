<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'user_id',
        'is_favorite',
        'ip'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
