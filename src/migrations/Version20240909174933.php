<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240909174933 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'creates table preferred_notifications';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE preferred_notications (id INT AUTO_INCREMENT NOT NULL , PRIMARY KEY(id), name VARCHAR(120) NOT NULL)');

    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE preferred_notications');

    }
}
