<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BienvenuePatiente extends Notification
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
            ->subject('🎉 Bienvenue sur MediCare')
    ->greeting("👋 Bonjour {$notifiable->prenom},")
    ->line('')
    ->line("🩺 Merci de vous être inscrite sur **MediCare** — votre espace santé personnel.")
    ->line("📅 Vous pouvez désormais :")
    ->line("• Consulter vos rendez-vous\n• Télécharger vos ordonnances\n• Gérer votre dossier médical")
    ->line('')
    ->action('✨ Se connecter à MediCare', url('/connexion'))
    ->line('')
    ->salutation("Bien à vous,\n**L’équipe MediCare** 💙");
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
