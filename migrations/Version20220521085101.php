<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220521085101 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE swe_orgs_emissions (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, jordbruk INTEGER NOT NULL, mineral INTEGER NOT NULL, tillverkningsindustrin INTEGER NOT NULL, elochvatten INTEGER NOT NULL, bygg INTEGER NOT NULL, transport INTEGER NOT NULL, ovrigt INTEGER NOT NULL, offentligsektor INTEGER NOT NULL, hushalletc INTEGER NOT NULL, total INTEGER NOT NULL)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__library AS SELECT id, titel, isbn, author, image FROM library');
        $this->addSql('DROP TABLE library');
        $this->addSql('CREATE TABLE library (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titel VARCHAR(255) DEFAULT NULL, isbn VARCHAR(255) DEFAULT NULL, author VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO library (id, titel, isbn, author, image) SELECT id, titel, isbn, author, image FROM __temp__library');
        $this->addSql('DROP TABLE __temp__library');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE swe_orgs_emissions');
        $this->addSql('CREATE TEMPORARY TABLE __temp__library AS SELECT id, titel, isbn, author, image FROM library');
        $this->addSql('DROP TABLE library');
        $this->addSql('CREATE TABLE library (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titel VARCHAR(255) DEFAULT NULL, isbn INTEGER NOT NULL, author VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO library (id, titel, isbn, author, image) SELECT id, titel, isbn, author, image FROM __temp__library');
        $this->addSql('DROP TABLE __temp__library');
    }
}
