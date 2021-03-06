<?php

declare(strict_types=1);

namespace Lametric\Ratp;

class Icon
{
    const ICON_ERROR = 'i2600';
    const ICON_BUS = 'i6364';

    /**
     * @var Transport
     */
    private Transport $transport;

    /**
     * @var string
     */
    private string $iconCode;

    /**
     * Icons constructor.
     * @param Transport $transport
     */
    public function __construct(Transport $transport)
    {
        $this->transport = $transport;
        $this->iconCode  = $this->getIcon();
    }

    /**
     * @return string
     */
    private function getIcon(): string
    {
        $icons = [
            'default' => 'i2600',
            'metro1'  => 'i2605',
            'metro2'  => 'i2606',
            'metro3'  => 'i2608',
            'metro3b' => 'i2607',
            'metro4'  => 'i2609',
            'metro5'  => 'i2610',
            'metro6'  => 'i2590',
            'metro7'  => 'i2611',
            'metro7b' => 'i2612',
            'metro8'  => 'i2613',
            'metro9'  => 'i2614',
            'metro10' => 'i2615',
            'metro11' => 'i2617',
            'metro12' => 'i2618',
            'metro13' => 'i2616',
            'metro14' => 'i2619',
            'rera'    => 'i2620',
            'rerb'    => 'i2621',
        ];

        return isset($icons[$this->transport->getLine()]) ? $icons[$this->transport->getLine()] : $icons['default'];
    }

    /**
     * @return mixed
     */
    public function getIconCode(): string
    {
        return $this->iconCode;
    }
}
