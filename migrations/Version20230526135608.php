<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230526135608 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exercises_session DROP FOREIGN KEY FK_C6A5E5F660528D1B');
        $this->addSql('ALTER TABLE exercises_session DROP FOREIGN KEY FK_C6A5E5F65A726995');
        $this->addSql('DROP INDEX UNIQ_C6A5E5F660528D1B ON exercises_session');
        $this->addSql('DROP INDEX UNIQ_C6A5E5F65A726995 ON exercises_session');
        $this->addSql('ALTER TABLE exercises_session ADD seance_id INT DEFAULT NULL, ADD exercise_id INT DEFAULT NULL, DROP seance_id_id, DROP exercise_id_id');
        $this->addSql('ALTER TABLE exercises_session ADD CONSTRAINT FK_C6A5E5F6E3797A94 FOREIGN KEY (seance_id) REFERENCES session (id)');
        $this->addSql('ALTER TABLE exercises_session ADD CONSTRAINT FK_C6A5E5F6E934951A FOREIGN KEY (exercise_id) REFERENCES exercices (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C6A5E5F6E3797A94 ON exercises_session (seance_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C6A5E5F6E934951A ON exercises_session (exercise_id)');
        $this->addSql('ALTER TABLE user CHANGE name name VARCHAR(255) NOT NULL, CHANGE surname surname VARCHAR(255) NOT NULL, CHANGE age age DATE NOT NULL, CHANGE sexe sexe VARCHAR(255) NOT NULL, CHANGE size size INT NOT NULL, CHANGE weight weight INT NOT NULL, CHANGE email email VARCHAR(255) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exercises_session DROP FOREIGN KEY FK_C6A5E5F6E3797A94');
        $this->addSql('ALTER TABLE exercises_session DROP FOREIGN KEY FK_C6A5E5F6E934951A');
        $this->addSql('DROP INDEX UNIQ_C6A5E5F6E3797A94 ON exercises_session');
        $this->addSql('DROP INDEX UNIQ_C6A5E5F6E934951A ON exercises_session');
        $this->addSql('ALTER TABLE exercises_session ADD seance_id_id INT DEFAULT NULL, ADD exercise_id_id INT DEFAULT NULL, DROP seance_id, DROP exercise_id');
        $this->addSql('ALTER TABLE exercises_session ADD CONSTRAINT FK_C6A5E5F660528D1B FOREIGN KEY (seance_id_id) REFERENCES session (id)');
        $this->addSql('ALTER TABLE exercises_session ADD CONSTRAINT FK_C6A5E5F65A726995 FOREIGN KEY (exercise_id_id) REFERENCES exercices (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C6A5E5F660528D1B ON exercises_session (seance_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C6A5E5F65A726995 ON exercises_session (exercise_id_id)');
        $this->addSql('ALTER TABLE user CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE surname surname VARCHAR(255) DEFAULT NULL, CHANGE age age DATE DEFAULT NULL, CHANGE sexe sexe VARCHAR(255) DEFAULT NULL, CHANGE size size INT DEFAULT NULL, CHANGE weight weight INT DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE password password VARCHAR(255) DEFAULT NULL');
    }
}
