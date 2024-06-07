<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name_doc',
        'vulnerabilities',
        'state',
        'date',
        'recommendations',
        'proposals',
        'conclusions',
        'consultants',
        // Ajoutez d'autres attributs remplissables au besoin
    ];

    // Relation avec le modèle Company
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Relation avec le modèle Scope
    public function scopes()
    {
        return $this->hasMany(Scope::class);
    }

//     public function consultants()
//     {
//         return $this->belongsTo(Consultant::class);
//     }
public function consultants()
{
    return $this->belongsToMany(Consultant::class);
}
}
