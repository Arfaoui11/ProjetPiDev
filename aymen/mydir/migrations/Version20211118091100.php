<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class  Version20211118091100 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE factures_clients ADD banque_id INT DEFAULT NULL, CHANGE id_Fac id_Fac VARCHAR(42) NOT NULL');
        $this->addSql('ALTER TABLE factures_clients ADD CONSTRAINT FK_2BAB04F37E080D9 FOREIGN KEY (banque_id) REFERENCES banque (id)');
        $this->addSql('CREATE INDEX IDX_2BAB04F37E080D9 ON factures_clients (banque_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE factures_clients DROP FOREIGN KEY FK_2BAB04F37E080D9');
        $this->addSql('DROP INDEX IDX_2BAB04F37E080D9 ON factures_clients');
        $this->addSql('ALTER TABLE factures_clients DROP banque_id, CHANGE id_Fac id_Fac INT AUTO_INCREMENT NOT NULL');
    }
}
