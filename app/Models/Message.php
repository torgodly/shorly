<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory;
    use softDeletes;

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
