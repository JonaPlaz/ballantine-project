<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230211184400 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE furniture ADD room_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE furniture ADD CONSTRAINT FK_665DDAB354177093 FOREIGN KEY (room_id) REFERENCES room (id)');
        $this->addSql('CREATE INDEX IDX_665DDAB354177093 ON furniture (room_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE furniture DROP FOREIGN KEY FK_665DDAB354177093');
        $this->addSql('DROP INDEX IDX_665DDAB354177093 ON furniture');
        $this->addSql('ALTER TABLE furniture DROP room_id');
    }
}
