<?php

namespace App\Eloquent;

use Domain\Application\Contract\Uuid\UuidGeneratable;
use Illuminate\Database\Eloquent\Model;

abstract class UuidModel extends Model
{
    protected $primaryKey = 'uuid';

    protected $keyType = 'string';

    public $incrementing = false;
}
