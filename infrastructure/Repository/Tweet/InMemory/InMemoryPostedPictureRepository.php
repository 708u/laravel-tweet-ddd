<?php

namespace Infrastructure\Repository\Tweet\InMemory;

use Domain\Model\Entity\Tweet\PostedPicture;
use Domain\Repository\Contract\Tweet\PostedPictureRepository;
use Infrastructure\Repository\Base\InMemoryRepository;

class InMemoryPostedPictureRepository extends InMemoryRepository implements PostedPictureRepository
{
    /**
     * Save posted picture In Memory.
     *
     * @param PostedPicture $postedPicture
     * @return void
     */
    public function save(PostedPicture $postedPicture): void
    {
        $this->saveInMemory($postedPicture);
    }
}
