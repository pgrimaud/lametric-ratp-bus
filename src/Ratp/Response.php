<?php

declare(strict_types=1);

namespace Lametric\Ratp;

class Response
{
    /**
     * @var Icon
     */
    private Icon $icon;

    /**
     * @var mixed
     */
    private $body;

    /**
     * Response constructor.
     */
    public function __construct()
    {
        header("Content-Type: application/json");
    }

    /**
     * @return mixed
     */
    public function returnError(): string
    {
        return $this->asJson([
            'frames' => [
                [
                    'index' => 0,
                    'text'  => 'Please check app configuration',
                    'icon'  => Icon::ICON_ERROR,
                ],
            ],
        ]);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function asJson(array $data = []): string
    {
        return json_encode($data);
    }

    /**
     * @param Icon $icon
     */
    public function setIcon(Icon $icon): void
    {
        $this->icon = $icon;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): void
    {
        $this->body = json_decode($body, true);
    }

    /**
     * @param string $line
     *
     * @return string
     */
    public function returnResponse(string $line): string
    {
        $destination = (string)$line . ' - ' . $this->body['result']['schedules'][0]['destination'];

        $message = str_replace('mn', 'min', (string)$this->body['result']['schedules'][0]['message']);

        if (isset($this->body['result']['schedules'][1])) {
            $message2 = str_replace('mn', 'min', (string)$this->body['result']['schedules'][1]['message']);
        } else {
            $message2 = str_replace('mn', 'min', (string)$this->body['result']['schedules'][0]['message']);
        }


        $data = [
            'frames' => [
                [
                    'index' => 0,
                    'text'  => $destination,
                    'icon'  => Icon::ICON_BUS,
                ],
                [
                    'index' => 1,
                    'text'  => $message,
                    'icon'  => $this->icon->getIconCode(),
                ],
                [
                    'index' => 2,
                    'text'  => $message2,
                    'icon'  => $this->icon->getIconCode(),
                ],
            ],
        ];

        return $this->asJson($data);
    }

    /**
     * @return string
     */
    public function updateError(): string
    {
        return $this->asJson([
            'frames' => [
                [
                    'index' => 0,
                    'text'  => 'Please update application',
                    'icon'  => Icon::ICON_ERROR,
                ],
            ],
        ]);
    }
}
