<?php

namespace App\Enums;

enum ProductStatusEnum: string
{
    case PENDING = 'pending';
    case APPROVED = 'approve';
    case REJECTED = 'rejected';
    case SOLD = 'sold';

    public function label(): string
    {
        return match($this) {
            self::PENDING => 'Draf',
            self::APPROVED => 'Dipublikasikan',
            self::REJECTED => 'Ditolak',
            self::SOLD => 'Terjual',
        };
    }

    public function color(): string
    {
        return match($this) {
            self::PENDING => 'yellow',
            self::APPROVED => 'green',
            self::REJECTED => 'red',
            self::SOLD => 'blue',
        };
    }
}
