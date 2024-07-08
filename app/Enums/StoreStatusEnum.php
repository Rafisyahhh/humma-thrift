<?php

namespace App\Enums;

enum StoreStatusEnum: string
{
    case ONLINE = 'online';
    case OFFLINE = 'offline';
    case HOLIDAY = 'holiday';

    public function label()
    {
        return match ($this) {
            self::ONLINE => 'Online',
            self::OFFLINE => 'Offline',
            self::HOLIDAY => 'Libur / Cuti',
        };
    }

    public function color()
    {
        return match ($this) {
            self::ONLINE => 'success',
            self::OFFLINE => 'danger',
            self::HOLIDAY => 'warning',
        };
    }
}
