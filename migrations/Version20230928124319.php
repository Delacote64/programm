<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230928124319 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE abdominaux_session DROP title_session, DROP day_session');
        $this->addSql('ALTER TABLE cardio_session DROP title_session, DROP day_session');
        $this->addSql('ALTER TABLE musculation_session DROP title_session, DROP day_session');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE abdominaux_session ADD title_session VARCHAR(255) NOT NULL, ADD day_session VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE cardio_session ADD title_session VARCHAR(255) NOT NULL, ADD day_session VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE musculation_session ADD title_session VARCHAR(255) NOT NULL, ADD day_session VARCHAR(255) NOT NULL');
    }
}
