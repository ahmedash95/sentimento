<?php

namespace Ahmedash95\Sentimento\Facade;

use Illuminate\Support\Facades\Facade;

class Sentimento extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Ahmedash95\Sentimento\Sentimento::class;
    }
}
