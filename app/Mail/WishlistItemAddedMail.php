<?php

namespace App\Mail;

use App\Models\WishlistItem; 
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class WishlistItemAddedMail extends Mailable

{
    use Queueable, SerializesModels;

    /**
     * The wishlist item instance.
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


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Wishlist Item Added: ' . $this->item->name, 

        );
    }



    public function content(): Content
    {
        return new Content(
            view: 'emails.item_added', 
            with: [
                'item' => $this->item,
            ],
        );
    }

 
     

    public function attachments(): array
    {
        return [];
    }
}