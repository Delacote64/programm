<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230614081233 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD test VARCHAR(255) NOT NULL, CHANGE name name VARCHAR(255) NOT NULL, CHANGE surname surname VARCHAR(255) NOT NULL, CHANGE age age DATE NOT NULL, CHANGE sexe sexe VARCHAR(255) NOT NULL, CHANGE size size INT NOT NULL, CHANGE weight weight INT NOT NULL, CHANGE email email VARCHAR(255) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL, CHANGE created_at created_at VARCHAR(255) NOT NULL, CHANGE updated_at updated_at VARCHAR(255) NOT NULL, CHANGE media media VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP test, CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE surname surname VARCHAR(255) DEFAULT NULL, CHANGE age age DATE DEFAULT NULL, CHANGE sexe sexe VARCHAR(255) DEFAULT NULL, CHANGE size size INT DEFAULT NULL, CHANGE weight weight INT DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE password password VARCHAR(255) DEFAULT NULL, CHANGE created_at created_at VARCHAR(255) DEFAULT NULL, CHANGE updated_at updated_at VARCHAR(255) DEFAULT NULL, CHANGE media media VARCHAR(255) DEFAULT NULL');
    }
}
