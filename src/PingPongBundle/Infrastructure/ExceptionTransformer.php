<?php

namespace PingPongBundle\Infrastructure;

use PingPongBundle\Exception\ResponseException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class ExceptionTransformer
{
    public function onKernelView(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();
        if (!($exception instanceof ResponseException)) {
            return;
        }

        $response = new JsonResponse();
        $response->setStatusCode($exception->getHttpStatusCode());
        $response->headers->set('Content-Type', 'application/problem+json');
        $response->setData($exception->toDto());

        $event->setResponse($response);
    }
}
