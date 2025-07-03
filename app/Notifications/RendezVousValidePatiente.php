<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;

class RendezVousValidePatiente extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
   public $rendezvous;

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
        $rdv = $this->rendezvous;
        $date = Carbon::parse($rdv->date_heure)->format('d/m/Y à H\hi');
        $medecin = $rdv->medecin->prenom . ' ' . $rdv->medecin->nom;

        return (new MailMessage)
            ->subject('✅ Rendez-vous confirmé sur MediCare')
            ->greeting("Bonjour {$notifiable->prenom},")
            ->line("Votre rendez-vous du **{$date}** avec **Dr. {$medecin}** a été **confirmé**.")
            ->line("Merci de vous présenter quelques minutes en avance à la clinique.")
            ->action('Consulter mes rendez-vous', url('/patiente/rendez-vous'))
            ->salutation("À bientôt sur MediCare 💙
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
