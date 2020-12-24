<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function horn()
    {
        return $this->hasMany(Horn::class);
    }
    public function exercise()
    {
        return $this->hasMany(Exercise::class);
    }
}
