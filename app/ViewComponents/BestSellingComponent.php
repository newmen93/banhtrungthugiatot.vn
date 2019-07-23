<?php

namespace App\ViewComponents;

use Illuminate\Support\Facades\View;
use Illuminate\Contracts\Support\Htmlable;
use App\Models\Product;
use App\Models\Category;

class BestSellingComponent implements Htmlable {
    
    protected $products;
    protected $categories;
    private static $itemsPerPage = 5;

    public function __construct(Product $products, Category $categories)
    {
        $this->products = $products::whereIsHot(1)->take(self::$itemsPerPage)->get();
        $this->categories = $categories::whereParentId(0)->get();
    }

    public function toHtml()
    {
        return View::make('frontend.v1.layouts.left-sidebar')
            ->with([
                'bestSelling'=> $this->products,
                'categories' => $this->categories
            ])->render();
    }
}