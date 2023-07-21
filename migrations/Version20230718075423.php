<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230718075423 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE body_part (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, exemple_exercice LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exercise_session (id INT AUTO_INCREMENT NOT NULL, session_id INT DEFAULT NULL, exercises_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_A512291613FECDF (session_id), UNIQUE INDEX UNIQ_A5122911AFA70CA (exercises_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exercises (id INT AUTO_INCREMENT NOT NULL, session_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, serie INT NOT NULL, repetition INT NOT NULL, weight INT NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_FA14991613FECDF (session_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, sessiontype_id INT DEFAULT NULL, day DATETIME NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', title_exercise VARCHAR(255) NOT NULL, repetiton INT NOT NULL, weight INT NOT NULL, break VARCHAR(255) NOT NULL COMMENT \'(DC2Type:dateinterval)\', time_exercise VARCHAR(255) NOT NULL COMMENT \'(DC2Type:dateinterval)\', INDEX IDX_D044D5D4A76ED395 (user_id), UNIQUE INDEX UNIQ_D044D5D453146149 (sessiontype_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_type (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, user_login_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, surname VARCHAR(255) DEFAULT NULL, age DATE DEFAULT NULL, sexe VARCHAR(255) DEFAULT NULL, size INT DEFAULT NULL, weight INT DEFAULT NULL, created_at VARCHAR(255) DEFAULT NULL, updated_at VARCHAR(255) DEFAULT NULL, media VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649BC3F045D (user_login_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_login (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE exercise_session ADD CONSTRAINT FK_A512291613FECDF FOREIGN KEY (session_id) REFERENCES session (id)');
        $this->addSql('ALTER TABLE exercise_session ADD CONSTRAINT FK_A5122911AFA70CA FOREIGN KEY (exercises_id) REFERENCES exercises (id)');
        $this->addSql('ALTER TABLE exercises ADD CONSTRAINT FK_FA14991613FECDF FOREIGN KEY (session_id) REFERENCES session (id)');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D453146149 FOREIGN KEY (sessiontype_id) REFERENCES session_type (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649BC3F045D FOREIGN KEY (user_login_id) REFERENCES user_login (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exercise_session DROP FOREIGN KEY FK_A512291613FECDF');
        $this->addSql('ALTER TABLE exercise_session DROP FOREIGN KEY FK_A5122911AFA70CA');
        $this->addSql('ALTER TABLE exercises DROP FOREIGN KEY FK_FA14991613FECDF');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D4A76ED395');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D453146149');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649BC3F045D');
        $this->addSql('DROP TABLE body_part');
        $this->addSql('DROP TABLE exercise_session');
        $this->addSql('DROP TABLE exercises');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE session_type');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_login');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
