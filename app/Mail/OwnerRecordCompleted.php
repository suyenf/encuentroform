<?php

namespace App\Mail;

use App\Models\Event;
use App\Models\Record;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class OwnerRecordCompleted extends Mailable
{
    use Queueable, SerializesModels;

    /** @var Record $record */
    private $record;

    private $event;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Record $record, Event $event)
    {
        $this->record = $record;
        $this->event  = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $img_url = Storage::disk('public')->url($this->event->image);

        $this
            ->view('mail.owner', [
                'record' => $this->record,
                'event' => $this->event,
                'img_url' => $img_url,
            ])
            ->subject('Registration Successful');

        if (app()->environment() === 'production') {
            $this
                ->setAddress($this->record->email)
                ->setAddress('whtinar@gmail.com');
        }
        $this->setAddress('suyenfaudito@yahoo.com');

        return $this;
    }
}
