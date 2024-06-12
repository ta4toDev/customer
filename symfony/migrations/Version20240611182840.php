<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240611182840 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, company_name VARCHAR(30) NOT NULL, street VARCHAR(30) NOT NULL, house_number VARCHAR(10) NOT NULL, city VARCHAR(30) NOT NULL, postal_code VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, company_id INT NOT NULL, salutation VARCHAR(10) NOT NULL, first_name VARCHAR(30) NOT NULL, last_name VARCHAR(30) NOT NULL, street VARCHAR(30) NOT NULL, house_number VARCHAR(5) NOT NULL, city VARCHAR(30) NOT NULL, postal_code VARCHAR(10) NOT NULL, email VARCHAR(30) NOT NULL, INDEX IDX_4C62E638979B1AD6 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638979B1AD6');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE contact');
    }
}
