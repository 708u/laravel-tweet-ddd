<?php

namespace App\View\Components\Frontend\User;

use Illuminate\View\Component;

class Profile extends Component
{
    public string $profileCardName;

    public string $actionButton;

    public string $userName;

    public string $email;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $profileCardName, string $actionButton, string $userName, string $email)
    {
        $this->profileCardName = $profileCardName;
        $this->actionButton = $actionButton;
        $this->userName = $userName;
        $this->email = $email;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.frontend.user.profile');
    }
}
