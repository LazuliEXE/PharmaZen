<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250308125221 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Ajout de la table interraction medicamenteuse';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medicament DROP FOREIGN KEY FK_9A9C723ABAEF1A29');
        $this->addSql('CREATE TABLE interaction_medicamenteuse (id INT AUTO_INCREMENT NOT NULL, victime_id INT NOT NULL, perpetrateur_id INT NOT NULL, interaction VARCHAR(255) NOT NULL, INDEX IDX_9BAAFC6D75FF0F4B (victime_id), INDEX IDX_9BAAFC6D123C5581 (perpetrateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE interaction_medicamenteuse ADD CONSTRAINT FK_9BAAFC6D75FF0F4B FOREIGN KEY (victime_id) REFERENCES medicament (id)');
        $this->addSql('ALTER TABLE interaction_medicamenteuse ADD CONSTRAINT FK_9BAAFC6D123C5581 FOREIGN KEY (perpetrateur_id) REFERENCES medicament (id)');
        $this->addSql('ALTER TABLE medicament_lie DROP FOREIGN KEY FK_7FCDAC221525B092');
        $this->addSql('DROP TABLE medicament_lie');
        $this->addSql('DROP INDEX IDX_9A9C723ABAEF1A29 ON medicament');
        $this->addSql('ALTER TABLE medicament DROP medicament_lie_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE medicament_lie (id INT AUTO_INCREMENT NOT NULL, id_medicament_id INT NOT NULL, mauvais_ou_bon TINYINT(1) NOT NULL, INDEX IDX_7FCDAC221525B092 (id_medicament_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE medicament_lie ADD CONSTRAINT FK_7FCDAC221525B092 FOREIGN KEY (id_medicament_id) REFERENCES medicament (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE interaction_medicamenteuse DROP FOREIGN KEY FK_9BAAFC6D75FF0F4B');
        $this->addSql('ALTER TABLE interaction_medicamenteuse DROP FOREIGN KEY FK_9BAAFC6D123C5581');
        $this->addSql('DROP TABLE interaction_medicamenteuse');
        $this->addSql('ALTER TABLE medicament ADD medicament_lie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE medicament ADD CONSTRAINT FK_9A9C723ABAEF1A29 FOREIGN KEY (medicament_lie_id) REFERENCES medicament_lie (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_9A9C723ABAEF1A29 ON medicament (medicament_lie_id)');
    }
}
