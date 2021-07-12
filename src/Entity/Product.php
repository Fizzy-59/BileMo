<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(collectionOperations={"get"}, itemOperations={"get"})
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 * @UniqueEntity(
 *     fields={"name"},
 *     message="Name already used"
 * )
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=3, minMessage="The name must be at least 3 characters long")
     * @Assert\Length(max=255, maxMessage="The name must not do more 255 characters long")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=3, minMessage="The brand must be at least 3 characters long")
     * @Assert\Length(max=255, maxMessage="The brand must not do more 255 characters long")
     */
    private $brand;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="text", length=65535)
     * @Assert\Length(min=3, minMessage="The description must be at least 3 characters long")
     * @Assert\Length(max=255, maxMessage="The description must not do more 65535 characters long")
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
