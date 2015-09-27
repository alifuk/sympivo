<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150804131827 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE lokace (id INT AUTO_INCREMENT NOT NULL, jmeno VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hospody ADD hospoda_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE hospody ADD CONSTRAINT FK_6219B1D6E35DC499 FOREIGN KEY (hospoda_id) REFERENCES lokace (id)');
        $this->addSql('CREATE INDEX IDX_6219B1D6E35DC499 ON hospody (hospoda_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE hospody DROP FOREIGN KEY FK_6219B1D6E35DC499');
        $this->addSql('DROP TABLE lokace');
        $this->addSql('DROP INDEX IDX_6219B1D6E35DC499 ON hospody');
        $this->addSql('ALTER TABLE hospody DROP hospoda_id');
    }
}
