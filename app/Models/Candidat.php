<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_complet',
        'email',
        'telephone',
        'date_naissance',
        'experience',
        'competences',
        'cv',
        'statut',
    ];

    public function mission()
    {
        return $this->belongsTo(Mission::class);
    }
}
