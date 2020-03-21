<?php

namespace Domain\Application\Contract\Hash;

interface Hashable
{
    /**
     * Make hash.
     *
     * @param string $str
     * @return string
     */
    public function make(string $str): string;
}
