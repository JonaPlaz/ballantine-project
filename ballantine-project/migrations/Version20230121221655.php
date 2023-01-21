<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230121221655 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mindset (id INT AUTO_INCREMENT NOT NULL, code_mindset VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hero ADD mindset_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE hero ADD CONSTRAINT FK_51CE6E862CF2A68D FOREIGN KEY (mindset_id) REFERENCES mindset (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_51CE6E862CF2A68D ON hero (mindset_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hero DROP FOREIGN KEY FK_51CE6E862CF2A68D');
        $this->addSql('DROP TABLE mindset');
        $this->addSql('DROP INDEX UNIQ_51CE6E862CF2A68D ON hero');
        $this->addSql('ALTER TABLE hero DROP mindset_id');
    }
}
