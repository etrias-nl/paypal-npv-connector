<?php

declare(strict_types=1);

namespace Etrias\PayPalNvpConnector\Api;

use Etrias\PayPalNvpConnector\Exception\PayPalNvpException;
use Etrias\PayPalNvpConnector\Request\DoExpressCheckoutPaymentRequest;
use Etrias\PayPalNvpConnector\Request\GetBalanceRequest;
use Etrias\PayPalNvpConnector\Request\GetExpressCheckoutDetailsRequest;
use Etrias\PayPalNvpConnector\Request\GetTransactionDetailsRequest;
use Etrias\PayPalNvpConnector\Request\RefundTransactionRequest;
use Etrias\PayPalNvpConnector\Request\SetExpressCheckoutRequest;
use Etrias\PayPalNvpConnector\Request\TransactionSearchRequest;
use Etrias\PayPalNvpConnector\Type\Transaction;
use Etrias\PayPalNvpConnector\Type\TransactionDetails;
use GuzzleHttp\Psr7\Uri;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Discovery\Psr17FactoryDiscovery;
use Psr\Http\Message\UriFactoryInterface;

class PayPalNvp
{
    protected const VERSION = '82';
    protected const ACK = ['SUCCESS', 'SUCCESSWITHWARNING'];
    protected const PARAM_METHOD = 'METHOD';
    protected const PARAM_VERSION = 'VERSION';
    protected const PARAM_ACK = 'ACK';
    protected const PARAM_ERROR_CODE = 'L_ERRORCODE0';
    protected const PARAM_ERROR_MESSAGE = 'L_LONGMESSAGE0';

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

    /**
     * @return Transaction[]
     */
    public function transactionSearch(TransactionSearchRequest $request): array
    {
        $data = $this->get(__FUNCTION__, $request->toQueryArray());
        $groups = [];

        foreach ($data as $key => $value) {
            if (preg_match('~^L_(.+?)(\d++)$~', $key, $matches)) {
                $groups[$matches[2]][$matches[1]] = $value;
            }
        }

        $transactions = [];
        foreach ($groups as $group) {
            $transactions[] = Transaction::fromQueryResult($group);
        }

        return $transactions;
    }

    public function getTransactionDetails(GetTransactionDetailsRequest $request): TransactionDetails
    {
        $data = $this->get(__FUNCTION__, $request->toQueryArray());

        return TransactionDetails::fromQueryResult($data);
    }

    public function refundTransaction(RefundTransactionRequest $request): array
    {
        return $this->get(__FUNCTION__, $request->toQueryArray());
    }

    public function setExpressCheckout(SetExpressCheckoutRequest $request): array
    {
        return $this->get(__FUNCTION__, $request->toQueryArray());
    }

    public function getExpressCheckoutDetails(GetExpressCheckoutDetailsRequest $request): array
    {
        return $this->get(__FUNCTION__, $request->toQueryArray());
    }

    public function doExpressCheckoutPayment(DoExpressCheckoutPaymentRequest $request): array
    {
        return $this->get(__FUNCTION__, $request->toQueryArray());
    }

    protected function get(string $method, array $query): array
    {
        $query[self::PARAM_METHOD] = ucfirst($method);
        $query[self::PARAM_VERSION] = self::VERSION;

        $response = $this->client->get(Uri::withQueryValues($this->uriFactory->createUri(), $query));
        $result = [];

        parse_str((string) $response->getBody(), $result);

        if (isset($result[self::PARAM_ACK]) && !\in_array(strtoupper($result[self::PARAM_ACK]), self::ACK, true)) {
            $message = $result[self::PARAM_ERROR_MESSAGE] ?? $result[self::PARAM_ACK];
            if (isset($result[self::PARAM_ERROR_CODE])) {
                $message.= ' (code='.$result[self::PARAM_ERROR_CODE].')';
            }

            throw new PayPalNvpException($message);
        }

        return $result;
    }
}
