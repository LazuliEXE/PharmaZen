<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250517193330 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE achat (id INT AUTO_INCREMENT NOT NULL, acheteur_id INT NOT NULL, vente_id INT DEFAULT NULL, date_achat DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', quantite INT NOT NULL, date_prescription DATE DEFAULT NULL, rpps_medecin INT DEFAULT NULL, posologie LONGTEXT NOT NULL, INDEX IDX_26A9845696A7BB5F (acheteur_id), INDEX IDX_26A984567DC7170A (vente_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, redacteur_id INT NOT NULL, alerte TINYINT(1) NOT NULL, titre VARCHAR(255) NOT NULL, contenu LONGTEXT NOT NULL, date_publi DATE NOT NULL, existant TINYINT(1) NOT NULL, auteur VARCHAR(128) NOT NULL, lien LONGTEXT DEFAULT NULL, date_creation DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_23A0E66764D0490 (redacteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(64) NOT NULL, prenom VARCHAR(64) NOT NULL, telephone VARCHAR(14) DEFAULT NULL, dob DATE NOT NULL, allergies LONGTEXT DEFAULT NULL, numero_secu VARCHAR(11) NOT NULL, assurance TINYINT(1) NOT NULL, assurance_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE interaction_medicamenteuse (id INT AUTO_INCREMENT NOT NULL, victime_id INT NOT NULL, interaction VARCHAR(255) NOT NULL, INDEX IDX_9BAAFC6D75FF0F4B (victime_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medicament (id INT AUTO_INCREMENT NOT NULL, nom_comm VARCHAR(64) NOT NULL, nom_gen VARCHAR(64) NOT NULL, dosage INT NOT NULL, prix NUMERIC(6, 2) NOT NULL, forme VARCHAR(64) NOT NULL, notice LONGTEXT NOT NULL, indication LONGTEXT NOT NULL, contre_indication LONGTEXT NOT NULL, effet_sec LONGTEXT NOT NULL, composition LONGTEXT NOT NULL, fabricant VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pharmacien (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(64) NOT NULL, prenom VARCHAR(64) NOT NULL, telephone VARCHAR(14) DEFAULT NULL, dob DATE NOT NULL, numero_licence VARCHAR(32) NOT NULL, rpps_pharmacien INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stock (id INT AUTO_INCREMENT NOT NULL, medicament_id INT NOT NULL, quantite INT UNSIGNED NOT NULL, date_expiration DATE NOT NULL, INDEX IDX_4B365660AB0D61F7 (medicament_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, pharmacien_id INT NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, courriel VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649CFDB96BE (pharmacien_id), UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (courriel), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE achat ADD CONSTRAINT FK_26A9845696A7BB5F FOREIGN KEY (acheteur_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE achat ADD CONSTRAINT FK_26A984567DC7170A FOREIGN KEY (vente_id) REFERENCES medicament (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66764D0490 FOREIGN KEY (redacteur_id) REFERENCES pharmacien (id)');
        $this->addSql('ALTER TABLE interaction_medicamenteuse ADD CONSTRAINT FK_9BAAFC6D75FF0F4B FOREIGN KEY (victime_id) REFERENCES medicament (id)');
        $this->addSql('ALTER TABLE stock ADD CONSTRAINT FK_4B365660AB0D61F7 FOREIGN KEY (medicament_id) REFERENCES medicament (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649CFDB96BE FOREIGN KEY (pharmacien_id) REFERENCES pharmacien (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE achat DROP FOREIGN KEY FK_26A9845696A7BB5F');
        $this->addSql('ALTER TABLE achat DROP FOREIGN KEY FK_26A984567DC7170A');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66764D0490');
        $this->addSql('ALTER TABLE interaction_medicamenteuse DROP FOREIGN KEY FK_9BAAFC6D75FF0F4B');
        $this->addSql('ALTER TABLE stock DROP FOREIGN KEY FK_4B365660AB0D61F7');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649CFDB96BE');
        $this->addSql('DROP TABLE achat');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE interaction_medicamenteuse');
        $this->addSql('DROP TABLE medicament');
        $this->addSql('DROP TABLE pharmacien');
        $this->addSql('DROP TABLE stock');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
