<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notes extends Model
{
    /** @use HasFactory<\Database\Factories\NotesFactory> */
    use HasFactory;
    protected $fillable = [
        'valeur',
        'matiere_id',
        'eleve_id',
    ];

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function eleve()
    {
        return $this->belongsTo(eleves::class);
    }
}
