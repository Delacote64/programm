<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230928083817 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sessions_exercise_exercise DROP FOREIGN KEY FK_4BFE2C8C50D0686B');
        $this->addSql('ALTER TABLE sessions_exercise_exercise DROP FOREIGN KEY FK_4BFE2C8CE934951A');
        $this->addSql('ALTER TABLE sessions_exercise_sessions DROP FOREIGN KEY FK_7F446483F17C4D8C');
        $this->addSql('ALTER TABLE sessions_exercise_sessions DROP FOREIGN KEY FK_7F44648350D0686B');
        $this->addSql('DROP TABLE sessions_exercise');
        $this->addSql('DROP TABLE sessions_exercise_exercise');
        $this->addSql('DROP TABLE sessions_exercise_sessions');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sessions_exercise (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE sessions_exercise_exercise (sessions_exercise_id INT NOT NULL, exercise_id INT NOT NULL, INDEX IDX_4BFE2C8CE934951A (exercise_id), INDEX IDX_4BFE2C8C50D0686B (sessions_exercise_id), PRIMARY KEY(sessions_exercise_id, exercise_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE sessions_exercise_sessions (sessions_exercise_id INT NOT NULL, sessions_id INT NOT NULL, INDEX IDX_7F446483F17C4D8C (sessions_id), INDEX IDX_7F44648350D0686B (sessions_exercise_id), PRIMARY KEY(sessions_exercise_id, sessions_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE sessions_exercise_exercise ADD CONSTRAINT FK_4BFE2C8C50D0686B FOREIGN KEY (sessions_exercise_id) REFERENCES sessions_exercise (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sessions_exercise_exercise ADD CONSTRAINT FK_4BFE2C8CE934951A FOREIGN KEY (exercise_id) REFERENCES exercise (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sessions_exercise_sessions ADD CONSTRAINT FK_7F446483F17C4D8C FOREIGN KEY (sessions_id) REFERENCES sessions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sessions_exercise_sessions ADD CONSTRAINT FK_7F44648350D0686B FOREIGN KEY (sessions_exercise_id) REFERENCES sessions_exercise (id) ON DELETE CASCADE');
    }
}
