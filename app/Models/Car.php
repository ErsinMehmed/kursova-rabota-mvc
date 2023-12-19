<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $fillable = ['brand_id', 'model_id', 'year', 'country_id', 'fuel_type', 'door_count', 'price', 'color_id', 'description', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function model()
    {
        return $this->belongsTo(CarModel::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }
}
