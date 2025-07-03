<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CompteSupprimePatiente extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('🗂️ Compte MediCare supprimé')
            ->greeting("Bonjour {$notifiable->prenom} {$notifiable->nom},")
            ->line("Nous vous informons que votre compte MediCare a été désactivé par un administrateur.")
            ->line("Si vous pensez qu’il s’agit d’une erreur ou que vous souhaitez obtenir une copie de vos documents médicaux, vous pouvez nous contacter.")
            ->action('Contacter le support', url('/contact'))
            ->salutation("Bien à vous,
— L’équipe MediCare 🩺");
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
