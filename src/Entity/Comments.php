<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Comments
 *
 * @ORM\Table(name="comments", indexes={@ORM\Index(name="IDX_5F9E962AF132696E", columns={"userid"}), @ORM\Index(name="IDX_5F9E962A2940DF71", columns={"matchid"})})
 * @ORM\Entity
 */
class Comments
{
    /**
     * @var int
     *
     * @ORM\Column(name="commentid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="comments_commentid_seq", allocationSize=1, initialValue=1)
     */
    private $commentid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="commenttext", type="text", nullable=true)
     */
    private $commenttext;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="commenttime", type="datetime", nullable=true)
     */
    private $commenttime;

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

    public function getCommentid(): ?int
    {
        return $this->commentid;
    }

    public function getCommenttext(): ?string
    {
        return $this->commenttext;
    }

    public function setCommenttext(?string $commenttext): self
    {
        $this->commenttext = $commenttext;

        return $this;
    }

    public function getCommenttime(): ?\DateTimeInterface
    {
        return $this->commenttime;
    }

    public function setCommenttime(?\DateTimeInterface $commenttime): self
    {
        $this->commenttime = $commenttime;

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


}
