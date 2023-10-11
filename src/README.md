# Récupération du projet 

1. utilisez la version PHP "8.1.0"
2. Créer un projet symfony 
3. Récupérer le projet existant sur git avec la commande Git Clone 
4. Créer un .env pour l'adapter au besoin
5. Créer une base de donnée avec la commande php bin/console doctrine:database:create
6. Migrer la base => php bin/console make:migration
7. Confirmer la migration => php bin/console doctrine:migrations:migrate
8. Créer les fixtures pour alimenter la base de donnée => php bin/console doctrine:fixtures:load
