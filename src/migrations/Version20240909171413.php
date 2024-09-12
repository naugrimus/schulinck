<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240909171413 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creates customer table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL , PRIMARY KEY(id), name VARCHAR(120) NOT NULL, email VARCHAR(255), telephone VARCHAR(16), preferredNotification VARCHAR(12))');

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE customer');
    }
}
