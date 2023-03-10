<?php

namespace Ahmedash95\Sentimento\Http;

use Ahmedash95\Sentimento\ValueObjects\Message;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class Client
{
    private PendingRequest $client;

    const ENDPOINT = 'https://api.openai.com/v1/chat/completions';

    public function __construct(string $token)
    {
        $this->client = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.$token,
        ]);
    }

    /**
     * @param  Message[]  $messages
     * @return Response
     */
    public function send(string $model, array $messages)
    {
        return $this->client->post(self::ENDPOINT, [
            'model' => $model,
            'messages' => $messages,
            'temperature' => 0.5,
            'max_tokens' => 5,
        ]);
    }
}
