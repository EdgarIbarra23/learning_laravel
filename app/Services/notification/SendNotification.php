<?php

namespace App\Services\notification;

use App\Events\NotificationEvent;
use App\Notifications\Notification as Notifications;
use App\Repositories\user\UserRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification as NotificationFacades;

class SendNotification
{
    public function __construct(
        private readonly UserRepository $userRepository
    ) {}

    public function notification(array $data, int $id): void
    {
        $user = $this->userRepository->getById($id);

        NotificationFacades::send(
            $user,
            new Notifications(
                $data,
                $id
            )
        );
        broadcast(new NotificationEvent($data, $id));
    }
}
