<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pocs extends Model
{
    use HasFactory;

    protected $fillable = [
        'conclusion',
        'description',
        'scope_vulnerability_id',
        'ordre',
        // Add any other fillable attributes as needed
    ];

    // attention probablement faux
    public function scopeVulnerability()
    {
        return $this->belongsTo(ScopeVulnerability::class);
    }
}
