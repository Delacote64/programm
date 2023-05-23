<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230522102723 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exercices ADD seance_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE exercices ADD CONSTRAINT FK_1387EAE160528D1B FOREIGN KEY (seance_id_id) REFERENCES session (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1387EAE160528D1B ON exercices (seance_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exercices DROP FOREIGN KEY FK_1387EAE160528D1B');
        $this->addSql('DROP INDEX UNIQ_1387EAE160528D1B ON exercices');
        $this->addSql('ALTER TABLE exercices DROP seance_id_id');
    }
}
