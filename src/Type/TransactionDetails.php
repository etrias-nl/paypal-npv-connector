<?php

declare(strict_types=1);

namespace Etrias\PayPalNvpConnector\Type;

class TransactionDetails
{
    use QueryResultTrait;

    /** @var null|string */
    protected $transactionId;

    /** @var null|string */
    protected $feeAmt;

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    public function getFeeAmt(): ?float
    {
        return null === $this->feeAmt ? null : (float) $this->feeAmt;
    }
}
