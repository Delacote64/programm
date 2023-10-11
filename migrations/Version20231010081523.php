<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231010081523 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE abdominaux_session DROP FOREIGN KEY FK_4BD02CB07ED48EC9');
        $this->addSql('DROP INDEX UNIQ_4BD02CB07ED48EC9 ON abdominaux_session');
        $this->addSql('ALTER TABLE abdominaux_session CHANGE bdoy_part_id body_part_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE abdominaux_session ADD CONSTRAINT FK_4BD02CB0A515F27A FOREIGN KEY (body_part_id) REFERENCES body_part (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4BD02CB0A515F27A ON abdominaux_session (body_part_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE abdominaux_session DROP FOREIGN KEY FK_4BD02CB0A515F27A');
        $this->addSql('DROP INDEX UNIQ_4BD02CB0A515F27A ON abdominaux_session');
        $this->addSql('ALTER TABLE abdominaux_session CHANGE body_part_id bdoy_part_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE abdominaux_session ADD CONSTRAINT FK_4BD02CB07ED48EC9 FOREIGN KEY (bdoy_part_id) REFERENCES body_part (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4BD02CB07ED48EC9 ON abdominaux_session (bdoy_part_id)');
    }
}
