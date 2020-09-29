<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200926124414 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, firstname VARCHAR(50) NOT NULL, age INT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE console (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, image VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_497DD6345E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, name VARCHAR(255) NOT NULL, desccription VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, image2 VARCHAR(255) NOT NULL, trailer VARCHAR(255) NOT NULL, text1 LONGTEXT NOT NULL, text2 LONGTEXT DEFAULT NULL, text3 LONGTEXT DEFAULT NULL, date DATE NOT NULL, company VARCHAR(255) DEFAULT NULL, titre1 VARCHAR(100) NOT NULL, titre2 VARCHAR(100) NOT NULL, titre3 VARCHAR(100) DEFAULT NULL, mode VARCHAR(100) NOT NULL, text4 LONGTEXT DEFAULT NULL, titre4 VARCHAR(100) DEFAULT NULL, engine VARCHAR(100) DEFAULT NULL, license VARCHAR(100) DEFAULT NULL, INDEX IDX_232B318CBCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game_console (game_id INT NOT NULL, console_id INT NOT NULL, INDEX IDX_A3C1B099E48FD905 (game_id), INDEX IDX_A3C1B09972F9DD9F (console_id), PRIMARY KEY(game_id, console_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318CBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE game_console ADD CONSTRAINT FK_A3C1B099E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_console ADD CONSTRAINT FK_A3C1B09972F9DD9F FOREIGN KEY (console_id) REFERENCES console (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318CBCF5E72D');
        $this->addSql('ALTER TABLE game_console DROP FOREIGN KEY FK_A3C1B09972F9DD9F');
        $this->addSql('ALTER TABLE game_console DROP FOREIGN KEY FK_A3C1B099E48FD905');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE console');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE game_console');
        $this->addSql('DROP TABLE personne');
    }
}
