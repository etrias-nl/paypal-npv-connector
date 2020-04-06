<?php

declare(strict_types=1);

namespace Tests\Etrias\PayPalNvpConnector\Functional\Api;

use Etrias\PayPalNvpConnector\Api\PayPalNvp;
use Etrias\PayPalNvpConnector\HttpClient\Plugin\Authentication;
use Etrias\PayPalNvpConnector\HttpClient\Plugin\ErrorHandler;
use Etrias\PayPalNvpConnector\Request\GetBalanceRequest;
use Http\Client\Common\HttpMethodsClient;
use Http\Client\Common\Plugin\BaseUriPlugin;
use Http\Client\Common\Plugin\ErrorPlugin;
use Http\Client\Common\PluginClient;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Message\MessageFactory\GuzzleMessageFactory;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
final class PayPalNvpTest extends TestCase
{
    /** @var PayPalNvp */
    protected $nvp;

    protected function setUp(): void
    {
        $client = new HttpMethodsClient(
            new PluginClient(HttpClientDiscovery::find(), [
                new ErrorPlugin(['only_server_exception' => true]),
                new ErrorHandler(),
                new BaseUriPlugin(Psr17FactoryDiscovery::findUrlFactory()->createUri(getenv('PAYPAL_NVP_BASE_URI'))),
                new Authentication(
                    getenv('PAYPAL_NVP_USERNAME'),
                    getenv('PAYPAL_NVP_PASSWORD'),
                    getenv('PAYPAL_NVP_SIGNATURE')
                ),
            ]),
            new GuzzleMessageFactory()
        );

        $this->nvp = new PayPalNvp($client);
    }

    public function testGetBalance(): void
    {
        $request = new GetBalanceRequest();
        $request->setCurrency('EUR');

        self::assertGreaterThanOrEqual(0, $this->nvp->getBalance($request));
    }
}
