<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eleves extends Model
{
    /** @use HasFactory<\Database\Factories\ElevesFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'classe',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notes()
    {
        return $this->hasMany(notes::class);
    }
}
