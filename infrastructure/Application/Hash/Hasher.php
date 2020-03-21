<?php

namespace Infrastructure\Application\Hash;

use Illuminate\Support\Facades\Hash;
use Domain\Application\Contract\Hash\Hashable;

class Hasher implements Hashable
{
    /**
     * Make hash.
     *
     * @param string $str
     * @return string
     */
    public function make(string $str): string
    {
        return Hash::make($str);
    }
}
