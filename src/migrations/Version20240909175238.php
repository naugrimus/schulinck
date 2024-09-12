<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240909175238 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Fills preferred Notifications';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("INSERT INTO preferred_notications (name) VALUES ('email')");
        $this->addSql("INSERT INTO preferred_notications (name) VALUES ('SMS')");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
