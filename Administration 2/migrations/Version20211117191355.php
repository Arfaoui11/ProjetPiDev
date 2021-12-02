<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211117191355 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE coach (Id_Coach INT AUTO_INCREMENT NOT NULL, Nom_Coach VARCHAR(255) NOT NULL, Prenom_Coach VARCHAR(255) NOT NULL, Id_User INT NOT NULL, Cin_Coach INT NOT NULL, Email_Coach VARCHAR(255) NOT NULL, Prix_Hr DOUBLE PRECISION NOT NULL, PRIMARY KEY(Id_Coach)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE command (Id_Com INT AUTO_INCREMENT NOT NULL, Id_Produit INT NOT NULL, Id_User INT NOT NULL, Prix_Produit DOUBLE PRECISION NOT NULL, Date_Com VARCHAR(255) NOT NULL, quantite INT NOT NULL, Categorie_Produit VARCHAR(255) NOT NULL, Marque_Produit VARCHAR(255) NOT NULL, Nom_Produit VARCHAR(255) NOT NULL, PRIMARY KEY(Id_Com)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (ID_Event INT AUTO_INCREMENT NOT NULL, Nom_Event VARCHAR(255) NOT NULL, Adresse_Event VARCHAR(255) NOT NULL, Num_Event INT NOT NULL, Prix_P DOUBLE PRECISION NOT NULL, Date_Debut VARCHAR(255) NOT NULL, Date_Fin VARCHAR(255) NOT NULL, PRIMARY KEY(ID_Event)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exercice (Id_Ex INT AUTO_INCREMENT NOT NULL, Nom_Ex VARCHAR(255) NOT NULL, Cat_Ex VARCHAR(255) NOT NULL, Num_Ser INT NOT NULL, Num_Rep INT NOT NULL, PRIMARY KEY(Id_Ex)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, Nom VARCHAR(255) NOT NULL, Prenom VARCHAR(255) NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, Cin INT NOT NULL, password VARCHAR(255) NOT NULL, Date_N DATE NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE coach');
        $this->addSql('DROP TABLE command');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE exercice');
        $this->addSql('DROP TABLE user');
    }
}
