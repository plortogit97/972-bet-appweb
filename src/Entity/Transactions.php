<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Transactions
 *
 * @ORM\Table(name="transactions", indexes={@ORM\Index(name="IDX_EAA81A4CF132696E", columns={"userid"})})
 * @ORM\Entity
 */
class Transactions
{
    /**
     * @var int
     *
     * @ORM\Column(name="transactionid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="transactions_transactionid_seq", allocationSize=1, initialValue=1)
     */
    private $transactionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="transactionamount", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $transactionamount;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="transactiontime", type="datetime", nullable=true)
     */
    private $transactiontime;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userid", referencedColumnName="userid")
     * })
     */
    private $userid;

    public function getTransactionid(): ?int
    {
        return $this->transactionid;
    }

    public function getTransactionamount(): ?string
    {
        return $this->transactionamount;
    }

    public function setTransactionamount(?string $transactionamount): self
    {
        $this->transactionamount = $transactionamount;

        return $this;
    }

    public function getTransactiontime(): ?\DateTimeInterface
    {
        return $this->transactiontime;
    }

    public function setTransactiontime(?\DateTimeInterface $transactiontime): self
    {
        $this->transactiontime = $transactiontime;

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


}
