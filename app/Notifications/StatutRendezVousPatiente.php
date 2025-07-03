<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StatutRendezVousPatiente extends Notification
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
        $statut = strtoupper($this->rendezvous->statut);
        $date = \Carbon\Carbon::parse($this->rendezvous->date_heure)->format('d/m/Y à H\hi');
        $medecin = $this->rendezvous->medecin->prenom . ' ' . $this->rendezvous->medecin->nom;

        return (new MailMessage)
            ->subject("📌 Mise à jour de votre rendez-vous sur MediCare")
            ->greeting("Bonjour {$notifiable->prenom}{$notifiable->nom},")
            ->line("Votre rendez-vous du **{$date}** avec **Dr. {$medecin}** a été **{$statut}**.")
            ->line($statut === 'CONFIRMÉ' ? "✅ Cela signifie que le médecin a validé le créneau choisi." : "❌ Le médecin a annulé ce rendez-vous. Nous vous invitons à en choisir un autre.")
            ->action('Voir mes rendez-vous', url('/patiente/rendez-vous'))
            ->salutation("Bien à vous,\n— L’équipe MediCare");
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
