<?php

namespace App\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class SessionStatistic
 * @package App\AppBundle\Entity
 *
 * @ORM\Entity(repositoryClass="App\AppBundle\Repository\SessionStatisticRepository")
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
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $version;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $os;

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

    /**
     * @return string
     */
    public function getVersion(): ?string
    {
        return $this->version;
    }

    /**
     * @param string $version
     *
     * @return SessionStatistic
     */
    public function setVersion(string $version): SessionStatistic
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return string
     */
    public function getOs(): ?string
    {
        return $this->os;
    }

    /**
     * @param string $os
     *
     * @return SessionStatistic
     */
    public function setOs(string $os): SessionStatistic
    {
        $this->os = $os;

        return $this;
    }
}