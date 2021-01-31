<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'level_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function petugas()
    {
        return $this->hasOne(Petugas::class);
    }

    public function masyarakat()
    {
        return $this->hasOne(Masyarakat::class);
    }

    public function historyLelang()
    {
        return $this->hasOne(HistoryLelang::class);
    }

    public function lelang()
    {
        return $this->hasOne(Lelang::class);
    }
}
