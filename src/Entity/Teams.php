<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Teams
 *
 * @ORM\Table(name="teams", indexes={@ORM\Index(name="IDX_96C222583F4F52B7", columns={"leagueid"})})
 * @ORM\Entity
 */
class Teams
{
    /**
     * @var int
     *
     * @ORM\Column(name="teamid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="teams_teamid_seq", allocationSize=1, initialValue=1)
     */
    private $teamid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="teamname", type="string", length=255, nullable=true)
     */
    private $teamname;

    /**
     * @var \Leagues
     *
     * @ORM\ManyToOne(targetEntity="Leagues")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="leagueid", referencedColumnName="leagueid")
     * })
     */
    private $leagueid;

    public function getTeamid(): ?int
    {
        return $this->teamid;
    }

    public function getTeamname(): ?string
    {
        return $this->teamname;
    }

    public function setTeamname(?string $teamname): self
    {
        $this->teamname = $teamname;

        return $this;
    }

    public function getLeagueid(): ?Leagues
    {
        return $this->leagueid;
    }

    public function setLeagueid(?Leagues $leagueid): self
    {
        $this->leagueid = $leagueid;

        return $this;
    }


}
