<!-- filepath: c:\Users\Awad\Desktop\Projet soutenance\App_MediCare\medicare\resources\views\espace_patiente\mes_document.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes documents - MediCare</title>
    @vite('resources/css/app.css')
    <link rel="icon" type="image/png" href="{{ asset('image/logo medecin.png') }}">
</head>
<body style="background: #f8fafc; min-height:100vh;">
<div class="container py-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-3 mb-md-0" style="color:#fd0d99;">
            <i class="bi bi-folder2-open me-2"></i>Mes documents
        </h2>
    </div>

    <div class="card shadow border-0 rounded-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0 table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Fichier</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Exemple statique, à remplacer par une boucle dynamique -->
                        <tr>
                            <td>12/06/2025</td>
                            <td>Ordonnance</td>
                            <td>Prescription suite à consultation</td>
                            <td>
                                <span class="badge bg-secondary">ordonnance_120625.pdf</span>
                            </td>
                            <td>
                                <a href="#" class="btn btn-outline-primary btn-sm rounded-pill">
                                    <i class="bi bi-file-earmark-arrow-down"></i> Télécharger
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>10/06/2025</td>
                            <td>Résultat analyse</td>
                            <td>Analyse sanguine</td>
                            <td>
                                <span class="badge bg-secondary">analyse_100625.pdf</span>
                            </td>
                            <td>
                                <a href="#" class="btn btn-outline-primary btn-sm rounded-pill">
                                    <i class="bi bi-file-earmark-arrow-down"></i> Télécharger
                                </a>
                            </td>
                        </tr>
                        <!-- ... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@vite('resources/js/app.js')
</body>
</html>
