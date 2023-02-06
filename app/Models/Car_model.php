<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car_model extends Model
{
    use HasFactory;

    protected $table = 'car_models';

    protected $primaryKey = 'id';

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
