<?php

namespace App\View\Components;

use App\Models\Gallery;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GalleryComponent extends Component
{
    public function render(): View|Closure|string
    {
        $galleries = Gallery::with('media')
            ->where('status', 'active')
            ->get();

        return view('components.gallery-component', ['galleries' => $galleries]);
    }
}
