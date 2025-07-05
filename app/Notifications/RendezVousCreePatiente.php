<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Eluceo\iCal\Domain\Entity\Event;
use Eluceo\iCal\Domain\Entity\Calendar;
use Eluceo\iCal\Domain\ValueObject\DateTime as ICalDateTime;
use Eluceo\iCal\Domain\ValueObject\TimeSpan;
use Eluceo\iCal\Domain\ValueObject\Location;
use Eluceo\iCal\Presentation\Factory\CalendarFactory;
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
    $start = new \DateTime($this->rendezvous->date_heure);
    $end = (clone $start)->modify('+30 minutes');

    $event = new Event();
    $event->setSummary('Rendez-vous MediCare');
    $event->setDescription('Consultation avec Dr. ' . $this->rendezvous->medecin->nom);
    $event->setLocation(new Location('Clinique MediCare')); // ✅ Objet Location requis
    $event->setOccurrence(new TimeSpan(
        new ICalDateTime($start, false), // ✅ Ajout du second argument requis
        new ICalDateTime($end, false)
    ));

    $calendar = new Calendar([$event]);
    $calendarFactory = new CalendarFactory();
    $icsContent = $calendarFactory->createCalendar($calendar);

    // Enregistre le fichier temporairement
    $icsPath = storage_path('app/public/rendezvous_' . $this->rendezvous->id . '.ics');
    file_put_contents($icsPath, $icsContent);

    return (new MailMessage)
        ->subject('📅 Votre rendez-vous a été enregistré')
        ->greeting("Bonjour {$notifiable->prenom},")
        ->line("Votre rendez-vous a bien été enregistré.")
        ->line("🗓️ Vous pouvez l’ajouter à votre calendrier en cliquant ci-dessous.")
        ->attach($icsPath, [
            'as' => 'rendezvous-medicare.ics',
            'mime' => 'text/calendar',
        ])
        ->action('Voir mes rendez-vous', url('/dashboard_patiente'))
        ->salutation("Merci de votre confiance 💙\n— L’équipe MediCare");
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
