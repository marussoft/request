<?php

declare(strict_types=1);

namespace Marussia\Request;

class Attributes extends Package
{
    public function __construct(array $attributes = [])
    {
        $this->data = $attributes;
    }

    public static function create(array $attributes = []) : self
    {
        return new static($attributes);
    }
} 
