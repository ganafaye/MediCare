<!-- filepath: c:\Users\Awad\Desktop\Projet soutenance\App_MediCare\medicare\resources\views\espace_patiente\rendezVous.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes rendez-vous - MediCare</title>
    @vite('resources/css/app.css')
    <link rel="icon" type="image/png" href="{{ asset('image/logo medecin.png') }}">
</head>
<body style="background: #f8fafc; min-height:100vh;">
<div class="container py-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-3 mb-md-0" style="color:#fd0d99;">
            <i class="bi bi-calendar-check me-2"></i>Mes rendez-vous
        </h2>
        <a href="#" class="btn btn-pink rounded-pill" data-bs-toggle="modal" data-bs-target="#modalRdv">
            <i class="bi bi-plus-lg me-1"></i>Prendre un rendez-vous
        </a>
    </div>

    <div class="card shadow border-0 rounded-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0 table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Médecin</th>
                            <th>Motif</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Exemple statique, à remplacer par une boucle dynamique -->
                        <tr>
                            <td>12/06/2025</td>
                            <td>09:00</td>
                            <td>Dr. Faye</td>
                            <td>Consultation prénatale</td>
                            <td><span class="badge bg-success">Confirmé</span></td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary rounded-pill"><i class="bi bi-eye"></i></button>
                                <button class="btn btn-sm btn-outline-danger rounded-pill"><i class="bi bi-x"></i></button>
                            </td>
                        </tr>
                        <!-- ... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Prendre un rendez-vous -->
<div class="modal fade" id="modalRdv" tabindex="-1" aria-labelledby="modalRdvLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title" id="modalRdvLabel">Prendre un rendez-vous</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" required>
          </div>
          <div class="mb-3">
            <label for="heure" class="form-label">Heure</label>
            <input type="time" class="form-control" id="heure" required>
          </div>
          <div class="mb-3">
            <label for="medecin" class="form-label">Médecin</label>
            <select class="form-select" id="medecin" required>
              <option value="">Choisir...</option>
              <option>Dr. Faye</option>
              <option>Dr. Diop</option>
              <!-- ... -->
            </select>
          </div>
          <div class="mb-3">
            <label for="motif" class="form-label">Motif</label>
            <input type="text" class="form-control" id="motif" required>
          </div>
          <button type="submit" class="btn btn-pink rounded-pill w-100">Valider</button>
        </form>
      </div>
    </div>
  </div>
</div>

@vite('resources/js/app.js')
</body>
</html>
