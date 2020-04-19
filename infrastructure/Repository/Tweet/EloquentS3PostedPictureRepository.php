<?php

namespace Infrastructure\Repository\Tweet;

use App\Eloquent\PostedPicture as EloquentPostedPicture;
use Domain\Model\Entity\Tweet\PostedPicture;
use Domain\Repository\Contract\Tweet\PostedPictureRepository;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class EloquentS3PostedPictureRepository implements PostedPictureRepository
{
    private EloquentPostedPicture $eloquentPostedPicture;

    private Filesystem $s3PostedPicture;

    public function __construct(EloquentPostedPicture $eloquentPostedPicture)
    {
        $this->eloquentPostedPicture = $eloquentPostedPicture;
        $this->s3PostedPicture = Storage::disk('s3');
    }

    /**
     * save posted picture.
     *
     * @param PostedPicture $postedPicture
     * @return void
     */
    public function save(PostedPicture $postedPicture): void
    {
        $now = now();
        $this->eloquentPostedPicture->insert([
            'uuid'          => $postedPicture->identifierAsString(),
            'tweet_uuid'    => $postedPicture->tweetId()->toString(),
            'name'          => $postedPicture->name(),
            'updated_at'    => $now,
            'created_at'    => $now,
        ]);

        $resizedPostedPicture = Image::make(file_get_contents($postedPicture->temporaryPath()))
            ->resize(300, null, fn ($constraint) => $constraint->aspectRatio());

        $this->s3PostedPicture->put($postedPicture->fullPath(), (string) $resizedPostedPicture->encode(), 'public');
    }
}
