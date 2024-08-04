<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Park;
use App\Models\Breed;
use Illuminate\Http\Request;

class ParkController extends Controller
{
    public function associateBreed(Request $request, $parkId)
    {
        $park = Park::findOrFail($parkId);
        $breed = Breed::findOrFail($request->input('breed_id'));
        $park->breeds()->attach($breed);

        return response()->json(['message' => 'Breed associated with park successfully']);
    }
}
