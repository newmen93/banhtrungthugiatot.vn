<?php

namespace App\ViewComponents;

use Illuminate\Support\Facades\View;
use Illuminate\Contracts\Support\Htmlable;
use App\Models\Category;

class DesktopCategoryComponent implements Htmlable {

    protected $categories;
    private static $itemsPerPage = 6;

    public function __construct(Category $categories)
    {
        $this->categories = $categories::with('children')->whereParentId(0)->take(self::$itemsPerPage)->get();
    }

    public function toHtml()
    {
        return View::make('frontend.v1.layouts.desktop-menu')
            ->with('categories', $this->categories)
            ->render();
    }
}
