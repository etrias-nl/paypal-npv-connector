<?php

declare(strict_types=1);

namespace Etrias\PayPalNvpConnector\Request;

class GetTransactionDetailsRequest
{
    use QueryTrait;

    /** @var null|string */
    protected $transactionId;

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
