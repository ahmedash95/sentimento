<?php

namespace Ahmedash95\Sentimento;

use Ahmedash95\Sentimento\Http\Client;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SentimentoServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('sentimento')
            ->hasConfigFile();
    }

    public function registeringPackage()
    {
        $this->app->singleton(Sentimento::class, function () {
            $client = new Client(config('sentimento.token'));

            return new Sentimento($client, config('sentimento.report_failures', true));
        });
    }
}
