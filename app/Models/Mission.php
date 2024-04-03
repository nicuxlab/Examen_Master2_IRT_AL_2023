<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = ['fullname', 'description', 'date_debut', 'date_fin','heure_minute', 'taux_horaire', 'lieu', 'image'];

    public function competences()
    {
        return $this->belongsToMany(Competence::class, 'mission_competence');
    }

    public function candidats()
    {
        return $this->hasMany(Candidat::class);
    }
}
