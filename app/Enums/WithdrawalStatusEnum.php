<?php

use App\Enums;

enum WithdrawalStatusEnum: string
{
    case PENDING = 'pending';
    case PROCESS = 'processed';
    case COMPLETED = 'complete';
    case FAILED = 'failed';

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Menunggu Antrean',
            self::PROCESS => 'Diproses',
            self::COMPLETED => 'Selesai',
            self::FAILED => 'Gagal',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::PENDING => 'warning',
            self::PROCESS => 'primary',
            self::COMPLETED => 'success',
            self::FAILED => 'danger',
        };
    }
}
