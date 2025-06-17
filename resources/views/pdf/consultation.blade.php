<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Consultation - {{ $consultation->patiente->prenom }} {{ $consultation->patiente->nom }}</title>
    <style>
        body { font-family: 'Arial', sans-serif; font-size: 14px; color: #333; }
        .container { width: 90%; margin: auto; padding: 30px; border: 2px solid #fd0d99; border-radius: 15px; }
        .header { text-align: center; font-size: 22px; font-weight: bold; color: #fd0d99; }
        .logo { text-align: center; margin-bottom: 20px; }
        .logo img { width: 120px; }
        .separator { border-top: 2px solid #fd0d99; margin: 20px 0; }
        .consultation-info { margin-top: 20px; }
        .consultation-info p { margin: 10px 0; }
        .notes { background: #f9f9f9; padding: 10px; border-left: 5px solid #fd0d99; }
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
               Clinique MediCare - Consultation Médicale
        </div>

        <div class="separator"></div>

        <div class="consultation-info">
            <p><strong>Patient :</strong> {{ $consultation->patiente->prenom }} {{ $consultation->patiente->nom }}</p>
            <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($consultation->date_consultation)->format('d/m/Y') }}</p>
            <p><strong>Motif :</strong> {{ $consultation->motif }}</p>
            <p><strong>Diagnostic :</strong> {{ $consultation->diagnostic }}</p>
            <p><strong>Prescription :</strong> {{ $consultation->prescription }}</p>
            <p><strong>Poids :</strong> {{ $consultation->poids }} kg</p>
            <p><strong>Tension :</strong> {{ $consultation->tension }} mmHg</p>
            <p><strong>Nombre de grossesses :</strong> {{ $consultation->nombre_grossesses }}</p>
            <p><strong>Antécédents médicaux :</strong> {{ $consultation->antecedents }}</p>
            <p><strong>Médecin :</strong> Dr. {{ $consultation->medecin->nom }} ({{ $consultation->medecin->specialite }})</p>
        </div>

        <div class="separator"></div>

        <div class="notes">
            <p><strong>Instructions :</strong></p>
            <ul>
                <li>Suivre les recommandations du médecin concernant le traitement.</li>
                <li>Consulter en cas de symptômes persistants ou aggravation.</li>
                <li>Respecter les rendez-vous de suivi.</li>
            </ul>
        </div>

        <div class="separator"></div>

        <div class="footer">
            <p>📍 Adresse : Rue 10 Rufisque, Dakar, Sénégal</p>
            <p>📞 Téléphone : +221 77 596 01 69 | ✉️ Email : cliniqueMedicare@gmail.com</p>
            <p>🌐 Site Web : www.cliniquemedicare.sn</p>
        </div>

        <div class="signature">
            <p>Signature du médecin :</p>
            <p>__________________________</p>
            <p>Dr. {{ $consultation->medecin->nom }}</p>
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
