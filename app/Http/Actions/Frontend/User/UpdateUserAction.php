<?php

namespace App\Http\Actions\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Responders\Frontend\User\EditUserResponder;
use Domain\UseCase\Tweet\ShowUserUseCase;
use Domain\UseCase\Tweet\UpdateUserUseCase;

class UpdateUserAction extends Controller
{
    private UpdateUserUseCase $useCase;

    private EditUserResponder $responder;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UpdateUserUseCase $useCase, EditUserResponder $responder)
    {
        $this->useCase = $useCase;
        $this->responder = $responder;
    }

    public function __invoke(string $uuid)
    {
        $this->useCase->execute($uuid);
    }
}