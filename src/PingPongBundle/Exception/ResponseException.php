<?php

namespace PingPongBundle\Exception;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class ResponseException extends \Exception
{
    protected $title = 'Something bad happened.';
    protected $uri = 'http://www.example.com/generic_internal_error';
    protected $httpStatusCode = Response::HTTP_INTERNAL_SERVER_ERROR;

    public function __construct($detail = "", $code = 0, Exception $previous = null)
    {
        parent::__construct($detail, $code, $previous);
    }

    public function toDto()
    {
        // doe iets normaal
        return $this->asArray();
    }

    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }

    private function asArray()
    {
        return [
            'type' => $this->uri,
            'title' => $this->title,
            'detail' => $this->message,
            'status' => $this->httpStatusCode,
        ];
    }
}
