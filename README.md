# 🏥 MediCare – Plateforme médicale spécialisée en gynécologie obstétrique

MediCare est une application web développée avec Laravel, dédiée à la gestion du parcours médical des patientes en clinique gynéco-obstétrique.  
Elle facilite le **suivi des grossesses**, la **prise de rendez-vous**, la **gestion documentaire** et l’**interaction avec les professionnels de santé**.

---

## ✨ Fonctionnalités principales

- 📋 **Suivi médical** : Dossiers patientes, consultations, échographies, ordonnances
- 📅 **Prise de rendez-vous en ligne** avec rappels
- 💬 **ChatBot intelligent** (BotMan) pour aider les patientes
- 🖼️ **Échographies téléversables** par les médecins
- 📊 **Tableaux de bord dynamiques** (Chart.js & Apache ECharts)
- 👥 **Multi-rôles** : Médecin, Patiente, Secrétaire, Administrateur
- 📱 **Interface responsive** adaptée à tous les écrans

---

## 🚀 Technologies utilisées

| Technologie        | Usage                                           |
|--------------------|------------------------------------------------|
| Laravel            | Framework backend (MVC, API, sécurité)         |
| Bootstrap / Tailwind CSS | Design UI, responsivité, composants modernes |
| JavaScript / AJAX  | Dynamisme et interactivité                     |
| Chart.js / Apache ECharts | Statistiques médicales dynamiques        |
| FullCalendar.js    | Calendrier interactif                          |
| html2canvas        | Capture de vues et génération d’images         |
| dompdf             | Génération de PDF (ordonnances, factures)      |
| eluceo/ical        | Export d’agendas en format iCal                |
| DBeaver            | Administration de base de données              |
| XAMPP / MySQL      | Serveur local / SGBD                           |

---

## 📂 Structure des fichiers

```text
app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/
│   │   ├── Medecin/
│   │   ├── Secretaire/
│   │   └── Patiente/
├── Models/

resources/
├── views/
│   ├── espace_admin/
│   ├── espace_medecin/
│   ├── espace_secretaire/
│   └── espace_patiente/

public/
├── build/               # Fichiers CSS et JS générés par Vite
├── storage/             # Fichiers partagés (PDF, images…)

routes/
├── web.php              # Routes principales
````

---

## 📸 Captures d’écran

> ⚠️ N’oublie pas d’ajouter les images dans `/screenshots/` ou via GitHub.

### Tableau de bord médecin

![Dashboard médecin](https://raw.githubusercontent.com/ganafaye/MediCare/main/screenshots/dashboard-medecin.png)

### Suivi de grossesse

![Suivi grossesse](https://raw.githubusercontent.com/ganafaye/MediCare/main/screenshots/suivi-grossesse.png)

### Prise de rendez-vous

![Rendez-vous](https://raw.githubusercontent.com/ganafaye/MediCare/main/screenshots/prise-rdv.png)

### Interface secrétaire

![Secretaire](https://raw.githubusercontent.com/ganafaye/MediCare/main/screenshots/dashboard-secretaire.png)

---

## 🔐 Gestion des accès

* Authentification personnalisée via **guards** Laravel (`patiente`, `medecin`, `admin`, `secretaire`)
* Middleware pour chaque rôle
* Redirection automatique selon profil

---

## 📥 Hébergement et déploiement

L’application est hébergée sur [Byethost](https://byethost.com), avec configuration spéciale pour les fichiers `build` et `storage`.  

⚠️ Attention :

* Le contenu du dossier `build/` doit être généré avec `npm run build` puis copié dans `public/`
* Les fichiers partagés (images échographies, PDF) doivent être placés dans `public/storage/`
* Activez les permissions pour `storage/` dans `.htaccess`

---

## 🧪 Installation locale

```bash
git clone https://github.com/ganafaye/MediCare.git
cd MediCare

composer install
npm install

cp .env.example .env
php artisan key:generate

npm run build
php artisan migrate
php artisan serve
```

---

## ✅ État d'avancement

* ✅ Analyse des besoins
* ✅ Modélisation UML
* ✅ Architecture MVC
* ✅ Auth multi-rôles
* ✅ Upload / gestion des fichiers
* ✅ Intégration Chart.js, BotMan, FullCalendar

---

## 🧠 Auteurs

* **Gana Faye** — [@ganafaye](https://github.com/ganafaye)
* Encadreur : *Mr. MaFaye Diaw*

---
🔗 **Démo en ligne** : [https://medicare.byethost5.com](https://medicare.byethost5.com)
## 📜 Licence

Projet académique — Licence libre non commerciale.

---

```

---

Souhaite-tu que je **crée le fichier prêt à être copié-collé ou téléchargé** ?  
Et veux-tu que je t’aide à **uploader les captures dans le dépôt et corriger les liens d’image** ?
```
