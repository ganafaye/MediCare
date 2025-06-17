<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;

class RendezVousNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $rendezVous;
    protected $type;

    public function __construct($rendezVous, $type)
    {
        $this->rendezVous = $rendezVous;
        $this->type = $type;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => "Votre rendez-vous du " . $this->rendezVous->date_heure . " a été " . $this->type . ".",
            'type' => $this->type,
            'date_heure' => $this->rendezVous->date_heure
        ];
    }
}
