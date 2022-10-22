<?php

namespace App\Mail;

use App\Models\Record;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OwnerRecordCompleted extends Mailable
{
    use Queueable, SerializesModels;

    /** @var Record $record */
    private $record;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Record $record)
    {
        $this->record = $record;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('se registro tu grupo')
        ->setAddress($this->record->email)
        ->view('mail.owner' , [
           'record'=> $this->record,
        ]);
    }
}
