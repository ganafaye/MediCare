<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\RendezVous;

class ConfirmationAnnulationPatiente extends Notification
{
    use Queueable;

    public $rendezvous;

    public function __construct(RendezVous $rendezvous)
    {
        $this->rendezvous = $rendezvous;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $date = \Carbon\Carbon::parse($this->rendezvous->date_heure)->format('d/m/Y à H\hi');
        $medecin = 'Dr. ' . $this->rendezvous->medecin->prenom . ' ' . $this->rendezvous->medecin->nom;

        return (new MailMessage)
            ->subject('❌ Confirmation d’annulation de votre rendez-vous')
            ->greeting("Bonjour {$notifiable->prenom} {$notifiable->prenom},")
            ->line("Votre rendez-vous avec **{$medecin}** prévu le **{$date}** a bien été annulé.")
            ->line("📌 Motif initial : *{$this->rendezvous->motif}*")
            ->action('Voir mes rendez-vous', url('/dashboard_patiente'))
            ->salutation("Merci de votre confiance 💙\n— L’équipe MediCare");
    }
}
