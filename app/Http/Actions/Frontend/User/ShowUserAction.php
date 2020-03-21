<?php

namespace App\Http\Actions\Frontend\User;

use App\Http\Controllers\Controller;
use Domain\UseCase\Tweet\ShowUserUseCase;

class ShowUserAction extends Controller
{
    private ShowUserUseCase $useCase;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ShowUserUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(string $uuid)
    {
        $user = $this->useCase->execute($uuid);
        return view('frontend.user.show', ['user' => $user]);
    }
}
