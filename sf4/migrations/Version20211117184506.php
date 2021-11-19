<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211117184506 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE detail_t (id INT AUTO_INCREMENT NOT NULL, transport_id INT DEFAULT NULL, marque VARCHAR(255) NOT NULL, etat VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, date_creation DATETIME NOT NULL, date_modification DATETIME NOT NULL, UNIQUE INDEX UNIQ_B1447D339909C13F (transport_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gvol (numv INT AUTO_INCREMENT NOT NULL, nomv VARCHAR(255) NOT NULL, dated DATE NOT NULL, datea DATE NOT NULL, depart VARCHAR(255) NOT NULL, arriver VARCHAR(255) NOT NULL, chauffeur VARCHAR(255) NOT NULL, PRIMARY KEY(numv)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transport (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, dispo VARCHAR(255) NOT NULL, driver VARCHAR(255) NOT NULL, prix VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE detail_t ADD CONSTRAINT FK_B1447D339909C13F FOREIGN KEY (transport_id) REFERENCES transport (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE detail_t DROP FOREIGN KEY FK_B1447D339909C13F');
        $this->addSql('DROP TABLE detail_t');
        $this->addSql('DROP TABLE gvol');
        $this->addSql('DROP TABLE transport');
    }
}
