<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230211183620 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` ADD category_character_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034CBE19DE7 FOREIGN KEY (category_character_id) REFERENCES category_character (id)');
        $this->addSql('CREATE INDEX IDX_937AB034CBE19DE7 ON `character` (category_character_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034CBE19DE7');
        $this->addSql('DROP INDEX IDX_937AB034CBE19DE7 ON `character`');
        $this->addSql('ALTER TABLE `character` DROP category_character_id');
    }
}
