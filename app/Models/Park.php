<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Park extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function breeds()
    {
        return $this->morphToMany(Breed::class, 'breedable');
    }

    public function users()
    {
        return $this->morphToMany(User::class, 'parkable');
    }
}
