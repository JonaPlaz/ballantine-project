<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230211183732 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_item ADD inventory_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category_item ADD CONSTRAINT FK_94805F599EEA759 FOREIGN KEY (inventory_id) REFERENCES inventory (id)');
        $this->addSql('CREATE INDEX IDX_94805F599EEA759 ON category_item (inventory_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_item DROP FOREIGN KEY FK_94805F599EEA759');
        $this->addSql('DROP INDEX IDX_94805F599EEA759 ON category_item');
        $this->addSql('ALTER TABLE category_item DROP inventory_id');
    }
}
