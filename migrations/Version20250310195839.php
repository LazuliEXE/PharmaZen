<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250310195839 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medicament DROP FOREIGN KEY FK_9A9C723ADCD6110');
        $this->addSql('DROP INDEX IDX_9A9C723ADCD6110 ON medicament');
        $this->addSql('ALTER TABLE medicament DROP stock_id');
        $this->addSql('ALTER TABLE stock ADD medicament_id INT NOT NULL');
        $this->addSql('ALTER TABLE stock ADD CONSTRAINT FK_4B365660AB0D61F7 FOREIGN KEY (medicament_id) REFERENCES medicament (id)');
        $this->addSql('CREATE INDEX IDX_4B365660AB0D61F7 ON stock (medicament_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medicament ADD stock_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE medicament ADD CONSTRAINT FK_9A9C723ADCD6110 FOREIGN KEY (stock_id) REFERENCES stock (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_9A9C723ADCD6110 ON medicament (stock_id)');
        $this->addSql('ALTER TABLE stock DROP FOREIGN KEY FK_4B365660AB0D61F7');
        $this->addSql('DROP INDEX IDX_4B365660AB0D61F7 ON stock');
        $this->addSql('ALTER TABLE stock DROP medicament_id');
    }
}
