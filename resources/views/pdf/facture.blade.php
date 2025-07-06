<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture #{{ $facture->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        .container { width: 90%; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px; }
        .header { text-align: center; font-size: 22px; font-weight: bold; color: #fd0d99; }
        .logo { text-align: center; margin-bottom: 20px; }
        .logo img { width: 120px; }
        .facture-info, .footer { margin-top: 20px; }
        .facture-info p, .footer p { margin: 10px 0; }
        .total { font-size: 18px; font-weight: bold; color: #fd0d99; text-align: right; }
        .separator { border-top: 2px solid #fd0d99; margin: 20px 0; }
        .footer { text-align: center; color: #888; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="{{ public_path('images/logo-medicare.png') }}" alt="MediCare Logo">
        </div>
        <div class="header">
              Facture #{{ $facture->id }}
        </div>
        <div class="separator"></div>
        <div class="facture-info">
            <p><strong>Numéro de Facture :</strong> {{ $facture->id }}</p>
            <p><strong>Date d'Émission :</strong> {{ \Carbon\Carbon::parse($facture->created_at)->format('d/m/Y H:i') }}</p>
            <p><strong>Statut :</strong> {{ $facture->statu }}</p>
        </div>
        <div class="separator"></div>
        <div class="header">
             Détails de la Facture
        </div>

        <div class="facture-info">
            <p><strong>Patiente :</strong> {{ $facture->patiente->prenom }} {{ $facture->patiente->nom }}</p>
            <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($facture->created_at)->format('d/m/Y') }}</p>
            <p><strong>Type :</strong> {{ $facture->type_facture }}</p>
            <p class="total"><strong>Montant :</strong> {{ number_format($facture->montant, 2, ',', ' ') }} FCFA</p>
        </div>


        <div class="separator"></div>
        <div class="footer">
            <p>Merci d'avoir choisi MediCare. <br> Votre santé, notre priorité.</p>
            <p>Pour toute question, contactez-nous à <a href="#"> Téléphone : +221 77 596 01 69 |  Email : cliniqueMedicare@gmail.com </a>
        </div>
    </div>
</body>
</html>
