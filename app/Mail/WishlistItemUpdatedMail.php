<?php

namespace App\Mail;

use App\Models\WishlistItem;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
// use Illuminate\Contracts\Queue\ShouldQueue; // Uncomment this if you want to queue update emails too

class WishlistItemUpdatedMail extends Mailable
// implements ShouldQueue // Uncomment this if you want to queue update emails too
{
    use Queueable, SerializesModels;

    /**
     * The updated wishlist item instance.
     *
     * @var \App\Models\WishlistItem
     */
    public $item;

    /**
     * Create a new message instance.
     */
    public function __construct(WishlistItem $item)
    {
        $this->item = $item;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Wishlist Item Updated: ' . $this->item->name,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.item_updated', // We'll create this new view
            with: [
                'item' => $this->item,
            ],
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