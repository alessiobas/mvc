<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220521090229 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE swe_orgs_emissions2010 (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, jordbruk INTEGER NOT NULL, mineral INTEGER NOT NULL, tillverkningsindustrin INTEGER NOT NULL, elochvatten INTEGER NOT NULL, bygg INTEGER NOT NULL, transport INTEGER NOT NULL, ovrigt INTEGER NOT NULL, offentligsektor INTEGER NOT NULL, hushalletc INTEGER NOT NULL, total INTEGER NOT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE swe_orgs_emissions2010');
    }
}
