<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $primaryKey = 'id';

    protected $fillable =['name','founded', 'description','image_path'];

    public function carModels()
    {
        return $this->hasMany(Car_model::class);
    }

    public function productionDate()
    {
        return $this->hasOneThrough(
            CarProductionDate::class,
            Car_model::class,
            'car_id', //Foreign Key on CarModel table
            'model_id' //Foreign key on Car Production table
        );
    }

    public function engines()
    {
        return $this->hasManyThrough(
            Engine::class,
            Car_model::class,
            'car_id', //Foreign Key on CarModel table
            'model_id' //Foreign key on engine table
        );
    }
}
