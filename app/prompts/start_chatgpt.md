**Contexte :**  
Ce projet consiste à concevoir un prototype fonctionnel en utilisant le framework Laravel dans le cadre d'un apprentissage collaboratif. Il a pour but d'aider les apprenants à se familiariser avec les concepts fondamentaux et avancés de Laravel, tout en intégrant des outils et pratiques de gestion de code comme Git et la modularisation.

Le prototype agit comme un **exemple pratique** et un **guide pédagogique**, mettant en œuvre des concepts de développement collaboratif et structuré, adaptés à des projets complexes.


---

**Rôle :**  

Vous êtes un développeur Laravel avec 10 ans d'expérence et un chef de projet technique qui a un bon expérence dans le développement des application larg avec Laravel.


---

**Objectif :**  
Créer une application de **gestion de projets et de tâches** pour démontrer :  
- Les principes de conception modulaire avec Laravel.  
- Les concepts d'authentification et d'autorisation.  
- Une architecture scalable et maintenable pour des applications Laravel complexes.

---

**Fonctionnalités à valider avec le prototype :**  

1. **Authentification :**  
   Implémentation d'un système sécurisé de connexion utilisateur.  

2. **Autorisation :**  
   Contrôle des droits d'accès selon les rôles ou permissions définis.  

3. **Organisation d'une application Laravel avancée :**  
   - Structuration adaptée pour les projets de grande envergure.  
   - Séparation logique en modules.  

4. **Modularisation :**  
   Décomposer l'application en **modules indépendants** pouvant être maintenus et configurés séparément.  

5. **Gestion des projets et des tâches :**  
   - CRUD complet pour les projets.  
   - Gestion des tâches associées à un projet (sans suivi de leur réalisation).  

---

**Livrables :**  
1. Une **application prototype fonctionnelle** démontrant les fonctionnalités cibles.  
2. Un **modèle de données relationnel** intégrant des relations :  
   - **One-to-many** (par exemple, un projet contient plusieurs tâches).  
   - **Many-to-many** (par exemple, projets et tags).  

---

**Pédagogie :**  
Le prototype vise à :  
- Fournir une base pratique pour apprendre la conception d'applications complexes avec Laravel.  
- Aider les apprenants à comprendre la séparation des responsabilités et le travail collaboratif dans un environnement multi-développeurs.  

La structure de mon projet 

````md
- 📄 .env
- 📂 app
  - 📂 Exceptions
    - 📄 BusinessException.php
    - 📄 Handler.php
  - 📂 helpers
    - 📄 ModulesHelpers.php
    - 📄 TranslationHelper.php
  - 📂 Http
    - 📂 Controllers
      - 📄 AppBaseController.php
      - 📂 Auth
      - 📄 HomeController.php
    - 📄 Kernel.php
    - 📂 Middleware
  - 📂 Models
    - 📂 Autorisation
      - 📄 Permission.php
      - 📄 Role.php
      - 📄 RoleHasPermission.php
    - 📄 User.php
  - 📂 Providers
  - 📂 Repositories
    - 📄 BaseRepository.php
    - 📂 Contracts
      - 📄 RepositoryInterface.php
- 📄 artisan
- 📂 bootstrap
- 📂 config
- 📂 database
- 📂 lang
- 📂 modules
  - 📂 Core
    - 📂 Database
      - 📂 Seeders
        - 📄 CoreSeeder.php
    - 📂 App
      - 📂 Exceptions
        - 📄 .gitkeep
      - 📂 Exports
        - 📄 .gitkeep
      - 📂 Imports
        - 📄 .gitkeep
      - 📂 Providers
        - 📄 .gitkeep
    - 📂 Controllers
      - 📄 .gitkeep
    - 📂 Database
      - 📂 data
        - 📄 .gitkeep
      - 📂 Factories
        - 📄 .gitkeep
      - 📂 Migrations
        - 📄 .gitkeep
      - 📂 Seeders
        - 📄 .gitkeep
        - 📄 PkgBlogSeeder.php
    - 📂 Models
      - 📄 .gitkeep
    - 📂 Repositories
      - 📄 .gitkeep
    - 📂 resources
      - 📂 assets
        - 📄 .gitkeep
      - 📂 lang
        - 📄 .gitkeep
        - 📂 fr
          - 📄 .gitkeep
      - 📂 views
        - 📄 .gitkeep
    - 📂 Routes
      - 📄 .gitkeep
  - 📂 PkgProjets
    - 📂 App
      - 📂 Config
        - 📄 pkg_articles.php
      - 📂 Exceptions
        - 📄 ProjectAlreadyExistException.php
        - 📄 TagAlreadyExistException.php
      - 📂 Exports
        - 📄 ProjetExport.php
      - 📂 Imports
        - 📄 ProjetImport.php
      - 📂 Providers
        - 📄 PkgProjetsServiceProvider.php
      - 📂 Requests
        - 📄 projetRequest.php
        - 📄 tagRequest.php
        - 📄 TaskRequest.php
    - 📂 Controllers
      - 📄 Projet2Controller.php
      - 📄 ProjetController.php
      - 📄 TagController.php
      - 📄 TaskController.php
    - 📂 Database
      - 📂 data
        - 📄 projets.csv
        - 📄 tags.csv
      - 📂 Factories
        - 📄 ProjetFactory.php
      - 📂 Migrations
        - 📄 2024_02_27_112723_projets.php
        - 📄 2024_02_27_112723_tags.php
        - 📄 2024_03_06_083009_taches_table.php
        - 📄 2024_04_06_144547_create_tags_projets_table.php
      - 📂 Seeders
        - 📄 PkgProjetsSeeder.php
        - 📄 ProjetsSeeder.php
        - 📄 TachesSeeder.php
        - 📄 TagsSeeder.php
    - 📂 Models
      - 📄 Projet.php
      - 📄 ProjetTag.php
      - 📄 Tag.php
      - 📄 Task.php
    - 📂 Repositories
      - 📄 ProjetRepository.php
      - 📄 TagRepository.php
      - 📄 TaskRepository.php
    - 📂 resources
      - 📂 assets
      - 📂 lang
        - 📂 ar
          - 📂 projet
            - 📄 message.php
            - 📄 validation.php
          - 📂 task
            - 📄 message.php
        - 📂 fr
          - 📄 message.php
          - 📄 projet.php
          - 📄 tache.php
          - 📄 tag.php
      - 📂 views
        - 📂 layouts
          - 📄 menu.blade.php
        - 📂 projet
          - 📄 create.blade.php
          - 📄 edit.blade.php
          - 📄 fields.blade.php
          - 📄 index.blade.php
          - 📄 show.blade.php
          - 📄 table.blade.php
        - 📂 tag
          - 📄 create.blade.php
          - 📄 edit.blade.php
          - 📄 fields.blade.php
          - 📄 index.blade.php
          - 📄 show.blade.php
          - 📄 table.blade.php
          - 📄 create.blade.php
          - 📄 edit.blade.php
          - 📄 fields.blade.php
          - 📄 index.blade.php
          - 📄 show.blade.php
          - 📄 table.blade.php
    - 📂 Routes
      - 📄 ProjetRoute.php
      - 📄 TagRoute.php
      - 📄 web.php

````

**Tavail à faire :**  

Ne me réponde pas , attend la question


