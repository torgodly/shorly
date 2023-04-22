<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Button extends Model
{
    use HasFactory;
    use softDeletes;


    protected $fillable = [
        'url',
        'title',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
