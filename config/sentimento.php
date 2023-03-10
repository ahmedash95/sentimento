<?php

return [
    'token' => env('SENTIMENTO_OPENAI_TOKEN'),

    // Sending a request to OpenAI API might fail due to many reasons.
    // If you want to report these failures, set this to true.
    // if false, the result will be Decision::Unknown in case of api errors.
    'report_failures' => true,
];
