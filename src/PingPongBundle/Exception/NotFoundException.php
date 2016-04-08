<?php

namespace PingPongBundle\Exception;

use Symfony\Component\HttpFoundation\Response;

class NotFoundException extends ResponseException
{
    protected $title = 'The Resource you were trying to get can not be found.';
    protected $uri = 'http://www.example.com/not_found';
    protected $httpStatusCode = Response::HTTP_NOT_FOUND;
}
