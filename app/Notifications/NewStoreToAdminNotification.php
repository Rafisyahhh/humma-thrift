<?php

namespace App\Notifications;

use App\Models\UserStore;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewStoreToAdminNotification extends Notification
{
    use Queueable;

    /**
     * The user store instance.
     *
     * @var UserStore
     */
    protected $userStore;

    /**
     * Create a new notification instance.
     *
     * @param UserStore $userStore
     */
    public function __construct(UserStore $userStore)
    {
        $this->userStore = $userStore;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable)
    {
        return [
            'title' => "Toko Baru Telah Dibuat",
            'user_store_id' => $this->userStore->id,
            'link' => route('store.profile', $this->userStore->username),
            'message' => 'Toko baru telah dibuat dan masih menunggu verifikasi dari user yang membuatnya.',
        ];
    }
}
