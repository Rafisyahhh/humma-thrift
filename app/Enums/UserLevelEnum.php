<?php

namespace App\Enums;

enum UserLevelEnum: string
{
    case ADMIN = 'admin';
    case USER = 'user';

    public function label(): string
    {
        return match ($this) {
            UserLevelEnum::ADMIN => 'Admin',
            UserLevelEnum::USER => 'Pengguna',
        };
    }

    public function color(): string
    {
        return match ($this) {
            UserLevelEnum::ADMIN => 'primary',
            UserLevelEnum::USER => 'info',
        };
    }
}
