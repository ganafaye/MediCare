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


### Tableau de bord médecin

<img width="1910" height="1961" alt="FireShot Capture 025 - Dashboard -Dr  Gana Faye - MediCare medecin -  127 0 0 1" src="https://github.com/user-attachments/assets/bdb69e90-2fa3-4a18-b703-a1580f5c4e98" />


### Tableau de bord patiente 

![Capture d’écran_5-7-2025_101424_127 0 0 1](https://github.com/user-attachments/assets/512c3bb9-b55c-4197-9ef2-b17bf08cc269)

### Prise de rendez-vous par la patiente

<img width="1910" height="1559" alt="FireShot Capture 016 - Dashboard Patiente- Gana Faye - MediCare rendez vous -  127 0 0 1" src="https://github.com/user-attachments/assets/d72ae3cd-b550-4d89-abe3-b648ab40fbc1" />
<img width="839" height="678" alt="FireShot Capture 017 - Dashboard Patiente- Gana Faye - MediCare prise de rendez vous -  127 0 0 1" src="https://github.com/user-attachments/assets/f9ecdd30-504c-4c93-84c0-3da0006f1975" />


### Gestion des documents par la patiente

<img width="1910" height="1559" alt="FireShot Capture 019 - Dashboard Patiente- Gana Faye - MediCare -liste des documents  127 0 0 1" src="https://github.com/user-attachments/assets/80c9f6a1-7324-47c6-9f2a-eefb255fbbc8" />


### Suivi grossesse par la patiente 

<img width="1750" height="3389" alt="FireShot Capture 048 - Suivi de grossesse - MediCare -  127 0 0 1" src="https://github.com/user-attachments/assets/fcf10cd3-dce7-4738-97ac-71dfb6fc97ef" />



### Interface secrétaire

<img width="1910" height="1627" alt="FireShot Capture 041 - Dashboard Sec - gana faye - MediCare -  127 0 0 1 " src="https://github.com/user-attachments/assets/5aa3de2c-74df-4859-949f-87721df893c8" />

### Interface secrétaire gestion rendez vous 

<img width="1910" height="1627" alt="FireShot Capture 042 - Dashboard Sec - gana faye - MediCare -  127 0 0 1" src="https://github.com/user-attachments/assets/0b7bc776-9809-4111-8435-16a1d3bbb8be" />

<img width="1910" height="1627" alt="FireShot Capture 043 - Dashboard Sec - gana faye - MediCare -  127 0 0 1" src="https://github.com/user-attachments/assets/677d0af2-1494-4188-ac3f-835fd6221ecc" />

### Interface secrétaire gestion facture du clinique 

<img width="1910" height="1627" alt="FireShot Capture 047 - Dashboard Sec - gana faye - MediCare -  127 0 0 1" src="https://github.com/user-attachments/assets/035abd80-b200-4bb2-b779-7cf411689d69" />


### Interface admin

<img width="1910" height="2399" alt="FireShot Capture 034 - Dashboard - Admin - MediCare -  127 0 0 1" src="https://github.com/user-attachments/assets/0252f0db-62f7-44e0-99c4-ddb5daee7fa9" />

### Interface sadmin gestion des users  

<img width="1910" height="2396" alt="FireShot Capture 035 - Dashboard - Admin - MediCare gestion patiente -  127 0 0 1" src="https://github.com/user-attachments/assets/e4dabb36-21e5-4f3c-9106-f9904e9285f6" />

<img width="1910" height="2396" alt="FireShot Capture 038 - Dashboard - Admin - MediCare -  127 0 0 1  medecin gestion" src="https://github.com/user-attachments/assets/bd69ad27-7e10-4a85-90a8-ce8ddd568d61" />

<img width="1910" height="2396" alt="FireShot Capture 040 - Dashboard - Admin - MediCare -  127 0 0 1  secretaire" src="https://github.com/user-attachments/assets/711185fe-1b4f-4c9d-8023-0eaa96054c19" />

### Interface admin gestion des rendez vous par l'admin

![Capture d’écran_5-7-2025_15562_127 0 0 1](https://github.com/user-attachments/assets/7e4c213c-634b-4166-bbc0-0e8b559b1122)


### Exemple de discussion avec ChatBot

![Capture d’écran_5-7-2025_15322_127 0 0 1](https://github.com/user-attachments/assets/84d38c39-77d4-48f2-930c-1d34b5038f5f)


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
