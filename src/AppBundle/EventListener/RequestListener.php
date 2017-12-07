<?php


namespace App\AppBundle\EventListener;


use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RequestListener
{
    public function onKernelRequest(GetResponseEvent $event)
    {
//        echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";
//
//        $browser = get_browser(null, true);
//        print_r($browser);
    }
}