<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231010081412 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE musculation_session DROP FOREIGN KEY FK_B5BA1F84A76ED395');
        $this->addSql('DROP INDEX IDX_B5BA1F84A76ED395 ON musculation_session');
        $this->addSql('ALTER TABLE musculation_session DROP user_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE musculation_session ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE musculation_session ADD CONSTRAINT FK_B5BA1F84A76ED395 FOREIGN KEY (user_id) REFERENCES user_login (id)');
        $this->addSql('CREATE INDEX IDX_B5BA1F84A76ED395 ON musculation_session (user_id)');
    }
}
