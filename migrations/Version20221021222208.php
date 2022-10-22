<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221021222208 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cheque DROP FOREIGN KEY FK_A0BBFDE96CA8149');
        $this->addSql('DROP TABLE cheque');
        $this->addSql('DROP TABLE epargne');
        $this->addSql('ALTER TABLE client ADD role VARCHAR(12) NOT NULL, ADD login VARCHAR(48) NOT NULL, ADD password VARCHAR(12) NOT NULL, ADD nom_complet VARCHAR(54) NOT NULL');
        $this->addSql('ALTER TABLE compte ADD cart_gab_id INT DEFAULT NULL, ADD type_cpt VARCHAR(255) NOT NULL, ADD taux DOUBLE PRECISION DEFAULT NULL, ADD frais DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF652606CA8149 FOREIGN KEY (cart_gab_id) REFERENCES cart_gab (id)');
        $this->addSql('CREATE INDEX IDX_CFF652606CA8149 ON compte (cart_gab_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cheque (id INT AUTO_INCREMENT NOT NULL, cart_gab_id INT DEFAULT NULL, frais DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_A0BBFDE96CA8149 (cart_gab_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE epargne (id INT AUTO_INCREMENT NOT NULL, taux DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE cheque ADD CONSTRAINT FK_A0BBFDE96CA8149 FOREIGN KEY (cart_gab_id) REFERENCES cart_gab (id)');
        $this->addSql('ALTER TABLE client DROP role, DROP login, DROP password, DROP nom_complet');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF652606CA8149');
        $this->addSql('DROP INDEX IDX_CFF652606CA8149 ON compte');
        $this->addSql('ALTER TABLE compte DROP cart_gab_id, DROP type_cpt, DROP taux, DROP frais');
    }
}
