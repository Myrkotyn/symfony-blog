<?php

namespace App\AppBundle\EventListener;

use App\AppBundle\Entity\SessionStatistic;
use Doctrine\ORM\EntityManagerInterface;
use Sinergi\BrowserDetector\Browser;
use Sinergi\BrowserDetector\Os;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RequestListener
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $browser = new Browser();
        $os = new Os();
        $browserName = $browser->getName();
        $browserVersion = $browser->getVersion();
        $osName = $os->getName();

        $session = $this->em->getRepository(SessionStatistic::class)->findBy([
            'ip' => $ipAddress,
            'browser' => $browserName,
            'version' => $browserVersion,
            'os' => $osName
        ]);

        if (!$session) {
            $session = (new SessionStatistic())
                ->setBrowser($browserName)
                ->setVersion($browserVersion)
                ->setIp($ipAddress)
                ->setOs($osName);

            $this->em->persist($session);
            $this->em->flush();
        }
    }
}