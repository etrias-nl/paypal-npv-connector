<?php

declare(strict_types=1);

namespace Etrias\PayPalNvpConnector\Type;

class Transaction
{
    use QueryResultTrait;

    public const STATUS_UNCLEARED = 'Uncleared';
    public const STATUS_HELD = 'Held';
    public const STATUS_REMOVED = 'Removed';
    public const STATUS_REVERSED = 'Reversed';
    public const STATUS_REFUNDED = 'Refunded';

    /** @var null|string */
    protected $status;

    /** @var null|string */
    protected $transactionId;

    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|string[] $status
     */
    public function isStatus($status): bool
    {
        return $status === $this->status || (\is_array($status) && \in_array($this->status, $status, true));
    }

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }
}
