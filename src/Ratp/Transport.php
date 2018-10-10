<?php

namespace Lametric\Ratp;

class Transport
{
    /**
     * @var string
     */
    private $way;

    /**
     * @var string
     */
    private $line;

    /**
     * @var string
     */
    private $station;

    /**
     * @var array
     */
    private $params;

    /**
     * Transport constructor.
     * @param array $params
     */
    public function __construct($params = array())
    {
        $this->params = $params;
    }

    /**
     * @throws TransportException
     * @throws UpdateException
     */
    public function validateParameters()
    {
        $rowsToCheck = [
            'line',
            'way',
            'station'
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
    public function getLine()
    {
        return $this->line;
    }

    /**
     * @return string
     */
    public function getStation()
    {
        return $this->station;
    }

    /**
     * @return string
     */
    public function getDestination()
    {
        return $this->way;
    }
}
