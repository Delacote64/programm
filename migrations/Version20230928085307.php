<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230928085307 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sessions_exercise (id INT AUTO_INCREMENT NOT NULL, sessions_id INT DEFAULT NULL, exercise_id INT DEFAULT NULL, INDEX IDX_96993628F17C4D8C (sessions_id), INDEX IDX_96993628E934951A (exercise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sessions_exercise ADD CONSTRAINT FK_96993628F17C4D8C FOREIGN KEY (sessions_id) REFERENCES sessions (id)');
        $this->addSql('ALTER TABLE sessions_exercise ADD CONSTRAINT FK_96993628E934951A FOREIGN KEY (exercise_id) REFERENCES exercise (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sessions_exercise DROP FOREIGN KEY FK_96993628F17C4D8C');
        $this->addSql('ALTER TABLE sessions_exercise DROP FOREIGN KEY FK_96993628E934951A');
        $this->addSql('DROP TABLE sessions_exercise');
    }
}
