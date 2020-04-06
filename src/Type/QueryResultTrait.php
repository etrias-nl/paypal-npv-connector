<?php

declare(strict_types=1);

namespace Etrias\PayPalNvpConnector\Type;

trait QueryResultTrait
{
    public static function fromQueryResult(array $data): self
    {
        $result = new self();

        foreach (array_keys(get_object_vars($result)) as $key) {
            $result->{$key} = $data[strtoupper($key)] ?? null;
        }

        return $result;
    }
}
