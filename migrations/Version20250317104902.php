<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250317104902 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, pharmacien_id INT NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649CFDB96BE (pharmacien_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649CFDB96BE FOREIGN KEY (pharmacien_id) REFERENCES pharmacien (id)');
        $this->addSql('ALTER TABLE client CHANGE courriel courriel VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON client (courriel)');
        $this->addSql('ALTER TABLE pharmacien CHANGE courriel courriel VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON pharmacien (courriel)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649CFDB96BE');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_EMAIL ON pharmacien');
        $this->addSql('ALTER TABLE pharmacien CHANGE courriel courriel VARCHAR(255) DEFAULT NULL');
        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_EMAIL ON client');
        $this->addSql('ALTER TABLE client CHANGE courriel courriel VARCHAR(255) DEFAULT NULL');
    }
}
