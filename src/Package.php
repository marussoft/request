<?php

declare(strict_types=1);

namespace Marussia\Request;

abstract class Package implements \IteratorAggregate
{
    protected $data;

    public function all() : array
    {
        return $this->data;
    }
    
    public function keys() : array
    {
        return array_keys($this->data);
    }
    
    public function get($key, $default = null)
    {
        return array_key_exists($key, $this->data) ? $this->data[$key] : $default;
    }

    public function has($key) : bool
    {
        return array_key_exists($key, $this->data);
    }
    
    public function remove($key) : void
    {
        unset($this->data[$key]);
    }
    
    public function replace(array $data = []) : void
    {
        $this->data = $data;
    }
    
    public function set($key, $value) : void
    {
        $this->data[$key] = $value;
    }
    
    public function getIterator()
    {
        return new \ArrayIterator($this->data);
    }
}
