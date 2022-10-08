<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = ["nom", "prenom", "classe_id"];

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}