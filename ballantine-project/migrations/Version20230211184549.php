<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230211184549 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item ADD furniture_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251ECF5485C3 FOREIGN KEY (furniture_id) REFERENCES furniture (id)');
        $this->addSql('CREATE INDEX IDX_1F1B251ECF5485C3 ON item (furniture_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251ECF5485C3');
        $this->addSql('DROP INDEX IDX_1F1B251ECF5485C3 ON item');
        $this->addSql('ALTER TABLE item DROP furniture_id');
    }
}
