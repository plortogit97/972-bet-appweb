<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sports
 *
 * @ORM\Table(name="sports")
 * @ORM\Entity
 */
class Sports
{
    /**
     * @var int
     *
     * @ORM\Column(name="sportid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="sports_sportid_seq", allocationSize=1, initialValue=1)
     */
    private $sportid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sportname", type="string", length=255, nullable=true)
     */
    private $sportname;

    public function getSportid(): ?int
    {
        return $this->sportid;
    }

    public function getSportname(): ?string
    {
        return $this->sportname;
    }

    public function setSportname(?string $sportname): self
    {
        $this->sportname = $sportname;

        return $this;
    }


}
