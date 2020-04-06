<?php

declare(strict_types=1);

namespace Etrias\PayPalNvpConnector\Request;

class TransactionSearchRequest
{
    use QueryTrait;

    /** @var \DateTimeInterface|null */
    protected $startDate;

    /** @var string|null */
    protected $invNum;

    /** @var string|null */
    protected $transactionId;

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getInvNum(): ?string
    {
        return $this->invNum;
    }

    public function setInvNum(?string $invNum): self
    {
        $this->invNum = $invNum;

        return $this;
    }

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    public function setTransactionId(?string $transactionId): self
    {
        $this->transactionId = $transactionId;

        return $this;
    }
}
