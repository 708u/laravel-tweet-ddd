<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

abstract class UuidModel extends Model
{
    protected string $primaryKey = 'uuid';

    protected string $keyType = 'string';

    public bool $incrementing = false;
}
