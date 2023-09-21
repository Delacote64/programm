<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230920141559 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE exercise_session (id INT AUTO_INCREMENT NOT NULL, session_id INT DEFAULT NULL, exercises_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_A512291613FECDF (session_id), UNIQUE INDEX UNIQ_A5122911AFA70CA (exercises_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exercises (id INT AUTO_INCREMENT NOT NULL, session_id INT DEFAULT NULL, title_exercise VARCHAR(255) NOT NULL, serie INT NOT NULL, repetition INT NOT NULL, weight INT NOT NULL, description VARCHAR(255) NOT NULL, rpe INT NOT NULL, break TIME NOT NULL, time_exercise TIME NOT NULL COMMENT \'(DC2Type:time_immutable)\', INDEX IDX_FA14991613FECDF (session_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE exercise_session ADD CONSTRAINT FK_A512291613FECDF FOREIGN KEY (session_id) REFERENCES session (id)');
        $this->addSql('ALTER TABLE exercise_session ADD CONSTRAINT FK_A5122911AFA70CA FOREIGN KEY (exercises_id) REFERENCES exercises (id)');
        $this->addSql('ALTER TABLE exercises ADD CONSTRAINT FK_FA14991613FECDF FOREIGN KEY (session_id) REFERENCES session (id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649BC3F045D');
        $this->addSql('DROP INDEX UNIQ_8D93D649BC3F045D ON user');
        $this->addSql('DROP INDEX user_login_id ON user');
        $this->addSql('ALTER TABLE user DROP user_login_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exercise_session DROP FOREIGN KEY FK_A512291613FECDF');
        $this->addSql('ALTER TABLE exercise_session DROP FOREIGN KEY FK_A5122911AFA70CA');
        $this->addSql('ALTER TABLE exercises DROP FOREIGN KEY FK_FA14991613FECDF');
        $this->addSql('DROP TABLE exercise_session');
        $this->addSql('DROP TABLE exercises');
        $this->addSql('ALTER TABLE user ADD user_login_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649BC3F045D FOREIGN KEY (user_login_id) REFERENCES user_login (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649BC3F045D ON user (user_login_id)');
        $this->addSql('CREATE INDEX user_login_id ON user (user_login_id)');
    }
}
