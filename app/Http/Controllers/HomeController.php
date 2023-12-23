<?php

namespace App\Http\Controllers;

use App\Models\OfferImage;

class HomeController extends Controller
{
    public function index()
    {
        $offerImage = OfferImage::query()->where('status', true)->first();

        return view('pages.home.index', compact('offerImage'));
    }
}
