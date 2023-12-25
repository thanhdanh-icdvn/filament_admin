<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ConsBages extends Component
{
    public $services;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $services = \App\Models\Service::query()->orderBy('order', 'asc')->get();
        $this->services = $services;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cons-bages');
    }
}
