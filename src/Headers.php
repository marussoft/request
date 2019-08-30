<?php

declare(strict_types=1);

namespace Marussia\Request;

class Headers extends Package
{
    public function __construct(array $server)
    {
        foreach ($server as $key => $value) {
            if (0 === strpos($key, 'HTTP_')) {
                $this->data[substr($key, 5)] = $value;
            }
        }
    }
    
    public static function create(array $server) : self
    {
        return new static($server);
    }
    
    public function isXmlHttpRequest()
    {
        if (!$this->has('HTTP_X_REQUESTED_WITH') or empty($this->data['HTTP_X_REQUESTED_WITH'])) {
            return false;
        }
    
        return 'XMLHttpRequest' == $this->data['HTTP_X_REQUESTED_WITH'];
    }
}
