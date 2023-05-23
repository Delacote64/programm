<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230522101819 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE body_part (id INT AUTO_INCREMENT NOT NULL, exercices_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, exemple_exercice LONGTEXT NOT NULL, INDEX IDX_1C8BCCA4192C7251 (exercices_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exercices (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exercises_session (id INT AUTO_INCREMENT NOT NULL, seance_id_id INT DEFAULT NULL, exercise_id_id INT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_C6A5E5F660528D1B (seance_id_id), UNIQUE INDEX UNIQ_C6A5E5F65A726995 (exercise_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seance_type (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, seancetype_id_id INT DEFAULT NULL, day DATETIME NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_D044D5D49D86650F (user_id_id), UNIQUE INDEX UNIQ_D044D5D462E6FA33 (seancetype_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, age INT NOT NULL, sexe TINYINT(1) NOT NULL, size INT NOT NULL, weight INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE body_part ADD CONSTRAINT FK_1C8BCCA4192C7251 FOREIGN KEY (exercices_id) REFERENCES exercices (id)');
        $this->addSql('ALTER TABLE exercises_session ADD CONSTRAINT FK_C6A5E5F660528D1B FOREIGN KEY (seance_id_id) REFERENCES session (id)');
        $this->addSql('ALTER TABLE exercises_session ADD CONSTRAINT FK_C6A5E5F65A726995 FOREIGN KEY (exercise_id_id) REFERENCES exercices (id)');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D49D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D462E6FA33 FOREIGN KEY (seancetype_id_id) REFERENCES seance_type (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE body_part DROP FOREIGN KEY FK_1C8BCCA4192C7251');
        $this->addSql('ALTER TABLE exercises_session DROP FOREIGN KEY FK_C6A5E5F660528D1B');
        $this->addSql('ALTER TABLE exercises_session DROP FOREIGN KEY FK_C6A5E5F65A726995');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D49D86650F');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D462E6FA33');
        $this->addSql('DROP TABLE body_part');
        $this->addSql('DROP TABLE exercices');
        $this->addSql('DROP TABLE exercises_session');
        $this->addSql('DROP TABLE seance_type');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
