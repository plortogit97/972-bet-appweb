<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Matches
 *
 * @ORM\Table(name="matches", indexes={@ORM\Index(name="IDX_62615BA6B253E84", columns={"team1id"}), @ORM\Index(name="IDX_62615BA696380DD", columns={"team2id"})})
 * @ORM\Entity
 */
class Matches
{
    /**
     * @var int
     *
     * @ORM\Column(name="matchid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="matches_matchid_seq", allocationSize=1, initialValue=1)
     */
    private $matchid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="startdate", type="datetime", nullable=true)
     */
    private $startdate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="enddate", type="datetime", nullable=true)
     */
    private $enddate;

    /**
     * @var int|null
     *
     * @ORM\Column(name="scoreteam1", type="integer", nullable=true)
     */
    private $scoreteam1;

    /**
     * @var int|null
     *
     * @ORM\Column(name="scoreteam2", type="integer", nullable=true)
     */
    private $scoreteam2;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="ismatchover", type="boolean", nullable=true)
     */
    private $ismatchover;

    /**
     * @var \Teams
     *
     * @ORM\ManyToOne(targetEntity="Teams")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="team1id", referencedColumnName="teamid")
     * })
     */
    private $team1id;

    /**
     * @var \Teams
     *
     * @ORM\ManyToOne(targetEntity="Teams")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="team2id", referencedColumnName="teamid")
     * })
     */
    private $team2id;

    public function getMatchid(): ?int
    {
        return $this->matchid;
    }

    public function getStartdate(): ?\DateTimeInterface
    {
        return $this->startdate;
    }

    public function setStartdate(?\DateTimeInterface $startdate): self
    {
        $this->startdate = $startdate;

        return $this;
    }

    public function getEnddate(): ?\DateTimeInterface
    {
        return $this->enddate;
    }

    public function setEnddate(?\DateTimeInterface $enddate): self
    {
        $this->enddate = $enddate;

        return $this;
    }

    public function getScoreteam1(): ?int
    {
        return $this->scoreteam1;
    }

    public function setScoreteam1(?int $scoreteam1): self
    {
        $this->scoreteam1 = $scoreteam1;

        return $this;
    }

    public function getScoreteam2(): ?int
    {
        return $this->scoreteam2;
    }

    public function setScoreteam2(?int $scoreteam2): self
    {
        $this->scoreteam2 = $scoreteam2;

        return $this;
    }

    public function isIsmatchover(): ?bool
    {
        return $this->ismatchover;
    }

    public function setIsmatchover(?bool $ismatchover): self
    {
        $this->ismatchover = $ismatchover;

        return $this;
    }

    public function getTeam1id(): ?Teams
    {
        return $this->team1id;
    }

    public function setTeam1id(?Teams $team1id): self
    {
        $this->team1id = $team1id;

        return $this;
    }

    public function getTeam2id(): ?Teams
    {
        return $this->team2id;
    }

    public function setTeam2id(?Teams $team2id): self
    {
        $this->team2id = $team2id;

        return $this;
    }


}
