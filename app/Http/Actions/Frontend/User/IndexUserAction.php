<?php

namespace App\Http\Actions\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Responders\Frontend\User\IndexUserResponder;
use Domain\UseCase\Tweet\IndexUserUseCase;

class IndexUserAction extends Controller
{
    private IndexUserUseCase $useCase;

    private IndexUserResponder $responder;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(IndexUserUseCase $useCase, IndexUserResponder $responder)
    {
        $this->useCase = $useCase;
        $this->responder = $responder;
    }

    public function __invoke()
    {
        return $this->responder
            ->setUsers($this->useCase->execute());
    }
}
