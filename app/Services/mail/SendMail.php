<?php

namespace App\Services\mail;

use App\Mail\Mail as MailController;
use Illuminate\Support\Facades\Mail;

class SendMail
{
    public function __construct() {}

    private function sendMail(BaseSendMail $infoToMail): void
    {
        Mail::to($infoToMail->email)->send(
            new MailController(
                $infoToMail->data,
                $infoToMail->subject,
                $infoToMail->view
            )
        );
    }

    public function SendUserEmail(string $email, array | object $data, string $subject, string $view): void
    {
        $infoToMail = new BaseSendMail(
            $email,
            $data,
            $subject,
            $view
        );

        $this->sendMail($infoToMail);
    }
}
