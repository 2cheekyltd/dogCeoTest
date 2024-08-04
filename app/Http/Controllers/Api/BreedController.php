<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class BreedController extends Controller
{
    public function getAllBreeds()
    {
        $client = new Client();
        $response = $client->get('https://dog.ceo/api/breeds/list/all');
        $data = json_decode($response->getBody(), true);

        return response()->json($data);
    }

    public function getBreed($breed)
    {
        $client = new Client();
        $response = $client->get("https://dog.ceo/api/breed/{$breed}/images");
        $data = json_decode($response->getBody(), true);

        return response()->json($data);
    }

    public function getRandomBreed()
    {
        $client = new Client();
        $response = $client->get('https://dog.ceo/api/breeds/image/random');
        $data = json_decode($response->getBody(), true);

        return response()->json($data);
    }

    public function getBreedImage($breed)
    {
        $client = new Client();
        $response = $client->get("https://dog.ceo/api/breed/{$breed}/images/random");
        $data = json_decode($response->getBody(), true);

        return response()->json($data);
    }
}
