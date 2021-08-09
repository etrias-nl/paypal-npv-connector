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

    public const TYPE_REFUND = 'Refund';
    public const TYPE_PAYMENT = 'Payment';

    /** @var null|string */
    protected $status;

    /** @var null|string */
    protected $transactionId;

    /** @var null|string */
    protected $type;

    /** @var null|string */
    protected $amt;

    /** @var null|string */
    protected $feeamt;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|string[] $type
     */
    public function isType($type): bool
    {
        return $type === $this->type || (\is_array($type) && \in_array($this->type, $type, true));
    }

    /**
     * @return string|null
     */
    public function getAmt(): ?string
    {
        return $this->amt;
    }

    /**
     * @return string|null
     */
    public function getFeeamt(): ?string
    {
        return $this->feeamt;
    }
}
