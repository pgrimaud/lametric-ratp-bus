<?php
namespace Lametric\Ratp;

class Transport
{
    /**
     * @var string
     */
    private $destination;

    /**
     * @var string
     */
    private $line;

    /**
     * @var string
     */
    private $station;

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
     */
    public function validateParameters()
    {
        $rowsToCheck = [
            'line',
            'destination',
            'station'
        ];

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
        return $this->destination;
    }

}