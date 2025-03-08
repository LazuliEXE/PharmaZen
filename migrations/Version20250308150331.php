<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250308150331 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE stock (id INT AUTO_INCREMENT NOT NULL, quantite INT UNSIGNED NOT NULL, date_expiration DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE interaction_medicamenteuse DROP FOREIGN KEY FK_9BAAFC6D123C5581');
        $this->addSql('DROP INDEX IDX_9BAAFC6D123C5581 ON interaction_medicamenteuse');
        $this->addSql('ALTER TABLE interaction_medicamenteuse DROP perpetrateur_id');
        $this->addSql('ALTER TABLE medicament ADD stock_id INT NOT NULL, DROP date_expiration');
        $this->addSql('ALTER TABLE medicament ADD CONSTRAINT FK_9A9C723ADCD6110 FOREIGN KEY (stock_id) REFERENCES stock (id)');
        $this->addSql('CREATE INDEX IDX_9A9C723ADCD6110 ON medicament (stock_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medicament DROP FOREIGN KEY FK_9A9C723ADCD6110');
        $this->addSql('DROP TABLE stock');
        $this->addSql('ALTER TABLE interaction_medicamenteuse ADD perpetrateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE interaction_medicamenteuse ADD CONSTRAINT FK_9BAAFC6D123C5581 FOREIGN KEY (perpetrateur_id) REFERENCES medicament (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_9BAAFC6D123C5581 ON interaction_medicamenteuse (perpetrateur_id)');
        $this->addSql('DROP INDEX IDX_9A9C723ADCD6110 ON medicament');
        $this->addSql('ALTER TABLE medicament ADD date_expiration DATE NOT NULL, DROP stock_id');
    }
}
