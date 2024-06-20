<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\DatabaseNotification;

class Notification extends DatabaseNotification
{
    protected $keyType = 'string';

    public $incrementing = false;

    protected $hidden = [];

    /**
     * Mark is the notification as read
     *
     * @return void
     */
    public function markItAsRead()
    {
        $this->setAttribute('read_at', now());
        $this->save();
    }
}
