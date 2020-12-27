<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
class Horn extends Model implements ToModel
{
    use HasFactory;

    protected $fillable = ['horn_name'];
    public function url()
    {
        return $this->hasMany(Url::class);
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */


    public function model(array $row)
    {
        return new Horn([
            'horn_name'     => $row[0],   
        ]);
    } 
}
