<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230928090831 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sessions ADD sessions_exercise_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sessions ADD CONSTRAINT FK_9A609D1350D0686B FOREIGN KEY (sessions_exercise_id) REFERENCES sessions_type (id)');
        $this->addSql('CREATE INDEX IDX_9A609D1350D0686B ON sessions (sessions_exercise_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sessions DROP FOREIGN KEY FK_9A609D1350D0686B');
        $this->addSql('DROP INDEX IDX_9A609D1350D0686B ON sessions');
        $this->addSql('ALTER TABLE sessions DROP sessions_exercise_id');
    }
}
