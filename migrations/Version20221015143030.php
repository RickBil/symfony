<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221015143030 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agence ADD compte_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE agence ADD CONSTRAINT FK_64C19AA9F2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id)');
        $this->addSql('CREATE INDEX IDX_64C19AA9F2C56620 ON agence (compte_id)');
        $this->addSql('ALTER TABLE client ADD compte_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455F2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id)');
        $this->addSql('CREATE INDEX IDX_C7440455F2C56620 ON client (compte_id)');
        $this->addSql('ALTER TABLE compte ADD transaction_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF652602FC0CB0F FOREIGN KEY (transaction_id) REFERENCES transaction (id)');
        $this->addSql('CREATE INDEX IDX_CFF652602FC0CB0F ON compte (transaction_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agence DROP FOREIGN KEY FK_64C19AA9F2C56620');
        $this->addSql('DROP INDEX IDX_64C19AA9F2C56620 ON agence');
        $this->addSql('ALTER TABLE agence DROP compte_id');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455F2C56620');
        $this->addSql('DROP INDEX IDX_C7440455F2C56620 ON client');
        $this->addSql('ALTER TABLE client DROP compte_id');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF652602FC0CB0F');
        $this->addSql('DROP INDEX IDX_CFF652602FC0CB0F ON compte');
        $this->addSql('ALTER TABLE compte DROP transaction_id');
    }
}
