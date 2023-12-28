<?php

namespace App\Http\Controllers;

use App\Models\OfferImage;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $PRODUCT_CATEGORY_RECORDS = 6;

        $offerImage = OfferImage::query()->where('status', true)->first();
        $productCategories = ProductCategory::query()->take($PRODUCT_CATEGORY_RECORDS)->get();

        return view('pages.home.index', compact('offerImage', 'productCategories'));
    }

    public function logout(Request $request)
    {
        // Log the customer out
        Auth::guard('customer')->logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the session token
        $request->session()->regenerateToken();

        // Redirect to the login page or wherever you want
        return redirect()->route('login.show');
    }
}
