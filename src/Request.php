<?php

declare(strict_types=1);

namespace Marussia\Request;

class Request
{
    protected $method;
    
    protected $query;
    
    protected $attributes;
    
    protected $cookies;
    
    protected $headers;
    
    protected $request;
    
    
    public function __construct(array $get, array $post, array $cookie, array $files, array $server)
    {
        $this->query = Query::create($get);
        $this->request = Parameters::create($post);
        $this->attributes = Attributes::create();
        $this->cookies = Cookies::create($cookie);
        $this->files = Files::create($files);
        $this->server = Server::create($server);
        $this->headers = Headers::create($server);
    }
    
    public static function createFromGlobals() : self
    {
        return new static($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
    }
    
    public function get($key, $default = null)
    {
        if ($this->attributes->has($key)) {
            return $this->attributes->get($key);
        }
    
        if ($this->query->has($key)) {
            return $this->query->get($key);
        }

        if ($this->request->has($key)) {
            return $this->request->get($key);
        }
        return $default;
    }
    
    // Проверяет контекст запроса
    public function isXmlHttpRequest() : bool
    {
        return $this->headers->isXmlHttpRequest();
    }
    
    // Возвращает строку запроса
    public function getUri() : string
    {
        return $this->server->getUri();
    }

    // Возвращает метод запроса
    public function getMethod() : string
    {
        return $this->server->getMethod();
    }
    
    public function isMethod(string $method) : bool
    {
        return $this->getMethod() === strtoupper($method);
    }
    
    public function isSecure() : bool
    {
        return $this->server->isSecure();
    }
    
    public function setAttributes(array $attributes) : void
    {
        $this->attributes->replace($attributes);
    }
    
    public function request() : Parameters
    {
        return $this->request;
    }
    
    public function query() : Query
    {
        return $this->query;
    }
    
    public function attributes() : Attributes
    {
        return $this->attributes;
    }
    
    public function cookies() : Cookies
    {
        return $this->cookies;
    }
    
    public function files() : Files
    {
        return $this->files;
    }
    
    public function server() : Server
    {
        return $this->server;
    }
    
    public function headers() : Headers
    {
        return $this->headers;
    }
}
