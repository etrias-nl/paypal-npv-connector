<?php

declare(strict_types=1);

namespace Etrias\PayPalNvpConnector\Request;

trait QueryTrait
{
    public function toQueryArray(): array
    {
        $query = array_filter(get_object_vars($this), function ($value) {
            return null !== $value;
        });

        return array_change_key_case(array_map(function ($value) {
            if ($value instanceof \DateTimeImmutable) {
                $value = \DateTime::createFromImmutable($value);
            }
            if ($value instanceof \DateTime) {
                return (clone $value)->setTimezone(new \DateTimeZone('UTC'))->format('Y-m-d\TH:i:s\Z');
            }

            return $value;
        }, $query), CASE_UPPER);
    }
}
