<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
class Book extends Model
{
    use HasFactory;
 
    public function exercise()
    {
        return $this->hasMany(Exercise::class);
    }
}
