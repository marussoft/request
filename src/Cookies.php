<?php

declare(strict_types=1);

namespace Marussia\Request;

class Cookies extends Package
{
    public function __construct(array $cookie)
    {
        $this->data = $cookie;
    }

    public static function create(array $cookie) : self
    {
        return new static($cookie);
    }
}
