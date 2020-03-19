<?php

namespace App\Eloquent;

use Domain\Application\Contract\Uuid\UuidGeneratable;
use Illuminate\Database\Eloquent\Model;

abstract class UuidModel extends Model
{
    protected $primaryKey = 'uuid';

    protected $keyType = 'string';

    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($m) {
            $m->{$m->getKeyName()} = app(UuidGeneratable::class)->nextIdentifier();
        });
    }
}
