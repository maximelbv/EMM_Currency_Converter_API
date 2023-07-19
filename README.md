![banner](./docs/media/banner.png)

## Prérequis

## Installation

À la racine du projet :

```
docker-compose up -d
```

## Cahier des charges

### Analyse client

MoneyValue est une jeune entreprise en développement, opérant dans la finance. Du fait de la constante evolution du milieu, la mise en place de systèmes internes et modulaires est devenue une norme pour les entreprises de la fintech, ce qui motive la création de ce projet: une plateforme fiable, interne et sécurisée sur la quelle pourront s'appuyer les différentes applications de l'entreprise.

### Choix technologiques

Pour le développement de ce projet, la décision a été prise de se baser sur les technologies [Vue.js](https://vuejs.org/) pour la partie client, et [Laravel](https://laravel.com/) pour la partie API.

- **Vue JS**

  - **_Popularité et maintenance :_**
    Vue.js, est un framework JavaScript open-source utilisé pour construire des interfaces utilisateur et des applications web monopages. Grâce à sa communauté toujours plus active, Vue.js s'est fortement développé jusqu'à devenir une technologie de choix autant pour les petit projets que pour les projets de taille. D'après le [2023 Stackoverflow Survey](https://survey.stackoverflow.co/2023/#technology-most-popular-technologies) Vue JS se situe à la 8eme place des frameworks web et à la 5eme place des frameworks côté client.

  - **_Facilité d'utilisation et modularité :_**
    L'approche progressive de Vue JS permet de l'adopter progressivement dans des projets existants sans avoir à tout reconstruire. Avec une syntaxe simple et concise, il est facile de comprendre et de travailler avec. De plus, il possède un écosystème riche de modules officiels et de bibliothèques tierces.

  - **_Réactivité et performance_** : Grâce à son approche basée sur la réactivité, il facilite la création d'expériences utilisateur dynamiques, où les changements de données sont automatiquement reflétés dans l'interface sans avoir besoin de recharger la page.

- **Laravel**

  - **_Framework PHP populaire_** : Laravel est l'un des frameworks PHP les plus populaires et les plus utilisés de nos jours. Il dispose d'une vaste communauté de développeurs actifs, ce qui facilite la recherche de ressources, d'extensions et de support en cas de besoin.

  - **_Architecture MVC_** : Laravel suit le pattern de conception MVC (Modèle-Vue-Contrôleur), ce qui permet une séparation claire des responsabilités et une meilleure organisation du code. Cela facilite la maintenance, l'extensibilité et la réutilisabilité du code, ce qui est essentiel pour un projet à long terme comme celui-ci.

  - **_ORM puissant_** : Laravel intègre Eloquent, un ORM (Object-Relational Mapping) puissant qui simplifie l'interaction avec la base de données. Cela permet de manipuler les données et les requêtes de manière plus intuitive et plus expressive, sans avoir à écrire de requêtes SQL complexes.

  - **_Sécurité_** : Dans le domaine de la finance, la sécurité des données est primordiale. Laravel offre de nombreuses fonctionnalités de sécurité intégrées telles que le hachage de mots de passe, la protection CSRF (Cross-Site Request Forgery), la protection XSS (Cross-Site Scripting), etc. Il facilite également la mise en œuvre d'authentification et d'autorisation robustes pour contrôler l'accès aux ressources sensibles.

  - **_Routage et gestion des requêtes_** : Laravel propose un système de routage simple et puissant, qui permet de définir facilement les points d'entrée de l'API et de gérer les différentes requêtes HTTP (GET, POST, PUT, DELETE, etc.). Il offre également une prise en charge native de la pagination, ce qui est utile lorsque l'API doit gérer de grandes quantités de données.

  - **_Documentation complète_** : Laravel dispose d'une documentation complète et détaillée, ce qui facilite l'apprentissage et la compréhension du framework. La documentation fournit des exemples pratiques, des guides et des explications claires sur les fonctionnalités du framework, ce qui est précieux pour développer rapidement et efficacement l'API.

### Evaluation du temps de travail

Faites un petit tableau avec comme entrée chaque grand poste de développement, et comme
sortie le nombre de jour de travail (1 journée = 7 heures)

### Liste fonctionnelle

Listez de manière exhaustive les fonctionnalités à développer (administration et API)
Recettage
Faites un tableau avec comme entrée la liste fonctionnelle, et comme sortie si la fonctionnalité
est opérationnelle ou non opérationnelle (ou possède un bug, une limitation ...)

### Diagramme de la base de données

![Data schema](./docs/media/data_schema.png)

### Documentation de l’API

Rédigez de manière succincte :

1. les différentes URL de l’API REST (avec le verbe HTTP)
2. Leur fonctionnalité
3. Les données retournées
4. Les message d’erreur possible
   Adresse Github
   L’adresse Github du projet (administration et API)

### Wireframe de la partie front de l’administration

Les images des wireframes de la partie administration
