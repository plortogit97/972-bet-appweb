<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Leagues
 *
 * @ORM\Table(name="leagues", indexes={@ORM\Index(name="IDX_85CE39E3C8225A1", columns={"sportid"})})
 * @ORM\Entity
 */
class Leagues
{
    /**
     * @var int
     *
     * @ORM\Column(name="leagueid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="leagues_leagueid_seq", allocationSize=1, initialValue=1)
     */
    private $leagueid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="leaguename", type="string", length=255, nullable=true)
     */
    private $leaguename;

    /**
     * @var \Sports
     *
     * @ORM\ManyToOne(targetEntity="Sports")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sportid", referencedColumnName="sportid")
     * })
     */
    private $sportid;

    public function getLeagueid(): ?int
    {
        return $this->leagueid;
    }

    public function getLeaguename(): ?string
    {
        return $this->leaguename;
    }

    public function setLeaguename(?string $leaguename): self
    {
        $this->leaguename = $leaguename;

        return $this;
    }

    public function getSportid(): ?Sports
    {
        return $this->sportid;
    }

    public function setSportid(?Sports $sportid): self
    {
        $this->sportid = $sportid;

        return $this;
    }


}
