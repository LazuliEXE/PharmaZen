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
- **WAMP** (ou un autre environnement PHP/MySQL)
- **PHP** 8.2 ou plus récent
- **Composer**
- **Git**

> 💡 Pour installer Git : [https://git-scm.com](https://git-scm.com)

---

### Étapes d'installation

1. **Cloner le projet depuis GitHub**  
   Ouvrez un terminal et exécutez :
   ```bash
   git clone https://github.com/ton-profil/pharmazen.git
   cd pharmazen

2. **Configurer les variables d'environnement**
Copiez le fichier .env vers .env.local et modifiez la chaîne de connexion à la base de données :

Copier le code
```bash
cp .env .env.local
```
Exemple de configuration :

Copier le code
```ini
DATABASE_URL="mysql://root:password@127.0.0.1:3306/pharmazen"
```
3. **Lancer le script d'installation automatique**

Sous Linux / macOS :
Le script run.sh automatise les étapes suivantes :

Installation des dépendances

Création de la base de données

Exécution des migrations

Chargement des données de démonstration (fixtures)

Exécutez la commande :

Copier le code
```bash
./run.sh
```
⚠️ Si le script ne s'exécute pas, donnez-lui les droits d'exécution :

Copier le code
```bash
chmod +x run.sh
```

Sous Windows :
Lancez le script run.bat en double-cliquant dessus ou via l'invite de commande :

```bash
run.sh
```

4. **Lancer le serveur Symfony**
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
