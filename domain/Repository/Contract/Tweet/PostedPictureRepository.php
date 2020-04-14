<?php

namespace Domain\Repository\Contract\Tweet;

use Domain\Model\Entity\Tweet\PostedPicture;

interface PostedPictureRepository
{
    public function save(PostedPicture $postedPicture): void;
}
