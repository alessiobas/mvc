<?php

namespace App\Entity;

use App\Repository\SweOrgsEmissions2012Repository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SweOrgsEmissions2012Repository::class)]
class SweOrgsEmissions2012
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $jordbruk;

    #[ORM\Column(type: 'integer')]
    private $mineral;

    #[ORM\Column(type: 'integer')]
    private $tillverkningsindustrin;

    #[ORM\Column(type: 'integer')]
    private $elochvatten;

    #[ORM\Column(type: 'integer')]
    private $bygg;

    #[ORM\Column(type: 'integer')]
    private $transport;

    #[ORM\Column(type: 'integer')]
    private $ovrigt;

    #[ORM\Column(type: 'integer')]
    private $offentligsektor;

    #[ORM\Column(type: 'integer')]
    private $hushalletc;

    #[ORM\Column(type: 'integer')]
    private $total;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJordbruk(): ?int
    {
        return $this->jordbruk;
    }

    public function setJordbruk(int $jordbruk): self
    {
        $this->jordbruk = $jordbruk;

        return $this;
    }

    public function getMineral(): ?int
    {
        return $this->mineral;
    }

    public function setMineral(int $mineral): self
    {
        $this->mineral = $mineral;

        return $this;
    }

    public function getTillverkningsindustrin(): ?int
    {
        return $this->tillverkningsindustrin;
    }

    public function setTillverkningsindustrin(int $tillverkningsindustrin): self
    {
        $this->tillverkningsindustrin = $tillverkningsindustrin;

        return $this;
    }

    public function getElochvatten(): ?int
    {
        return $this->elochvatten;
    }

    public function setElochvatten(int $elochvatten): self
    {
        $this->elochvatten = $elochvatten;

        return $this;
    }

    public function getBygg(): ?int
    {
        return $this->bygg;
    }

    public function setBygg(int $bygg): self
    {
        $this->bygg = $bygg;

        return $this;
    }

    public function getTransport(): ?int
    {
        return $this->transport;
    }

    public function setTransport(int $transport): self
    {
        $this->transport = $transport;

        return $this;
    }

    public function getOvrigt(): ?int
    {
        return $this->ovrigt;
    }

    public function setOvrigt(int $ovrigt): self
    {
        $this->ovrigt = $ovrigt;

        return $this;
    }

    public function getOffentligsektor(): ?int
    {
        return $this->offentligsektor;
    }

    public function setOffentligsektor(int $offentligsektor): self
    {
        $this->offentligsektor = $offentligsektor;

        return $this;
    }

    public function getHushalletc(): ?int
    {
        return $this->hushalletc;
    }

    public function setHushalletc(int $hushalletc): self
    {
        $this->hushalletc = $hushalletc;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(int $total): self
    {
        $this->total = $total;

        return $this;
    }
}
