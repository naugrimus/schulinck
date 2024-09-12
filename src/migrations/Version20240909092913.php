<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240909092913 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Fills the pizza_bottom table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("INSERT INTO pizza_bottom (name) VALUES ('Classic')");
        $this->addSql("INSERT INTO pizza_bottom (name) VALUES ('Cheesy Crust')");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
