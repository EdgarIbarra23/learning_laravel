<?php

namespace App\Services\mail;

class BaseSendMail
{
    public function __construct(
        public string $email,
        public array | object $data,
        public string $subject,
        public string $view,
    ){}
}
