<?php

namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class RequestListener
{
    private $apiKey;

    /**
     * RequestListener constructor.
     *
     * @param $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function onRequest(GetResponseEvent $event) {
        if (!$event->getRequest()->headers->has('X-API-KEY') || $event->getRequest()->headers->get('X-API-KEY') != $this->apiKey) {
            throw new AccessDeniedHttpException('Invalid API KEY.');
        }
    }
}