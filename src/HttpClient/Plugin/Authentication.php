<?php

declare(strict_types=1);

namespace Etrias\PayPalNvpConnector\HttpClient\Plugin;

use GuzzleHttp\Psr7\Uri;
use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;

class Authentication implements Plugin
{
    protected const PARAM_USERNAME = 'USER';
    protected const PARAM_PASSWORD = 'PWD';
    protected const PARAM_SIGNATURE = 'SIGNATURE';

    /** @var array */
    protected $query;

    public function __construct(
        string $username,
        string $password,
        string $signature
    ) {
        $this->query = [
            self::PARAM_USERNAME => $username,
            self::PARAM_PASSWORD => $password,
            self::PARAM_SIGNATURE => $signature,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        return $next($request->withUri(Uri::withQueryValues($request->getUri(), $this->query)));
    }
}
