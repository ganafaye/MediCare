<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ordonnance - {{ $ordonnance->patiente->prenom }} {{ $ordonnance->patiente->nom }}</title>
    <style>
        body { font-family: 'Arial', sans-serif; font-size: 14px; color: #333; }
        .container { width: 90%; margin: auto; padding: 30px; border: 2px solid #fd0d99; border-radius: 15px; }
        .header { text-align: center; font-size: 22px; font-weight: bold; color: #fd0d99; }
        .logo { text-align: center; margin-bottom: 20px; }
        .logo img { width: 120px; }
        .facture-info, .footer { margin-top: 20px; }
        .facture-info p, .footer p { margin: 10px 0; }
        .separator { border-top: 2px solid #fd0d99; margin: 20px 0; }
        .prescription { background: #f9f9f9; padding: 10px; border-left: 5px solid #fd0d99; }
        .signature { text-align: right; margin-top: 40px; }
        .footer { text-align: center; color: #888; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="{{ public_path('images/logo medicare.png') }}" alt="MediCare Logo">
        </div>
        <div class="header">
             Clinique MediCare - Ordonnance Médicale
        </div>

        <div class="separator"></div>

        <div class="facture-info">
            <p><strong>Patient :</strong> {{ $ordonnance->patiente->prenom }} {{ $ordonnance->patiente->nom }}</p>
            <p><strong>Date de prescription :</strong> {{ \Carbon\Carbon::parse($ordonnance->date_prescription)->format('d/m/Y') }}</p>
            <p><strong>Médecin :</strong> Dr. {{ $ordonnance->medecin->nom }} ({{ $ordonnance->medecin->specialite }})</p>
        </div>

        <div class="separator"></div>

        <div class="prescription">
            <p><strong>Prescription :</strong> {{ $ordonnance->contenu }}</p>
        </div>

        <div class="separator"></div>

        <div class="footer">
            <p><a> Adresse : Rue 10 Rufisque, Dakar, Sénégal</a></p>
            <p><a> Téléphone : +221 77 596 01 69 |  Email : cliniqueMedicare@gmail.com</a></p>
            <p><a> Site Web : www.cliniquemedicare.sn</a></p>
        </div>

        <div class="signature">
            <p>Signature du médecin :</p>
            <p>__________________________</p>
            <p>Dr. {{ $ordonnance->medecin->nom }}</p>
        </div>

        <div class="date" style="text-align: right; margin-top: 20px;">
            <p>Date : {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
        </div>

        <div class="footer">
            <p>&copy; 2025 Clinique MediCare. Tous droits réservés.</p>
            <p>Ce document est généré électroniquement et n'a pas besoin de signature physique.</p>
        </div>
    </div>
</body>
</html>
