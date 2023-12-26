<?php

namespace App\Http\Controllers;

use App\Models\OfferImage;
use App\Models\ProductCategory;

class HomeController extends Controller
{
    public function index()
    {
        $PRODUCT_CATEGORY_RECORDS = 6;

        $offerImage = OfferImage::query()->where('status', true)->first();
        $productCategories = ProductCategory::query()->take($PRODUCT_CATEGORY_RECORDS)->get();

        return view('pages.home.index', compact('offerImage', 'productCategories'));
    }
}
