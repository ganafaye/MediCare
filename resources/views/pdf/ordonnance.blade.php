<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ordonnance - {{ $ordonnance->patiente->prenom }} {{ $ordonnance->patiente->nom }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        .header { text-align: center; font-size: 18px; font-weight: bold; }
        .logo { text-align: center; margin-bottom: 20px; }
        .content { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="logo">
        <img src="{{ asset('image/logo medecin.png') }}" width="220" alt="MediCare">
    </div>
    <div class="header">Clinique MediCare - Ordonnance Médicale</div>
    <div class="content">
        <p><strong>Patient :</strong> {{ $ordonnance->patiente->prenom }} {{ $ordonnance->patiente->nom }}</p>
        <p><strong>Date de prescription :</strong> {{ \Carbon\Carbon::parse($ordonnance->date_prescription)->format('d/m/Y') }}</p>
        <p><strong>Prescription :</strong> {{ $ordonnance->contenu }}</p>
        <p><strong>Médecin :</strong> Dr. {{ $ordonnance->medecin->nom }} ({{ $ordonnance->medecin->specialite }})</p>
    </div>
    <div class="footer" style="margin-top: 40px; text-align: center; font-size: 12px;">
        <p>Adresse :  Rue 10 Rufisque , Darar, Sénégal</p>
        <p>Téléphone : +221 77 596 01 69</p>
        <p>Email :cliniqueMedicare.@gmail.com</p>
        <p>Site Web : www.cliniquemedicare.fr</p>
    </div>
    <div class="instructions" style="margin-top: 20px; font-style: italic;">
        <p>Instructions :</p>
        <ul>
            <li>Prendre les médicaments selon les indications du médecin.</li>
            <li>Consulter le médecin en cas d'effets secondaires ou de questions.</li>
            <li>Ne pas partager cette ordonnance avec d'autres personnes.</li>
        </ul>
    </div>
    <div class="note" style="margin-top: 20px; font-style: italic; text-align: center;">
        <p>Veuillez conserver cette ordonnance pour toute consultation future.</p>
    </div>
    <div class="signature" style="margin-top: 40px; text-align: right;">
        <p>Signature du médecin :</p>
        <p>__________________________</p>
        <p>Dr. {{ $ordonnance->medecin->nom }}</p>
    </div>
    <div class="date" style="text-align: right; margin-top: 20px;">
        <p>Date : {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
    </div>
    <div class="disclaimer" style="margin-top: 20px; font-size: 12px; text-align: center;">
        <p>Cette ordonnance est valable pour une durée de 3 mois à partir de la date de prescription.</p>
        <p>Veuillez consulter votre médecin pour toute question ou préoccupation concernant cette ordonnance.</p>
    </div>
    <div class="footer" style="margin-top: 40px; text-align: center; font-size: 12px; color: gray;">
        <p>&copy; 2025 Clinique MediCare. Tous droits réservés.</p>
        <p>Ce document est généré électroniquement et n'a pas besoin de signature physique.</p>
    </div>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
