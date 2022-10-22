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
        return $this
        ->subject('Registration Successful')
            ->setAddress($this->record->setDateFormat('email'))
//            ->setAddress('suyenfaudito@yahoo.com')
//            ->setAddress($this->record->email)
//        ->view('mail.owner' , ['record'=> $this->record,
        ->view('mail.owner' , [
            'record' => $this->record,
            'event' => $this->event,
            'img_url' => $img_url,
        ]);
    }
}

