<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function breeds()
    {
        return $this->morphToMany(Breed::class, 'breedable');
    }

    public function parks()
    {
        return $this->morphToMany(Park::class, 'parkable');
    }

    public function associatePark(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $park = Park::findOrFail($request->input('park_id'));
        $user->parks()->attach($park);

        return response()->json(['message' => 'Park associated with user successfully']);
    }

    public function associateBreed(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $breed = Breed::findOrFail($request->input('breed_id'));
        $user->breeds()->attach($breed);

        return response()->json(['message' => 'Breed associated with user successfully']);
    }
}
