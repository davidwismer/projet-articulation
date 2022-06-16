# projet-articulation
Web app d'horaire pour le projet d'articulation de 2eme année COMEM (Wakanda)

# Manuel d’installation
Le manuel d’utilisation est valable pour l’installation sur  le  serveur.

Prérequis :
- PHP 8.1
- Vue 3.2
- Node.js v16
- Npm 8.3
- Composer 2.2

Déploiement :
- Adapter les variables d’environnement afin que celles-ci correspondent aux données de connexion sur le serveur. 
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wakanda
DB_USERNAME=wakanda
DB_PASSWORD= *Password de la bd*
- Importer le projet sur le serveur pingouin par le biais de Cyberduck / FileZilla
- Effectuer les commandes php artisan migrate et php artisan db:seed afin de créer les tables et les peupler. 
- Effectuer les commandes composer install et npm install
- Cliquer sur le lien https://wakanda-pingouin.heig-vd.ch/ et observer le projet.
- Pour se connecter, les identifiants/mots de passe fictifs suivants sont libre d’utilisation pour démo : 
Direction : direction@heig-vd.ch / *direction*
Etudiant : eleve@heig-vd.ch / *eleve*
Enseignant : prof@heig-vd.ch / *prof*
