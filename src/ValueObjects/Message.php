<?php

namespace Ahmedash95\Sentimento\ValueObjects;

use Ahmedash95\Sentimento\Enums\Role;

class Message
{
    public function __construct(private readonly Role $role, private readonly string $content)
    {
    }

    public static function forAssistant(string $content): self
    {
        return new self(Role::Assistant, $content);
    }

    public static function forUser(string $content): self
    {
        return new self(Role::User, $content);
    }

    public function toArray(): array
    {
        return [
            'role' => $this->role,
            'content' => $this->content,
        ];
    }
}
