<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company',
        'role',
    ];
    
    public function reports()
{
    return $this->hasMany(Report::class);
}
}
