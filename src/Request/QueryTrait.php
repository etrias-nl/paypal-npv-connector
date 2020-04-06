<?php

declare(strict_types=1);

namespace Etrias\PayPalNvpConnector\Request;

trait QueryTrait
{
    public function toQueryArray(): array
    {
        return array_change_key_case(get_object_vars($this), CASE_UPPER);
    }
}
