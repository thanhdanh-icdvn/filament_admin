<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OfferImage extends Component
{
    public $offerImage;

    /**
     * Create a new component instance.
     */
    public function __construct($offerImage)
    {
        $this->offerImage = $offerImage;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.offer-image');
    }
}
