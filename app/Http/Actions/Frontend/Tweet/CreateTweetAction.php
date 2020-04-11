<?php

namespace App\Http\Actions\Frontend\Tweet;

use App\Http\Controllers\Controller;
use Domain\Model\ValueObject\Tweet\Identifier\UserId;
use Domain\Model\ValueObject\Tweet\TweetContent\TweetContent;
use Domain\UseCase\Tweet\CreateTweetUseCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateTweetAction extends Controller
{
    private CreateTweetUseCase $useCase;

    public function __construct(CreateTweetUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(Request $request)
    {
        $this->useCase->execute(
            new UserId(Auth::id()),
            TweetContent::factory($request->content)
        );
    }
}
