<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class Services extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $services = \App\Models\Service::query()->orderBy('order', 'asc')->get();

        return view('widgets.services', [
            'config' => $this->config,
            'services' => $services,
        ]);
    }
}
