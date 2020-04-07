<?php

declare(strict_types=1);

namespace Etrias\PayPalNvpConnector\Request;

class RefundTransactionRequest
{
    use QueryTrait;

    public const TYPE_FULL = 'FULL';
    public const TYPE_PARTIAL = 'PARTIAL';

    /** @var null|string */
    protected $transactionId;

    /** @var null|string */
    protected $refundType;

    /** @var null|string */
    protected $currencyCode;

    /** @var null|string */
    protected $amt;

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    public function setTransactionId(?string $transactionId): self
    {
        $this->transactionId = $transactionId;

        return $this;
    }

    public function getRefundType(): ?string
    {
        return $this->refundType;
    }

    public function setRefundType(?string $refundType): self
    {
        $this->refundType = $refundType;

        return $this;
    }

    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }

    public function setCurrencyCode(?string $currencyCode): self
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    public function getAmt(): ?string
    {
        return $this->amt;
    }

    public function setAmt(?string $amt): self
    {
        $this->amt = $amt;

        return $this;
    }
}
