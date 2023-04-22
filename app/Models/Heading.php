<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Heading extends Model
{

    use HasFactory;
    use softDeletes;


    protected $fillable = [
        'title',
        'description',

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
