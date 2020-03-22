<?php

namespace App\View\Components\Frontene\User;

use Illuminate\View\Component;

class Profile extends Component
{
    public string $profileCardName;

    public string $actionButton;

    public
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $profileCardName, string $actionButton)
    {
        $this->profileCardName = $profileCardName;
        $this->actionButton = $actionButton;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.frontend.user.profile', ['form' => $this->form]);
    }
}
