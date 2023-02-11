<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230211183402 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rank_stage ADD audio_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rank_stage ADD CONSTRAINT FK_EF78DCF43A3123C7 FOREIGN KEY (audio_id) REFERENCES audio (id)');
        $this->addSql('CREATE INDEX IDX_EF78DCF43A3123C7 ON rank_stage (audio_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rank_stage DROP FOREIGN KEY FK_EF78DCF43A3123C7');
        $this->addSql('DROP INDEX IDX_EF78DCF43A3123C7 ON rank_stage');
        $this->addSql('ALTER TABLE rank_stage DROP audio_id');
    }
}
