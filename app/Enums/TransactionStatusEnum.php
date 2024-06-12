<?php

namespace App\Enums;

enum TransactionStatusEnum: string
{
    case UNPAID = 'UNPAID';
    case PAID = 'PAID';
    case REFUND = 'REFUND';
    case EXPIRED = 'EXPIRED';
    case FAILED = 'FAILED';

    public function label(): string
    {
        return match($this) {
            self::UNPAID => 'Belum Dibayar',
            self::PAID => 'Dibayar',
            self::REFUND => 'Dikembalikan',
            self::EXPIRED => 'Kedaluwarsa',
            self::FAILED => 'Gagal',
        };
    }

    public function color(): string
    {
        return match($this) {
            self::UNPAID => 'danger',    // Red
            self::PAID => 'success',     // Green
            self::REFUND => 'info',      // Blue
            self::EXPIRED => 'secondary',// Gray
            self::FAILED => 'dark',      // Dark
        };
    }
}
