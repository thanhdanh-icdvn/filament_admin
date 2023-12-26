<?php

namespace App\Widgets;

use App\Models\ProductCategory;
use Arrilot\Widgets\AbstractWidget;

class ProductCategories extends AbstractWidget
{
    public $reloadTimeout = 60;

    /**
     * The number of minutes before cache expires.
     * False means no caching at all.
     *
     * @var int|float|bool
     */
    public $cacheTime = 60;

    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'count' => 6,
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $productCategories = ProductCategory::query()->take($this->config['count'])->get();

        return view('widgets.product_categories', [
            'config' => $this->config,
            'productCategories' => $productCategories,
        ]);
    }

    public function placeholder(): string
    {
        return 'Loading...';
    }
}
