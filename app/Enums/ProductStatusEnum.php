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
            self::PENDING => 'Pending Approval',
            self::APPROVED => 'Approved',
            self::REJECTED => 'Rejected',
            self::SOLD => 'Sold',
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
