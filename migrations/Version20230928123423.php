<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230928123423 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE body_part DROP FOREIGN KEY FK_1C8BCCA4E934951A');
        $this->addSql('ALTER TABLE sessions DROP FOREIGN KEY FK_9A609D1350D0686B');
        $this->addSql('ALTER TABLE exercise DROP FOREIGN KEY FK_AEDAD51C613FECDF');
        $this->addSql('ALTER TABLE sessions_exercise DROP FOREIGN KEY FK_96993628E934951A');
        $this->addSql('ALTER TABLE sessions_exercise DROP FOREIGN KEY FK_96993628F17C4D8C');
        $this->addSql('DROP TABLE exercise');
        $this->addSql('DROP TABLE sessions_exercise');
        $this->addSql('DROP TABLE sessions_type');
        $this->addSql('DROP INDEX IDX_1C8BCCA4E934951A ON body_part');
        $this->addSql('ALTER TABLE body_part DROP exercise_id');
        $this->addSql('DROP INDEX IDX_9A609D1350D0686B ON sessions');
        $this->addSql('ALTER TABLE sessions DROP sessions_exercise_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE exercise (id INT AUTO_INCREMENT NOT NULL, session_id INT DEFAULT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, serie INT NOT NULL, repetition INT NOT NULL, rpe INT NOT NULL, break DATETIME NOT NULL, time_exercise DATETIME NOT NULL, weight INT NOT NULL, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_AEDAD51C613FECDF (session_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE sessions_exercise (id INT AUTO_INCREMENT NOT NULL, sessions_id INT DEFAULT NULL, exercise_id INT DEFAULT NULL, INDEX IDX_96993628E934951A (exercise_id), INDEX IDX_96993628F17C4D8C (sessions_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE sessions_type (id INT AUTO_INCREMENT NOT NULL, musculation VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, cardio VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, abdominaux VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE exercise ADD CONSTRAINT FK_AEDAD51C613FECDF FOREIGN KEY (session_id) REFERENCES sessions (id)');
        $this->addSql('ALTER TABLE sessions_exercise ADD CONSTRAINT FK_96993628E934951A FOREIGN KEY (exercise_id) REFERENCES exercise (id)');
        $this->addSql('ALTER TABLE sessions_exercise ADD CONSTRAINT FK_96993628F17C4D8C FOREIGN KEY (sessions_id) REFERENCES sessions (id)');
        $this->addSql('ALTER TABLE body_part ADD exercise_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE body_part ADD CONSTRAINT FK_1C8BCCA4E934951A FOREIGN KEY (exercise_id) REFERENCES exercise (id)');
        $this->addSql('CREATE INDEX IDX_1C8BCCA4E934951A ON body_part (exercise_id)');
        $this->addSql('ALTER TABLE sessions ADD sessions_exercise_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sessions ADD CONSTRAINT FK_9A609D1350D0686B FOREIGN KEY (sessions_exercise_id) REFERENCES sessions_type (id)');
        $this->addSql('CREATE INDEX IDX_9A609D1350D0686B ON sessions (sessions_exercise_id)');
    }
}
