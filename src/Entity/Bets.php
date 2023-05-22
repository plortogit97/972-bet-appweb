<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Bets
 *
 * @ORM\Table(name="bets", indexes={@ORM\Index(name="IDX_7C28752BF132696E", columns={"userid"}), @ORM\Index(name="IDX_7C28752B2940DF71", columns={"matchid"}), @ORM\Index(name="IDX_7C28752BD7E84C07", columns={"betonteamid"})})
 * @ORM\Entity
 */
class Bets
{
    /**
     * @var int
     *
     * @ORM\Column(name="betid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="bets_betid_seq", allocationSize=1, initialValue=1)
     */
    private $betid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="betamount", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $betamount;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userid", referencedColumnName="userid")
     * })
     */
    private $userid;

    /**
     * @var \Matches
     *
     * @ORM\ManyToOne(targetEntity="Matches")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="matchid", referencedColumnName="matchid")
     * })
     */
    private $matchid;

    /**
     * @var \Teams
     *
     * @ORM\ManyToOne(targetEntity="Teams")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="betonteamid", referencedColumnName="teamid")
     * })
     */
    private $betonteamid;

    public function getBetid(): ?int
    {
        return $this->betid;
    }

    public function getBetamount(): ?string
    {
        return $this->betamount;
    }

    public function setBetamount(?string $betamount): self
    {
        $this->betamount = $betamount;

        return $this;
    }

    public function getUserid(): ?User
    {
        return $this->userid;
    }

    public function setUserid(?User $userid): self
    {
        $this->userid = $userid;

        return $this;
    }

    public function getMatchid(): ?Matches
    {
        return $this->matchid;
    }

    public function setMatchid(?Matches $matchid): self
    {
        $this->matchid = $matchid;

        return $this;
    }

    public function getBetonteamid(): ?Teams
    {
        return $this->betonteamid;
    }

    public function setBetonteamid(?Teams $betonteamid): self
    {
        $this->betonteamid = $betonteamid;

        return $this;
    }


}
