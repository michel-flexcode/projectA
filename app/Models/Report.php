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
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function scopes()
    {
        return $this->hasMany(Scope::class);
    }

    public function consultants()
    {
        return $this->hasMany(Consultant::class);
    }
}
