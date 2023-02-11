<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230211183231 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rank_stage ADD atmosphere_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rank_stage ADD CONSTRAINT FK_EF78DCF4D3052147 FOREIGN KEY (atmosphere_id) REFERENCES atmosphere (id)');
        $this->addSql('CREATE INDEX IDX_EF78DCF4D3052147 ON rank_stage (atmosphere_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rank_stage DROP FOREIGN KEY FK_EF78DCF4D3052147');
        $this->addSql('DROP INDEX IDX_EF78DCF4D3052147 ON rank_stage');
        $this->addSql('ALTER TABLE rank_stage DROP atmosphere_id');
    }
}
