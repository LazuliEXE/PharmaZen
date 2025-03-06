# PharmaZen

## 🏥 Présentation du projet
PharmaZen est une application web développée dans le cadre du BTS SIO option SLAM. Ce projet a pour objectif de fournir une solution simple et efficace aux pharmaciens pour :
- Rechercher rapidement des produits de santé.
- Gérer les transactions (ventes, achats).
- Afficher et consulter les articles liés aux produits médicaux.

Ce projet est purement académique et ne vise pas une mise en production réelle.

---

## 🚀 Technologies utilisées
- **Symfony** : Framework PHP pour la structure du site.
- **Bootstrap** : Pour le design responsive et moderne de l'interface.
- **MySQL** : Base de données pour la gestion des produits, transactions et utilisateurs.
- **Git & GitHub** : Suivi du versionnement et hébergement du code.

---

## ⚙️ Installation et configuration

### Prérequis
Avant de commencer, assurez-vous d'avoir les outils suivants installés sur votre machine :
- PHP 8.1 ou plus récent
- Composer
- Symfony CLI
- MySQL
- Node.js et NPM (pour gérer les assets avec Webpack Encore)
- Git

### Étapes d'installation

1. **Cloner le projet**
```bash
git clone https://github.com/ton-profil/pharmazen.git
cd pharmazen
```

2. **Installer les dépendances PHP**
```bash
composer install
```

3. **Configurer les variables d'environnement**
Copiez le fichier `.env` et configurez votre base de données MySQL :
```bash
cp .env .env.local
```
Dans le fichier `.env.local`, modifiez la ligne suivante avec vos informations :
```
DATABASE_URL="mysql://root:password@127.0.0.1:3306/pharmazen"
```

4. **Créer la base de données**
```bash
symfony console doctrine:database:create
symfony console doctrine:migrations:migrate
```

5. **Installer les dépendances frontend**
```bash
npm install
```

6. **Lancer le serveur Symfony**
```bash
symfony serve
```
Le projet sera accessible par défaut à l'adresse : [http://localhost:8000](http://localhost:8000)

---

## 🗃️ Fonctionnalités principales

- **Recherche de produits** : Trouver rapidement un produit à partir de son nom, sa catégorie, ou sa référence.
- **Gestion des transactions** : Enregistrer une vente et suivre l'historique des transactions.
- **Affichage des articles de santé** : Présenter les informations détaillées de chaque produit médical.

---

## 🧪 Données de démonstration
Un jeu de données fictif a été intégré pour tester le bon fonctionnement des fonctionnalités (produits, utilisateurs, transactions). Ce jeu de données est automatiquement chargé lors de l'exécution des migrations.

---

## 📁 Structure du projet

- **src/Entity** : Contient les entités (Produit, Transaction, Utilisateur).
- **src/Controller** : Gestion des routes et des actions.
- **templates/** : Fichiers Twig pour le rendu des vues.
- **public/** : Fichiers publics (CSS, JS, images).

---

## 📜 Licence
Ce projet a été réalisé dans le cadre du BTS SIO option SLAM et n'est pas destiné à un usage commercial.

---

## 📧 Contact
En cas de questions, n'hésitez pas à me contacter via GitHub.

---

**PharmaZen** - Projet académique pour le BTS SIO SLAM
