<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211118120437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lieu ADD hootels_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lieu ADD CONSTRAINT FK_2F577D5957FD335D FOREIGN KEY (hootels_id) REFERENCES hotel (id)');
        $this->addSql('CREATE INDEX IDX_2F577D5957FD335D ON lieu (hootels_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lieu DROP FOREIGN KEY FK_2F577D5957FD335D');
        $this->addSql('DROP INDEX IDX_2F577D5957FD335D ON lieu');
        $this->addSql('ALTER TABLE lieu DROP hootels_id');
    }
}
