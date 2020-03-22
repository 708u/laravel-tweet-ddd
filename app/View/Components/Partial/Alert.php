<?php

namespace App\View\Components\Partial;

use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.partial.alert');
    }

    /**
     * Return Bootstrap alert tags
     *
     * @return array
     */
    public function alertTags(): array
    {
        return [
            'alert-primary', 'alert-secondary', 'alert-success', 'alert-danger', 'alert-info', 'alert-light', 'alert-dark',
        ];
    }
}
