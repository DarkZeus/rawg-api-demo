<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(Request $request)
    {
        if (request('game')) {
            $client = new \GuzzleHttp\Client();

            $response = $client->get(
                'https://api.rawg.io/api/games',
                [
                    'headers' => [
                        'User-Agent' => 'Mozilla/5.0',
                    ],
                    'proxy' => env('PROXY'),
                    'content-type' => 'application/json',
                    'timeout'  => 2.0,
                    'query' => [
                        'page_size' => 5,
                        'search' => request('game')
                    ],
                ],
            )->getBody();

            $response = json_decode($response);

            return view('game.index', compact('response'));
        }

        return view('game.index');
    }

    public function show(Request $request)
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->get(
            'https://api.rawg.io/api/' . request()->path(),
            [
                'headers' => [
                    'User-Agent' => 'Mozilla/5.0',
                ],
                'proxy' => env('PROXY'),
                'content-type' => 'application/json',
                'timeout'  => 2.0,
                'query' => [
                    'page_size' => 5,
                    'search' => request('game')
                ],
            ],
        )->getBody();

        $response = json_decode($response);

        return view('game.show', compact('response'));
    }
}
