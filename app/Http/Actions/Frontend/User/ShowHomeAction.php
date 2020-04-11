<?php

namespace App\Http\Actions\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Responders\Frontend\User\ShowHomeResponder;
use Domain\UseCase\Tweet\ShowHomeUseCase;
use Illuminate\Support\Facades\Auth;

class ShowHomeAction extends Controller
{
    private ShowHomeResponder $responder;

    private ShowHomeUseCase $useCase;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ShowHomeResponder $responder, ShowHomeUseCase $useCase)
    {
        $this->responder = $responder;
        $this->useCase = $useCase;
    }

    public function __invoke()
    {
        [$user, $feeds] = $this->useCase->execute(Auth::id());

        return $this->responder
            ->setUser($user)
            ->setFeeds($feeds);
    }
}
