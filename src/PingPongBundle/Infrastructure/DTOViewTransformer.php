<?php

namespace PingPongBundle\Infrastructure;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;

class DTOViewTransformer
{
    public function onKernelView(GetResponseForControllerResultEvent $event)
    {
        $dto = $event->getControllerResult();

        if(!($dto instanceof DtoObject)){
            return;
        }

        $response = new JsonResponse();
        $response->setStatusCode(Response::HTTP_OK);
        $response->setData($dto->toArray());
        $event->setResponse($response);
    }
}
