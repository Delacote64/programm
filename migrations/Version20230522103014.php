<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230522103014 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exercices ADD bodypart_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE exercices ADD CONSTRAINT FK_1387EAE1340DA7EB FOREIGN KEY (bodypart_id_id) REFERENCES session (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1387EAE1340DA7EB ON exercices (bodypart_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exercices DROP FOREIGN KEY FK_1387EAE1340DA7EB');
        $this->addSql('DROP INDEX UNIQ_1387EAE1340DA7EB ON exercices');
        $this->addSql('ALTER TABLE exercices DROP bodypart_id_id');
    }
}
