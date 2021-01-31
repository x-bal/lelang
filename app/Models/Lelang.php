<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lelang extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function historyLelangs()
    {
        return $this->hasMany(HistoryLelang::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
