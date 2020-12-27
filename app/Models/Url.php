<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
class Url extends Model implements ToModel
{
    use HasFactory;
    protected $fillable = ['url','exercise_id','horn_id'];
    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    } 
    public function horn()
    {
        return $this->belongsTo(Horn::class);
    } 
     public function model(array $row)
    {
        return new Url([
            'url'     => $row[0],   
            'exercise_id'     => $row[1],   
            'horn_id'     => $row[2],   
        ]);
    } 
}
