<?php

namespace Tests\Browser\Helper;

trait TestHelper
{
    /**
     * get title string
     *
     * @param string $title
     * @return string
     */
    private function getTitle(string $title): string
    {
        $appName = config('app.name');
        return "$title | $appName";
    }
}
