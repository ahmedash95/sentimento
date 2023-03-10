<?php

use Ahmedash95\Sentimento\Http\Client;
use Illuminate\Support\Facades\Http;

function fakeClient($text = 'positive'): Client
{
    Http::fake([
        Client::ENDPOINT => Http::response([
            'choices' => [['message' => ['content' => $text]]],
        ]),
    ]);

    return new Client('fake_token');
}
