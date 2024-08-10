<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CertificateVerificationAttempt extends Mailable
{
    use Queueable, SerializesModels;

    public $certificate;
    public $status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($certificate, $status)
    {
        $this->certificate = $certificate;
        $this->status = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.certificate_verification_attempt')
                    ->with([
                        'certificate' => $this->certificate,
                        'status' => $this->status,
                    ]);
    }
}
