<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scope extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_id',
        'url',
        'ordre',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    public function vulnerabilities()
    {
        return $this->hasMany(Vulnerability::class);
    }
}
