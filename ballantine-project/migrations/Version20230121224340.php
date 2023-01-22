<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230121224340 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE audio (id INT AUTO_INCREMENT NOT NULL, code_audio VARCHAR(255) DEFAULT NULL, link VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE explanation ADD audio_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE explanation ADD CONSTRAINT FK_8824B30E3A3123C7 FOREIGN KEY (audio_id) REFERENCES audio (id)');
        $this->addSql('CREATE INDEX IDX_8824B30E3A3123C7 ON explanation (audio_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE explanation DROP FOREIGN KEY FK_8824B30E3A3123C7');
        $this->addSql('DROP TABLE audio');
        $this->addSql('DROP INDEX IDX_8824B30E3A3123C7 ON explanation');
        $this->addSql('ALTER TABLE explanation DROP audio_id');
    }
}
