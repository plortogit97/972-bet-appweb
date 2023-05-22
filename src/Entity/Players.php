<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Players
 *
 * @ORM\Table(name="players", indexes={@ORM\Index(name="IDX_264E43A64DD6ABF3", columns={"teamid"})})
 * @ORM\Entity
 */
class Players
{
    /**
     * @var int
     *
     * @ORM\Column(name="playerid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="players_playerid_seq", allocationSize=1, initialValue=1)
     */
    private $playerid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="playername", type="string", length=255, nullable=true)
     */
    private $playername;

    /**
     * @var string|null
     *
     * @ORM\Column(name="position", type="string", length=255, nullable=true)
     */
    private $position;

    /**
     * @var \Teams
     *
     * @ORM\ManyToOne(targetEntity="Teams")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="teamid", referencedColumnName="teamid")
     * })
     */
    private $teamid;

    public function getPlayerid(): ?int
    {
        return $this->playerid;
    }

    public function getPlayername(): ?string
    {
        return $this->playername;
    }

    public function setPlayername(?string $playername): self
    {
        $this->playername = $playername;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(?string $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getTeamid(): ?Teams
    {
        return $this->teamid;
    }

    public function setTeamid(?Teams $teamid): self
    {
        $this->teamid = $teamid;

        return $this;
    }


}
