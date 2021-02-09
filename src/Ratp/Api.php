<?php

declare(strict_types=1);

namespace Lametric\Ratp;

class Api
{
    const API_URL = 'https://api-ratp.pierre-grimaud.fr/v3';

    /**
     * @var string
     */
    private string $urlToCall;

    /**
     * @var Transport
     */
    private Transport $transport;

    /**
     * Api constructor.
     * @param Transport $transport
     */
    public function __construct(Transport $transport)
    {
        $this->transport = $transport;
    }

    public function createUrlToCall(): void
    {
        $this->urlToCall = self::API_URL . '/schedules/bus/'
            . strtolower($this->transport->getLine()) . '/'
            . strtolower($this->transport->getStation()) . '/'
            . strtoupper($this->transport->getDestination());
    }

    /**
     * @return string
     */
    public function getUrlToCall(): string
    {
        return (string)$this->urlToCall;
    }
}
