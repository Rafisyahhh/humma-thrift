<?php

namespace App\Mail;

use App\Models\UserStore;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewUserStoreNotificationToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public UserStore $userStore;

    /**
     * Create a new message instance.
     *
     * @param  UserStore  $userStore
     * @return void
     */
    public function __construct(UserStore $userStore)
    {
        $this->userStore = $userStore;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Ada Toko Baru Saja Dibuat!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.notify.new-store-to-admin',
            with: [
                'userStore' => $this->userStore
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
