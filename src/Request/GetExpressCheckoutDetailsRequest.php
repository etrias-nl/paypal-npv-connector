<?php

declare(strict_types=1);

namespace Etrias\PayPalNvpConnector\Request;

class GetExpressCheckoutDetailsRequest
{
    use QueryTrait;

    protected ?string $token;

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): self
    {
        $this->token = $token;

        return $this;
    }
}
