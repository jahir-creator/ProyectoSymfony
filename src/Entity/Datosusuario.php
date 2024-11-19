<?php

namespace App\Entity;

use App\Repository\DatosusuarioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DatosusuarioRepository::class)]
class Datosusuario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $nombre = null;

    #[ORM\Column(length: 10)]
    private ?string $edad = null;

    public function __construct($nombre = null, $edad = null) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getEdad(): ?string
    {
        return $this->edad;
    }

    public function setEdad(string $edad): static
    {
        $this->edad = $edad;

        return $this;
    }
}
