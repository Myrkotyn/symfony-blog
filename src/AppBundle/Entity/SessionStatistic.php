<?php

namespace App\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class SessionStatistic
 * @package App\AppBundle\Entity
 *
 * @ORM\Entity()
 * @ORM\Table(name="session_statistics")
 */
class SessionStatistic
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $browser;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getIp(): ?string
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     *
     * @return SessionStatistic
     */
    public function setIp(string $ip): SessionStatistic
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * @return string
     */
    public function getBrowser(): ?string
    {
        return $this->browser;
    }

    /**
     * @param string $browser
     *
     * @return SessionStatistic
     */
    public function setBrowser(string $browser): SessionStatistic
    {
        $this->browser = $browser;

        return $this;
    }
}