<?php

namespace Ahmedash95\Sentimento;

use Ahmedash95\Sentimento\Enums\Decision;
use Ahmedash95\Sentimento\Http\Client;
use Ahmedash95\Sentimento\ValueObjects\Message;

class Sentimento
{
    public function __construct(private readonly Client $client, private $reportFailures = true)
    {
    }

    public function analyze($text): Decision
    {
        $messages = [
            Message::forAssistant("I'm a sentiment analysis engine,you send me the text and I would only respond with one word either 'positive', 'negative', 'natural'")->toArray(),
            Message::forUser($text)->toArray(),
        ];

        $choices = $this->client
            ->send('gpt-3.5-turbo', $messages)
            ->throwIf($this->reportFailures)
            ->json()['choices'] ?? [];

        if (empty($choices)) {
            return Decision::Unknown;
        }

        return Decision::tryFrom($choices[0]['message']['content']) ?? Decision::Unknown;
    }
}
