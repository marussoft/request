<?php

declare(strict_types=1);

namespace Marussia\Request;

class Server extends Package
{
    protected $uri = '/';
    
    protected $headers;

    public function __construct(array $server)
    {
        $this->data = $server;
        
        $uri =  $this->data['REQUEST_URI'];
        
        if (!empty($uri) && $uri !== '/') {
            $this->uri = preg_replace('(\?.*$)', '', trim($uri, '/'));
        }
    }

    public static function create(array $server) : self
    {
        return new static($server);
    }
    
    public function getMethod()
    {
        return $this->data['REQUEST_METHOD'];
    }
    
    public function getUri()
    {
        return $this->uri;
    }
    
    public function isMethod($method)
    {
        return $this->data['REQUEST_METHOD'] === strtoupper($method);
    }
    
    public function isSecure() : bool
    {
        if (!empty($this->data['HTTPS']) && $this->data['HTTPS'] !== 'off') {
            return true;
        }
        return false;
    }
}  
