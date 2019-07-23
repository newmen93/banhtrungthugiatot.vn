<?php

namespace App\ViewComponents;

use Illuminate\Support\Facades\View;
use Illuminate\Contracts\Support\Htmlable;

class HighlightsComponent implements Htmlable
{
    protected $blog;

    public function __construct(BlogRepository $blog)
    {
        $this->blog = $blog;
    }

    public function toHtml()
    {
        return View::make('highlights')
            ->with('highlights', $this->blog->highlights())
            ->render();
    }
}