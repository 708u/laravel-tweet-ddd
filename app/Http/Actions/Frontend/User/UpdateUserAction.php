<?php

namespace App\Http\Actions\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Responders\Frontend\User\UpdateUserResponder;
use Domain\UseCase\Tweet\UpdateUserUseCase;

class UpdateUserAction extends Controller
{
    private UpdateUserUseCase $useCase;

    private UpdateUserResponder $responder;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UpdateUserUseCase $useCase, UpdateUserResponder $responder)
    {
        $this->middleware('RedirectIfAuthUserDosentHaveGivenUuid');
        $this->useCase = $useCase;
        $this->responder = $responder;
    }

    public function __invoke(UpdateUserRequest $request)
    {
        $this->useCase->execute(
            $request->uuid,
            $request->name,
            $request->email,
            $request->password
        );

        return $this->responder->toResponse();
    }
}
