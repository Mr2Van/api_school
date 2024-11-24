<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    /** @use HasFactory<\Database\Factories\MatiereFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'enseignant_id',
    ];

    public function enseignant()
    {
        return $this->belongsTo(enseignants::class);
    }

    public function notes()
    {
        return $this->hasMany(notes::class);
    }}
