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
        $postedPictures = [];
        if ($request->hasFile('posted_picture')) {
            $postedPictures = [
                'temporaryPath' => $request->file('posted_picture')->getRealPath(),
                'originalName'  => $request->file('posted_picture')->getClientOriginalName(),
            ];
        }
        // TODO: should implement domain service
        $this->useCase->execute(
            new UserId(Auth::id()),
            TweetContent::factory($request->content),
            $postedPictures
        );

        return $this->responder->toResponse();
    }
}
