<?php

declare(strict_types=1);

namespace Etrias\PayPalNvpConnector\Request;

class GetBalanceRequest
{
    use QueryTrait;

    /** @var bool */
    protected $returnAllCurrencies = true;

    /** @var null|string */
    protected $currency;

    public function isReturnAllCurrencies(): bool
    {
        return $this->returnAllCurrencies;
    }

    public function setReturnAllCurrencies(bool $returnAllCurrencies): self
    {
        $this->returnAllCurrencies = $returnAllCurrencies;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(?string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }
}
