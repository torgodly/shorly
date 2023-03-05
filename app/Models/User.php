<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function messengers(): HasMany
    {
        return $this->hasMany(Messenger::class);
    }

    public function sociallinks(): HasMany
    {
        return $this->hasMany(SocialLink::class);
    }

    public function page(): HasOne
    {
        return $this->hasOne(Heading::class);
    }

    public function MessengerValue($type){

       return $this->messengers()->where('name', $type)->first()?->value;
    }
    public function MessengerMessage($type){
       return $this->messengers()->where('name', $type)->first()?->message;
    }

    public function SocialLink($type){

       return $this->sociallinks()->where('name', $type)->first()?->value;
    }

    public function link(){
        return env('APP_URL').'/'.$this->username;
    }
}
