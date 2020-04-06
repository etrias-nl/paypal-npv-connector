<?php

declare(strict_types=1);

namespace Etrias\PayPalNvpConnector\HttpClient\Plugin;

use Etrias\PayPalNvpConnector\Exception\PayPalNvpException;
use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ErrorHandler implements Plugin
{
    /**
     * {@inheritdoc}
     */
    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        return $next($request)->then(function (ResponseInterface $response) {
            $status = $response->getStatusCode();

            if ($status >= 400 && $status < 500) {
                throw new PayPalNvpException((string) $response->getBody());
            }

            return $response;
        });
    }
}
