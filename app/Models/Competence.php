<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description'];

    public function missions()
    {
        return $this->belongsToMany(Mission::class, 'mission_competence');
    }
}
