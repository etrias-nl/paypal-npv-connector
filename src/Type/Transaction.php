<?php

declare(strict_types=1);

namespace Etrias\PayPalNvpConnector\Type;

class Transaction
{
    use QueryResultTrait;

    /** @var null|string */
    protected $status;

    public function getStatus(): ?string
    {
        return $this->status;
    }
}
