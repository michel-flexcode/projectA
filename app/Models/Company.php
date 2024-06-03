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
        'mail_domain',
        'logo',
    ];

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
