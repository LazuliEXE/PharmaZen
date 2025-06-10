<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250610140119 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE forme (id INT AUTO_INCREMENT NOT NULL, lib_forme VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE medicament ADD id_forme_id INT NOT NULL, DROP forme');
        $this->addSql('ALTER TABLE medicament ADD CONSTRAINT FK_9A9C723AEC33A2E9 FOREIGN KEY (id_forme_id) REFERENCES forme (id)');
        $this->addSql('CREATE INDEX IDX_9A9C723AEC33A2E9 ON medicament (id_forme_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medicament DROP FOREIGN KEY FK_9A9C723AEC33A2E9');
        $this->addSql('DROP TABLE forme');
        $this->addSql('DROP INDEX IDX_9A9C723AEC33A2E9 ON medicament');
        $this->addSql('ALTER TABLE medicament ADD forme VARCHAR(64) NOT NULL, DROP id_forme_id');
    }
}
