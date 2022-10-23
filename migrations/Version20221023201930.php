<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221023201930 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agence (id INT AUTO_INCREMENT NOT NULL, numero VARCHAR(12) NOT NULL, adresse VARCHAR(24) NOT NULL, tel VARCHAR(12) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cart_gab (id INT AUTO_INCREMENT NOT NULL, numero INT NOT NULL, date_exp VARCHAR(12) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cheque (id INT NOT NULL, carte_id INT DEFAULT NULL, frais DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_A0BBFDE9C9C7CEB6 (carte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clients (id INT NOT NULL, tel VARCHAR(12) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, agence_id INT NOT NULL, client_id INT NOT NULL, numero VARCHAR(12) NOT NULL, solde DOUBLE PRECISION NOT NULL, type VARCHAR(12) NOT NULL, type_cpt VARCHAR(255) NOT NULL, INDEX IDX_CFF65260D725330D (agence_id), INDEX IDX_CFF6526019EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE epargne (id INT NOT NULL, taux DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transaction (id INT AUTO_INCREMENT NOT NULL, compte_id INT NOT NULL, montant DOUBLE PRECISION NOT NULL, date DATETIME NOT NULL, type VARCHAR(12) NOT NULL, INDEX IDX_723705D1F2C56620 (compte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom_complet VARCHAR(64) NOT NULL, type_user VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649AA08CB10 (login), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cheque ADD CONSTRAINT FK_A0BBFDE9C9C7CEB6 FOREIGN KEY (carte_id) REFERENCES cart_gab (id)');
        $this->addSql('ALTER TABLE cheque ADD CONSTRAINT FK_A0BBFDE9BF396750 FOREIGN KEY (id) REFERENCES compte (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_C82E74BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260D725330D FOREIGN KEY (agence_id) REFERENCES agence (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526019EB6921 FOREIGN KEY (client_id) REFERENCES clients (id)');
        $this->addSql('ALTER TABLE epargne ADD CONSTRAINT FK_A19A894CBF396750 FOREIGN KEY (id) REFERENCES compte (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1F2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cheque DROP FOREIGN KEY FK_A0BBFDE9C9C7CEB6');
        $this->addSql('ALTER TABLE cheque DROP FOREIGN KEY FK_A0BBFDE9BF396750');
        $this->addSql('ALTER TABLE clients DROP FOREIGN KEY FK_C82E74BF396750');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260D725330D');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF6526019EB6921');
        $this->addSql('ALTER TABLE epargne DROP FOREIGN KEY FK_A19A894CBF396750');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1F2C56620');
        $this->addSql('DROP TABLE agence');
        $this->addSql('DROP TABLE cart_gab');
        $this->addSql('DROP TABLE cheque');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE epargne');
        $this->addSql('DROP TABLE transaction');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
