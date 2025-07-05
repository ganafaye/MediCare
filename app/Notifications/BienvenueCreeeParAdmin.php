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
   protected $motDePasse;

public function __construct($motDePasse)
{
    $this->motDePasse = $motDePasse;
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
            ->greeting("Bonjour {$notifiable->prenom} {$notifiable->nom},")
            ->line("🩺 Un membre de notre équipe MediCare vient de créer votre compte.")
            ->line("Vous pouvez dès maintenant accéder à votre espace santé personnel en ligne.")
            ->line("Voici vos identifiants de connexion :")
            ->line("📧 Email : **{$notifiable->email}**")
            ->line("🔑 Mot de passe temporaire : **{$this->motDePasse}**")
            ->line("⚠️ Pensez à le modifier dès votre première connexion.")
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
