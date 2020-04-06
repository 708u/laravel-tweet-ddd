<?php

namespace App\Http\Actions\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Responders\Frontend\User\ShowUserResponder;
use Domain\UseCase\Tweet\ShowUserUseCase;

class ShowUserAction extends Controller
{
    private ShowUserUseCase $useCase;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ShowUserUseCase $useCase, ShowUserResponder $responder)
    {
        $this->useCase = $useCase;
        $this->responder = $responder;
    }

    public function __invoke(string $uuid)
    {
        [$userDTO, $tweetsDTO] = $this->useCase->execute($uuid);

        return $this->responder
            ->setUser($userDTO)
            ->setTweets($tweetsDTO);
    }
}
