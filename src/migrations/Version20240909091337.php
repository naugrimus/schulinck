<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240909091337 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Fills the pizzaria table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("INSERT INTO pizzeria (name) VALUES ('Dominos')");
        $this->addSql("INSERT INTO pizzeria (name) VALUES ('New York Pizza')");


    }

    public function down(Schema $schema): void
    {


    }
}
