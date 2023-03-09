<?php

namespace Ahmedash95\Sentimento\Enums;

enum Decision: string
{
    case Positive = 'positive';
    case Negative = 'negative';
    case Natural = 'natural';
    case Unknown = 'unknown';
}