<?php

namespace App\EventListener;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class ExceptionListener
 * @package Api\EventListener
 */
class ExceptionListener
{
    public function onException(GetResponseForExceptionEvent $event)
    {
        $exception =  $event->getException();

        $statusCode = $exception->getStatusCode();
        $message = $this->toArray($exception->getStatusCode(), $exception->getMessage());

        $content = json_encode($message);
        $response = new Response($content, $statusCode);
        $response->headers->set('Content-Type', 'application/json');
        $event->setResponse($response);
    }

    private function toArray($code, $message)
    {
        return [
            'code' => $code,
            'message' => $message
        ];
    }
}