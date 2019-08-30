<?php

declare(strict_types=1);

namespace Marussia\Request;

class Query extends Package
{
    public function __construct(array $get)
    {
        $this->data = $get;
    }

    public static function create(array $get) : self
    {
        return new static($get);
    }
}
