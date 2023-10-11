<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230929065748 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE abdominaux_session ADD bdoy_part_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE abdominaux_session ADD CONSTRAINT FK_4BD02CB07ED48EC9 FOREIGN KEY (bdoy_part_id) REFERENCES body_part (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4BD02CB07ED48EC9 ON abdominaux_session (bdoy_part_id)');
        $this->addSql('ALTER TABLE cardio_session ADD body_part_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cardio_session ADD CONSTRAINT FK_B518A030A515F27A FOREIGN KEY (body_part_id) REFERENCES body_part (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B518A030A515F27A ON cardio_session (body_part_id)');
        $this->addSql('ALTER TABLE musculation_session ADD body_part_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE musculation_session ADD CONSTRAINT FK_B5BA1F84A515F27A FOREIGN KEY (body_part_id) REFERENCES body_part (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B5BA1F84A515F27A ON musculation_session (body_part_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE abdominaux_session DROP FOREIGN KEY FK_4BD02CB07ED48EC9');
        $this->addSql('DROP INDEX UNIQ_4BD02CB07ED48EC9 ON abdominaux_session');
        $this->addSql('ALTER TABLE abdominaux_session DROP bdoy_part_id');
        $this->addSql('ALTER TABLE cardio_session DROP FOREIGN KEY FK_B518A030A515F27A');
        $this->addSql('DROP INDEX UNIQ_B518A030A515F27A ON cardio_session');
        $this->addSql('ALTER TABLE cardio_session DROP body_part_id');
        $this->addSql('ALTER TABLE musculation_session DROP FOREIGN KEY FK_B5BA1F84A515F27A');
        $this->addSql('DROP INDEX UNIQ_B5BA1F84A515F27A ON musculation_session');
        $this->addSql('ALTER TABLE musculation_session DROP body_part_id');
    }
}
