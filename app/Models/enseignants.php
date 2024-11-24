<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enseignants extends Model
{
    /** @use HasFactory<\Database\Factories\EnseignantsFactory> */
    use HasFactory;


    protected $fillable = [
        'user_id',
        'matricule',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function matieres()
    {
        return $this->hasMany(Matiere::class);
    }}
