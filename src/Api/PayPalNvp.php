<?php

declare(strict_types=1);

namespace Etrias\PayPalNvpConnector\Api;

use Etrias\PayPalNvpConnector\Request\TransactionSearchRequest;
use Etrias\PayPalNvpConnector\Request\GetBalanceRequest;
use GuzzleHttp\Psr7\Uri;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Discovery\Psr17FactoryDiscovery;
use Psr\Http\Message\UriFactoryInterface;

class PayPalNvp
{
    protected const VERSION = '82';
    protected const PARAM_METHOD = 'METHOD';
    protected const PARAM_VERSION = 'VERSION';

    /** @var HttpMethodsClientInterface */
    protected $client;

    /** @var UriFactoryInterface */
    protected $uriFactory;

    public function __construct(
        HttpMethodsClientInterface $client,
        ?UriFactoryInterface $uriFactory = null
    ) {
        $this->client = $client;
        $this->uriFactory = $uriFactory ?? Psr17FactoryDiscovery::findUrlFactory();
    }

    public function getBalance(GetBalanceRequest $request): int
    {
        $data = $this->get(__FUNCTION__, $request->toQueryArray());
        $i = 0;

        while (isset($data['L_CURRENCYCODE'.$i])) {
            if ($request->getCurrency() === $data['L_CURRENCYCODE'.$i]) {
                return (int) $data['L_AMT'.$i];
            }
            ++$i;
        }

        return 0;
    }

    public function transactionSearch(TransactionSearchRequest $request)
    {
        $data = $this->get(__FUNCTION__, $request->toQueryArray());
    }

    protected function get(string $method, array $query): array
    {
        $query[self::PARAM_METHOD] = ucfirst($method);
        $query[self::PARAM_VERSION] = self::VERSION;

        $response = $this->client->get(Uri::withQueryValues($this->uriFactory->createUri(), $query));
        $result = [];

        parse_str((string) $response->getBody(), $result);

        return $result;
    }
}
