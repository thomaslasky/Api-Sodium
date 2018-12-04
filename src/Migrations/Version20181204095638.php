<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181204095638 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE customizable_part ADD label VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE image ADD label VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE optionnal_part ADD label VARCHAR(255) NOT NULL, ADD price INT DEFAULT NULL, ADD image_global VARCHAR(255) DEFAULT NULL, ADD desc_fr VARCHAR(255) NOT NULL, ADD desc_en VARCHAR(255) NOT NULL, ADD desc_es VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE text ADD label VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE customizable_part DROP label');
        $this->addSql('ALTER TABLE image DROP label');
        $this->addSql('ALTER TABLE optionnal_part DROP label, DROP price, DROP image_global, DROP desc_fr, DROP desc_en, DROP desc_es');
        $this->addSql('ALTER TABLE text DROP label');
    }
}
