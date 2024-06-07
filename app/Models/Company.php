<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'web',
        'adress',
        'mail_domain',
        'logo',
    ];

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
    // gestion panneau
    public function lastReport()
    {
        return $this->hasOne(Report::class)->latest();
    }
}
