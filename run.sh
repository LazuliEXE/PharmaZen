#!/bin/bash

echo "Installation des dépendances PHP..."
composer install

echo "Création de la base de données..."
php bin/console doctrine:database:create

echo "Exécution des migrations..."
php bin/console doctrine:migrations:migrate --no-interaction

echo "Chargement des fixtures..."
php bin/console doctrine:fixtures:load --no-interaction

echo "✅ Installation terminée."
