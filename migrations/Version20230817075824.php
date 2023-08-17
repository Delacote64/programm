<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230817075824 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE abdominaux_session (id INT AUTO_INCREMENT NOT NULL, title_session VARCHAR(255) NOT NULL, day_session DATETIME NOT NULL, title_exercise VARCHAR(255) NOT NULL, serie INT NOT NULL, repetition INT NOT NULL, time_exercise DATETIME NOT NULL, break DATETIME NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cardio_session (id INT AUTO_INCREMENT NOT NULL, title_session VARCHAR(255) NOT NULL, day_session DATETIME NOT NULL, title_exercise VARCHAR(255) NOT NULL, serie INT NOT NULL, repetition INT NOT NULL, time_exercise DATETIME NOT NULL, break DATETIME NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musculation_session (id INT AUTO_INCREMENT NOT NULL, title_session VARCHAR(255) NOT NULL, day_session DATETIME NOT NULL, title_exercise VARCHAR(255) NOT NULL, repetition INT NOT NULL, weight INT NOT NULL, break DATETIME NOT NULL, description VARCHAR(255) NOT NULL, serie INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE abdominaux_session');
        $this->addSql('DROP TABLE cardio_session');
        $this->addSql('DROP TABLE musculation_session');
    }
}
