<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230211185544 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hero ADD hero_class_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE hero ADD CONSTRAINT FK_51CE6E864F1EBAB8 FOREIGN KEY (hero_class_id) REFERENCES hero_class (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_51CE6E864F1EBAB8 ON hero (hero_class_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hero DROP FOREIGN KEY FK_51CE6E864F1EBAB8');
        $this->addSql('DROP INDEX UNIQ_51CE6E864F1EBAB8 ON hero');
        $this->addSql('ALTER TABLE hero DROP hero_class_id');
    }
}
