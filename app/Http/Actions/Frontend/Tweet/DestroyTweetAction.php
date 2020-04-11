<?php

namespace App\Http\Actions\Frontend\Tweet;

use App\Http\Controllers\Controller;
use Domain\UseCase\Tweet\DestroyTweetUseCase;
use Illuminate\Support\Facades\Auth;

class DestroyTweetAction extends Controller
{
    private DestroyTweetUseCase $useCase;

    public function __construct(DestroyTweetUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(string $tweetUuid)
    {
        $this->useCase->execute($tweetUuid, Auth::id());
    }
}
