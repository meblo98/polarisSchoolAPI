<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function etudiant(){
        return $this->belongsTo(Etudiant::class);
    }

    public function matiere(){
        return $this->belongsTo(Matiere::class);
    }

}
