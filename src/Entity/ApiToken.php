<?php

namespace App\Entity;

use App\Repository\ApiTokenRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApiTokenRepository::class)
 */
class ApiToken
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $token;

    /**
     * @ORM\Column(type="datetime")
     */
    private $expireAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="apiTokens")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function __construct(user $user)
    {
        $this->token = bin2hex(random_bytes(60));
        $this->user = $user;
        $this->expireAt = new \DateTime('+1 hour');
        
    }

    public function renewExpiresAt ()
    {
        $this->expireAt = new \DateTime('+1 hour');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }



    public function getExpireAt(): ?\DateTimeInterface
    {
        return $this->expireAt;
    }



    public function getUser(): ?user
    {
        return $this->user;
    }

}
