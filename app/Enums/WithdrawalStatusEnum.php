<?php

namespace App\Enums;

/**
 * Enum WithdrawalStatusEnum
 *
 * Enum for representing the status of a withdrawal.
 *
 * @package App\Enums
 */
enum WithdrawalStatusEnum: string
{
    /**
     * Status when the withdrawal is pending.
     */
    case PENDING = 'pending';

    /**
     * Status when the withdrawal is being processed.
     */
    case PROCESS = 'processed';

    /**
     * Status when the withdrawal is complete.
     */
    case COMPLETED = 'complete';

    /**
     * Status when the withdrawal has failed.
     */
    case FAILED = 'failed';

    /**
     * Get the label for the withdrawal status.
     *
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Menunggu Antrean',
            self::PROCESS => 'Diproses',
            self::COMPLETED => 'Selesai',
            self::FAILED => 'Gagal',
        };
    }

    /**
     * Get the color associated with the withdrawal status.
     *
     * @return string
     */
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
