<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scope extends Model
{
    use HasFactory;

    // Relationship: Scope belongs to a Report
    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    // Relationship: Scope has many Vulnerabilities
    public function vulnerabilities()
    {
        return $this->hasMany(Vulnerability::class);
    }
}
