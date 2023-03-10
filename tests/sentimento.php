<?php

use Ahmedash95\Sentimento\Enums\Decision;
use Ahmedash95\Sentimento\Http\Client;
use Ahmedash95\Sentimento\Sentimento;
use Illuminate\Http\Client\RequestException;
use Tests\TestCase;

uses(TestCase::class);

it('should return a sentiment', function () {
    $sentimento = new Sentimento(fakeClient());

    expect($sentimento->analyze('Food was good!'))->toBe(Decision::Positive);
});

it('should return unknown on unexpected response', function () {
    $sentimento = new Sentimento(fakeClient('unexpected message'));

    expect($sentimento->analyze('Food was good!'))->toBe(Decision::Unknown);
});

it('should throw exception on api errors', function () {
    $sentimento = new Sentimento(new Client('fake_token'));

    $sentimento->analyze('Food was good!');
})->throws(RequestException::class);

it('should fail silently if report_failures is false', function () {
    $sentimento = new Sentimento(new Client('fake_token'), false);

    expect($sentimento->analyze('Food was good!'))->toBe(Decision::Unknown);
});
