<?php

declare(strict_types=1);

namespace Lametric\Ratp;

class Transport
{
    /**
     * @var string
     */
    private string $way;

    /**
     * @var string
     */
    private string $line;

    /**
     * @var string
     */
    private string $station;

    /**
     * @var array
     */
    private array $params;

    /**
     * @param array $params
     */
    public function __construct(array $params = [])
    {
        $this->params = $params;
    }

    /**
     * @throws TransportException
     * @throws UpdateException
     */
    public function validateParameters(): void
    {
        $rowsToCheck = [
            'line',
            'way',
            'station',
        ];

        if (!isset($this->params['way'])) {
            throw new UpdateException;
        }

        foreach ($rowsToCheck as $row) {
            if (!isset($this->params[$row]) || empty($this->params[$row])) {
                throw new TransportException;
            } else {
                $this->{$row} = $this->params[$row];
            }
        }
    }

    /**
     * @return string
     */
    public function getLine(): string
    {
        return $this->line;
    }

    /**
     * @return string
     */
    public function getStation(): string
    {
        return $this->station;
    }

    /**
     * @return string
     */
    public function getDestination(): string
    {
        return $this->way;
    }
}
