<?php

namespace App\Mail;
use App\Models\Record;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrganizationRecordCompleted extends Mailable
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
            ->subject('New Record') //Asunto en el mensaje
            ->setAddress('whtinar@gmail.com') //direccion primaria a quien le va a llegar el correo
            ->setAddress('suyenfaudito@gmail.com') //direccion primaria a quien le va a llegar el correo
//            ->setAddress($this->record->setDateFormat('email'))
            ->setAddress('mncisneros@hotmail.com') //direccion primaria a quien le va a llegar el correo
            ->setAddress('shoenstanttconroe@gmail.com') //direccion primaria a quien le va a llegar el correo
            ->setAddress('schoenstattconroe@gmail.com') //direccion primaria a quien le va a llegar el correo
            ->setAddress('jochoa@inazca.com') //direccion primaria a quien le va a llegar el correo
            ->setAddress('mncisneros@hotmail.com') //direccion primaria a quien le va a llegar el correo
            ->view('mail.organization' , [ //el blade donde esta el formato del correo
                'record'=> $this->record,
            ]);
    }
}
