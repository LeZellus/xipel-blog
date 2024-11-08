# 1er Blog de Matheo Zeller (avec font Pixel Art)
Je suis Mathéo Zeller, un jeune développeur en formation. Retrouvez ici mon blog qui à été développé avec PHP depuis un modèle MVC.
Aucune technologie extérieure à été utilisée.

## Installation

Clonez le projet avec cette URL : 
```bash
git clone git@github.com:LeZellus/xipel-blog.git
```
Puis lancez composer :
```bash
composer install
```

Une fois ceci fais, récupérez le fichier DB.sql à la racine du projet et importez le dans votre manager de base de données

Puis allez dans config -> `dev.php`

Remplacez les valeurs par les votre pour permettre la connexion à la base de données.

## Paramétrage Mails

Rendez-vous dans le fichier ``src/controller/frontController.php`` et éditez les valeurs du SMTP pour ajouter le votre afin de faire fonctionner l'envoi des mails.
```php
$mail->Host       = '';                                     //Set the SMTP server to send through
$mail->Username   = '';                                     //SMTP username
$mail->Password   = '';                                     //SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
$mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
```

## Comptes de connexion

### Admin

-   Nom d'utilisateur : Admin
-   Email : admin@exemple.fr
-   Mot de passe : Admin12$

### Visiteur

-   Nom d'utilisateur : Visiteur
-   Email : visiteur@exemple.fr
-   Mot de passe : Visiteur12$

Le site est désormais prêt, vous pouvez naviguer dessus.
