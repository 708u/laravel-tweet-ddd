<?php

namespace App\Http\Responders\Base;

use Illuminate\View\Factory as ViewFactory;

abstract class Responder
{
    protected ViewFactory $view;

    public function __construct()
    {
        $this->view = app(ViewFactory::class);
    }
}
