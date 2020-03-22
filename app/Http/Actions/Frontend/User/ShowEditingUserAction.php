<?php

namespace App\Http\Actions\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Responders\Frontend\User\EditUserResponder;
use Domain\UseCase\Tweet\ShowUserUseCase;

class ShowEditingUserAction extends Controller
{
    private ShowUserUseCase $useCase;

    private EditUserResponder $responder;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ShowUserUseCase $useCase, EditUserResponder $responder)
    {
        $this->useCase = $useCase;
        $this->responder = $responder;
    }

    public function __invoke(string $uuid)
    {
        return $this->responder
            ->setUser($this->useCase->execute($uuid));
    }
}
