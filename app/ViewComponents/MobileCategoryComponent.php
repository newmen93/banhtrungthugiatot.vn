<?php

namespace App\ViewComponents;

use Illuminate\Support\Facades\View;
use Illuminate\Contracts\Support\Htmlable;
use App\Models\Category;

class MobileCategoryComponent implements Htmlable {

    protected $categories;
    private static $itemsPerPage = 5;

    public function __construct(Category $categories)
    {
        $this->categories = $categories::with('children')->whereParentId(0)->get();
    }

    public function toHtml()
    {
        return View::make('frontend.v1.layouts.mobile-menu')
            ->with('categories', $this->categories)
            ->render();
    }
}
