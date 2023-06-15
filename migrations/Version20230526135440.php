<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230526135440 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE test');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D462E6FA33');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D49D86650F');
        $this->addSql('DROP INDEX IDX_D044D5D49D86650F ON session');
        $this->addSql('DROP INDEX UNIQ_D044D5D462E6FA33 ON session');
        $this->addSql('ALTER TABLE session CHANGE user_id_id user_id INT NOT NULL, CHANGE seancetype_id_id sessiontype_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D453146149 FOREIGN KEY (sessiontype_id) REFERENCES session_type (id)');
        $this->addSql('CREATE INDEX IDX_D044D5D4A76ED395 ON session (user_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D044D5D453146149 ON session (sessiontype_id)');
        $this->addSql('ALTER TABLE user CHANGE name name VARCHAR(255) NOT NULL, CHANGE surname surname VARCHAR(255) NOT NULL, CHANGE age age DATE NOT NULL, CHANGE sexe sexe VARCHAR(255) NOT NULL, CHANGE size size INT NOT NULL, CHANGE weight weight INT NOT NULL, CHANGE email email VARCHAR(255) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D4A76ED395');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D453146149');
        $this->addSql('DROP INDEX IDX_D044D5D4A76ED395 ON session');
        $this->addSql('DROP INDEX UNIQ_D044D5D453146149 ON session');
        $this->addSql('ALTER TABLE session CHANGE user_id user_id_id INT NOT NULL, CHANGE sessiontype_id seancetype_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D462E6FA33 FOREIGN KEY (seancetype_id_id) REFERENCES session_type (id)');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D49D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D044D5D49D86650F ON session (user_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D044D5D462E6FA33 ON session (seancetype_id_id)');
        $this->addSql('ALTER TABLE user CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE surname surname VARCHAR(255) DEFAULT NULL, CHANGE age age DATE DEFAULT NULL, CHANGE sexe sexe VARCHAR(255) DEFAULT NULL, CHANGE size size INT DEFAULT NULL, CHANGE weight weight INT DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE password password VARCHAR(255) DEFAULT NULL');
    }
}
