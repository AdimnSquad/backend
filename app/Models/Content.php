<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_cars', 'description'
    ];

    public function car(){
        return $this->belongsTo(Car::class);
    }
}
