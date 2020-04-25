<?php

namespace App\Http\Actions\Frontend\Tweet;

use App\Http\Controllers\Controller;
use App\Http\Responders\Frontend\Tweet\DestroyTweetResponder;
use Domain\UseCase\Tweet\DestroyTweetUseCase;
use Illuminate\Support\Facades\Auth;

class DestroyTweetAction extends Controller
{
    private DestroyTweetUseCase $useCase;

    private DestroyTweetResponder $responder;

    public function __construct(DestroyTweetUseCase $useCase, DestroyTweetResponder $responder)
    {
        $this->useCase = $useCase;
        $this->responder = $responder;
    }

    public function __invoke(string $tweetUuid)
    {
        $this->useCase->execute($tweetUuid, Auth::id());

        return $this->responder
            ->setAlertType('uk-alert-success')
            ->setAlertContext('Tweet is deleted.')
            ->toResponse();
    }
}
