<?php

declare(strict_types=1);

namespace Marussia\Request;

class Files extends Package
{
    public function __construct(array $files)
    {
        $this->data = $files;
    }

    public static function create(array $files) : self
    {
        return new static($files);
    }
}  
