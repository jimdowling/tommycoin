<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $price = [
            'usd'        => 0.0042,
            'change_24h' => 420.69,
            'market_cap' => '$1,042,000',
            'volume_24h' => '$88,888',
            'holders'    => '12,847',
            'rank'       => '#1 in Funniness',
        ];

        return view('home', compact('price'));
    }

    public function price()
    {
        return view('price');
    }
}
