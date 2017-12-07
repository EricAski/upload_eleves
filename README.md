# Programme de mise en ligne des fichiers étudiants

### Installation (Nécessite une connexion internet) :
 
* Installation de PHP : Tapez dans le terminal `sudo apt-get install php`pour installer PHP (nécessaire à la création du serveur local)
* Télécharchez le code source : placez vous dans le dossier de votre choix, faites un clic droit sur la fenêtre, cliquez sur `ouvrir dans un terminal` et tapez dans le terminal `wget https://github.com/EricAski/upload_eleves/archive/speit.zip -O serveur_local.zip; unzip serveur_local.zip` pour télécharger les fichiers sources et les décompresser dans le dossier actuel.

### Lancement (internet plus nécessaire) :
* Activez la connexion en mode "lien local uniquement" dans les "paramètres IPV4" Ubuntu (**Inutile s'il y a internet**).
* Dans un terminal tapez `hostname -I`. 
* Allez dans le dossier *upload_eleves-master*, faites un clic droit et cliquez sur `ouvrir dans un terminal`. Tapez ensuite `sudo php -S xxx.yyy.zzz.ttt:80 -t .` (**ne pas oublier le "." à la fin**) où `xxx.yyy.zzz.ttt` désigne l'ip notée plus tôt
* Rentrez le mot de passe administrateur si nécessaire
* Si vous voyez un message de la forme suivante c'est que le serveur s'est bien lancé, vous pouvez donner l'adresse ip aux étudiants (qui auront préalablement activé la connexion en lien local uniquement dans les paramètres IPV4) pour qu'ils puissent se connecter :  
 ```PHP 5.5.38 Development Server started at Wed Nov 22 23:45:31 2017
Listening on http://xxx.yyy.zzz.ttt:80
Document root is /aaa/bbb/serveur_local
Press Ctrl-C to quit. 
```

##### Si le serveur ne veut pas se lancer
* Vérifiez que vous avez rentré le bon mot de passe administrateur (et vérifiez que le clavier est bien en qwerty)
* Essyez avec l'IP affichée après avoir tapé `ip addr show`  (4 nombres après `inet` devrait commencer par **169.254.** ou **192.168.**)
* Redémarrez l'ordinateur et ré-essayez

### Fonctionnement

* Si des fichiers sont présents dans le dossier `fichiers` un lien s'affichera sur la page pour que les étudiants puissent les télécharger
* Les fichiers mis en ligne pas les étudiants apparaissent dans le dossier `upload_eleves-speit/uploads`, l'heure de mise en ligne est automatiquement ajoutée au nom du fichier
* Il est possible de voir l'adresse ip de la personne ayant mis en ligne les fichiers en allant sur `http://xxx.yyy.zzz.ttt/uploads/nom_de_l'élève`
* Les dernieres versions mises en ligne par les étudiants sont toutes disponibles dans le dossier `versionsfinales` sous la forme `nom_de_l'élève.extension`.

~

Eric Askinazi, Arnaud Robin, Geoffrey Boutard
