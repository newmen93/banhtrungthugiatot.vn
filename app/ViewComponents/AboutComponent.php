<?php

namespace App\ViewComponents;

use Illuminate\Support\Facades\View;
use Illuminate\Contracts\Support\Htmlable;

class AboutComponent implements Htmlable {

    protected $about;

    public function __construct()
    {
        // load about json file
        $path = storage_path("website.json");
        $this->about = json_decode(file_get_contents($path), true);
    }

    public function toHtml()
    {
        return View::make('frontend.v1.layouts.footer')
            ->with('about', $this->about)
            ->render();
    }
}
