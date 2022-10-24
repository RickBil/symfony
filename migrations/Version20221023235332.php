<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221023235332 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cart_gab CHANGE numero numero VARCHAR(20) NOT NULL');
        $this->addSql('ALTER TABLE compte CHANGE agence_id agence_id INT NOT NULL, CHANGE client_id client_id INT NOT NULL');
        $this->addSql('ALTER TABLE user DROP nom, DROP prenom');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cart_gab CHANGE numero numero VARCHAR(20) DEFAULT \'\' NOT NULL');
        $this->addSql('ALTER TABLE compte CHANGE agence_id agence_id INT DEFAULT NULL, CHANGE client_id client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL');
    }
}
