<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230211184305 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE text ADD character_speaker_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE text ADD CONSTRAINT FK_3B8BA7C761C6B6A1 FOREIGN KEY (character_speaker_id) REFERENCES `character` (id)');
        $this->addSql('CREATE INDEX IDX_3B8BA7C761C6B6A1 ON text (character_speaker_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE text DROP FOREIGN KEY FK_3B8BA7C761C6B6A1');
        $this->addSql('DROP INDEX IDX_3B8BA7C761C6B6A1 ON text');
        $this->addSql('ALTER TABLE text DROP character_speaker_id');
    }
}
