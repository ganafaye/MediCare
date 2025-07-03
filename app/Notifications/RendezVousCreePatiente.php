<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RendezVousCreePatiente extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
     public $rendezvous; // ✅ ajoute cette ligne

    public function __construct($rendezvous)
    {
        $this->rendezvous = $rendezvous;
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
        $date = \Carbon\Carbon::parse($this->rendezvous->date_heure)->format('d/m/Y à H\hi');
        $medecin = $this->rendezvous->medecin->prenom . ' ' . $this->rendezvous->medecin->nom;

        return (new MailMessage)
            ->subject('📅 Votre rendez-vous MediCare est enregistré')
            ->greeting("Bonjour {$notifiable->prenom} {$notifiable->nom},")
            ->line("Votre demande de rendez-vous a été enregistrée avec succès.")
            ->line("🗓️ Date et heure : **{$date}**")
            ->line("👨‍⚕️ Médecin : **Dr. {$medecin}**")
            ->line("⏳ Statut actuel : *En attente de confirmation*")
            ->action('Voir mes rendez-vous', url('/patiente/rendez-vous'))
            ->salutation("Merci pour votre confiance 💙
— L’équipe MediCare");
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
