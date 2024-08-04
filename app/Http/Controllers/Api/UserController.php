<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Park;
use App\Models\Breed;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
