<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230121221037 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE place_pnj (place_id INT NOT NULL, pnj_id INT NOT NULL, INDEX IDX_F21B19DCDA6A219 (place_id), INDEX IDX_F21B19DC51796E0B (pnj_id), PRIMARY KEY(place_id, pnj_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE place_pnj ADD CONSTRAINT FK_F21B19DCDA6A219 FOREIGN KEY (place_id) REFERENCES place (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE place_pnj ADD CONSTRAINT FK_F21B19DC51796E0B FOREIGN KEY (pnj_id) REFERENCES pnj (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE place_pnj DROP FOREIGN KEY FK_F21B19DCDA6A219');
        $this->addSql('ALTER TABLE place_pnj DROP FOREIGN KEY FK_F21B19DC51796E0B');
        $this->addSql('DROP TABLE place_pnj');
    }
}
