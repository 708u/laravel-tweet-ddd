<?php

namespace App\Http\Responders\Frontend\Tweet;

use App\Http\Responders\Base\Responder;
use Illuminate\Http\RedirectResponse;

class DestroyTweetResponder extends Responder
{
    private string $alertType;

    private string $alertContext;

    public function toResponse(): RedirectResponse
    {
        return redirect()->route('frontend.user.home')
            ->with($this->alertType, $this->alertContext);
    }

    /**
     * Set Alert Type.
     *   e.g alert-primary, alert-success, etc...
     *
     * @param string $alertType
     * @return self
     */
    public function setAlertType(string $alertType): self
    {
        $this->alertType = $alertType;
        return clone $this;
    }

    /**
     * Set Alert Context.
     *   e.g. Your Tweet successfully deleted.
     *
     * @param string $alertContext
     * @return self
     */
    public function setAlertContext(string $alertContext): self
    {
        $this->alertContext = $alertContext;
        return clone $this;
    }
}
