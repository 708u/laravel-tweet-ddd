<?php

namespace App\Http\Actions\Frontend\Tweet;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTweetRequest;
use App\Http\Responders\Frontend\Tweet\CreateTweetResponder;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Domain\Model\ValueObject\Tweet\TweetContent\TweetContent;
use Domain\UseCase\Tweet\CreateTweetUseCase;
use Illuminate\Support\Facades\Auth;

class CreateTweetAction extends Controller
{
    private CreateTweetUseCase $useCase;

    private CreateTweetResponder $responder;

    public function __construct(CreateTweetUseCase $useCase, CreateTweetResponder $responder)
    {
        $this->useCase = $useCase;
        $this->responder = $responder;
    }

    public function __invoke(CreateTweetRequest $request)
    {
        $this->useCase->execute(
            new UserId(Auth::id()),
            TweetContent::factory($request->content)
        );

        return $this->responder->toResponse();
    }
}
