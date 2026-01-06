<?php

namespace App\Enum;

enum UserRoleEnum: string
{
    case AUTHORITY = 'authority';
    case USER = 'user';

    // Optional: Helper method to check role
    public function isAuthority(): bool
    {
        return $this === self::AUTHORITY;
    }
    
    public function isUser(): bool
    {
        return $this === self::USER;
    }
}
