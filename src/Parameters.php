<?php

declare(strict_types=1);

namespace Marussia\Request;

class Parameters extends Package
{
    public function __construct(array $post)
    {
        $data = $post;
        
        if (empty($data)) {
        
            $exploded = explode('&', file_get_contents('php://input'));
        
            foreach($exploded as $pair) {
                $item = explode('=', $pair);
                if (count($item) == 2) {
                    $data[urldecode($item[0])] = urldecode($item[1]);
                }
            }
        }

        $this->data = $data;
    }

    public static function create(array $post) : self
    {
        return new static($post);
    }
} 
