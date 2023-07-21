<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230719082356 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exercises ADD break VARCHAR(255) NOT NULL COMMENT \'(DC2Type:dateinterval)\'');
        $this->addSql('ALTER TABLE session DROP description, DROP title_exercise, DROP repetition, DROP weight, DROP break, DROP time_exercise');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exercises DROP break');
        $this->addSql('ALTER TABLE session ADD description LONGTEXT NOT NULL, ADD title_exercise VARCHAR(255) NOT NULL, ADD repetition INT NOT NULL, ADD weight INT NOT NULL, ADD break VARCHAR(255) NOT NULL COMMENT \'(DC2Type:dateinterval)\', ADD time_exercise VARCHAR(255) NOT NULL COMMENT \'(DC2Type:dateinterval)\'');
    }
}
