<?php

namespace App\View\Components\Partial;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class Pager extends Component
{
    public LengthAwarePaginator $pager;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(LengthAwarePaginator $pager)
    {
        $this->pager = $pager;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.partial.pager');
    }
}
