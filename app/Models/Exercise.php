<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
class Exercise extends Model  implements ToModel
{
    use HasFactory;
       protected $fillable = ['exercise_name','book_id'];
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

       public function url()
    {
        return $this->hasMany(Url::class);
    }
     public function model(array $row)
    {
        return new Exercise([
            'exercise_name'     => $row[0],   
            'book_id'     => $row[1],   
        ]);
    } 
}
