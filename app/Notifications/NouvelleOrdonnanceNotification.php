<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NouvelleOrdonnanceNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public $ordonnance) {}

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Nouvelle ordonnance disponible')
            ->greeting('Bonjour ' . $notifiable->prenom)
            ->line('Une nouvelle ordonnance a été ajoutée à votre dossier.')
            ->line('Date : ' . $this->ordonnance->date_prescription->format('d/m/Y'))
            ->line('Merci d’utiliser MediCare.');
    }
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
