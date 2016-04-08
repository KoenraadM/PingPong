<?php

namespace PingPongBundle\Exception;

use Symfony\Component\HttpFoundation\Response;

class TooManyResultsException extends ResponseException
{
    protected $title = 'We found more resources than expected.';
    protected $uri = 'http://www.example.com/too_many_results';
    protected $httpStatusCode = Response::HTTP_INTERNAL_SERVER_ERROR;
}
