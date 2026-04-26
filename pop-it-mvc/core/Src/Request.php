<?php

namespace Src;

use Error;

class Request
{
   protected array $body;
   public string $method;
   public array $headers;

   public function __construct()
   {
       $this->body = $_REQUEST;
       $this->method = $_SERVER['REQUEST_METHOD'];
       $this->headers = getallheaders() ?? [];

       $contentType = $_SERVER['CONTENT_TYPE'] ?? '';
    if (strpos($contentType, 'application/json') !== false) {
        $input = file_get_contents('php://input');
        $jsonData = json_decode($input, true);
        if (is_array($jsonData)) {
            $this->body = array_merge($this->body, $jsonData);
        }
    }
   }

   public function all(): array
   {
       return $this->body + $this->files();
   }

   public function set($field, $value):void
   {
       $this->body[$field] = $value;
   }

   public function get($field)
   {
        if(isset($this->body[$field]))
            return $this->body[$field];
        
        return false;
   }

   public function files(): array
   {
       return $_FILES;
   }

   public function __get($key)
   {
       if (array_key_exists($key, $this->body)) {
           return $this->body[$key];
       }
       throw new Error('Accessing a non-existent property');
   }
}
