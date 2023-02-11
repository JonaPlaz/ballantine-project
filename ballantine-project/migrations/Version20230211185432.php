<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230211185432 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE name ADD hero_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE name ADD CONSTRAINT FK_5E237E0645B0BCD FOREIGN KEY (hero_id) REFERENCES hero (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5E237E0645B0BCD ON name (hero_id)');
        $this->addSql('ALTER TABLE text ADD hero_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE text ADD CONSTRAINT FK_3B8BA7C745B0BCD FOREIGN KEY (hero_id) REFERENCES hero (id)');
        $this->addSql('CREATE INDEX IDX_3B8BA7C745B0BCD ON text (hero_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE name DROP FOREIGN KEY FK_5E237E0645B0BCD');
        $this->addSql('DROP INDEX UNIQ_5E237E0645B0BCD ON name');
        $this->addSql('ALTER TABLE name DROP hero_id');
        $this->addSql('ALTER TABLE text DROP FOREIGN KEY FK_3B8BA7C745B0BCD');
        $this->addSql('DROP INDEX IDX_3B8BA7C745B0BCD ON text');
        $this->addSql('ALTER TABLE text DROP hero_id');
    }
}
