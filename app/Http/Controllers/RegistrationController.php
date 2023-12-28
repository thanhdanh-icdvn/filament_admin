<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\Customer;

class RegistrationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.sign-up.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegistrationRequest $request)
    {
        $user = Customer::create($request->validated());

        auth()->login($user);

        return redirect('/')->with('success', 'The customer account register successfully');
    }
}
