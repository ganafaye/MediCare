<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BienvenueCreeeParAdmin extends Notification
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
            ->subject('👩‍⚕️ Votre profil MediCare a été créé')
            ->greeting("Bonjour {$notifiable->prenom},")
            ->line("🩺 Un membre de notre équipe MediCare vient de créer votre compte.")
            ->line("Vous pouvez dès maintenant accéder à votre espace santé personnel en ligne.")
            ->line("📅 Suivez vos rendez-vous, téléchargez vos documents, gérez votre dossier médical en toute simplicité.")
            ->action('Accéder à mon espace', url('/connexion'))
            ->salutation("À bientôt sur MediCare,\n— L’équipe MediCare 💙");
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
