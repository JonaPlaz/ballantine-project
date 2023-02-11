<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230211190123 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE text ADD rank_stage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE text ADD CONSTRAINT FK_3B8BA7C7A7DF6DCE FOREIGN KEY (rank_stage_id) REFERENCES rank_stage (id)');
        $this->addSql('CREATE INDEX IDX_3B8BA7C7A7DF6DCE ON text (rank_stage_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE text DROP FOREIGN KEY FK_3B8BA7C7A7DF6DCE');
        $this->addSql('DROP INDEX IDX_3B8BA7C7A7DF6DCE ON text');
        $this->addSql('ALTER TABLE text DROP rank_stage_id');
    }
}
