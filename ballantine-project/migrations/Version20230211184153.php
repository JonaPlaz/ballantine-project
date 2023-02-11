<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230211184153 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE text ADD category_text_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE text ADD CONSTRAINT FK_3B8BA7C7AE557536 FOREIGN KEY (category_text_id) REFERENCES category_text (id)');
        $this->addSql('CREATE INDEX IDX_3B8BA7C7AE557536 ON text (category_text_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE text DROP FOREIGN KEY FK_3B8BA7C7AE557536');
        $this->addSql('DROP INDEX IDX_3B8BA7C7AE557536 ON text');
        $this->addSql('ALTER TABLE text DROP category_text_id');
    }
}
