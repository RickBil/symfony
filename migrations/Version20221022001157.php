<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221022001157 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cheque ADD carte_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cheque ADD CONSTRAINT FK_A0BBFDE9C9C7CEB6 FOREIGN KEY (carte_id) REFERENCES cart_gab (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A0BBFDE9C9C7CEB6 ON cheque (carte_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cheque DROP FOREIGN KEY FK_A0BBFDE9C9C7CEB6');
        $this->addSql('DROP INDEX UNIQ_A0BBFDE9C9C7CEB6 ON cheque');
        $this->addSql('ALTER TABLE cheque DROP carte_id');
    }
}
