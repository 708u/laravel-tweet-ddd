<?php

namespace App\View\Components\Partial;

use Illuminate\View\Component;

class Title extends Component
{
    public string $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return <<<'blade'
<title>
    {{ $title }} | {{ config('app.name') }}
</title>
blade;
    }
}
