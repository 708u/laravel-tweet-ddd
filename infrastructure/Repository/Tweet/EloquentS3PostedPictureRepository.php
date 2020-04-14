<?php

namespace Infrastructure\Repository\Tweet;

use App\Eloquent\PostedPicture as EloquentPostedPicture;
use Domain\Model\Entity\Tweet\PostedPicture;
use Domain\Repository\Contract\Tweet\PostedPictureRepository;
use Illuminate\Support\Facades\Storage;

class EloquentS3PostedPictureRepository implements PostedPictureRepository
{
    private EloquentPostedPicture $eloquentPostedPicture;

    private Storage $s3Storage;

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
        // $this->eloquentPostedPicture->save();
        // $this->s3Storage->put();
    }
}
