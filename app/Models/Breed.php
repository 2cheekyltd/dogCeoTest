<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function users()
    {
        return $this->morphedByMany(User::class, 'breedable');
    }

    public function parks()
    {
        return $this->morphedByMany(Park::class, 'breedable');
    }
}
