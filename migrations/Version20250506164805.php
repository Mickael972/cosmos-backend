<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250506164805 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, owner_id INT DEFAULT NULL, assigned_to_id INT DEFAULT NULL, system_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_AC74095A7E3C61F9 (owner_id), INDEX IDX_AC74095AF4BD7827 (assigned_to_id), INDEX IDX_AC74095AD0952FA5 (system_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE planet (id INT AUTO_INCREMENT NOT NULL, system_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, mass DOUBLE PRECISION NOT NULL, distance DOUBLE PRECISION NOT NULL, orbital_period DOUBLE PRECISION NOT NULL, INDEX IDX_68136AA5D0952FA5 (system_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE planet_system (id INT AUTO_INCREMENT NOT NULL, createdby_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, star_mass DOUBLE PRECISION NOT NULL, INDEX IDX_55501443F0B5AF0B (createdby_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE result (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, activity_id INT DEFAULT NULL, score DOUBLE PRECISION NOT NULL, ia_prediction JSON NOT NULL COMMENT '(DC2Type:json)', created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_136AC113A76ED395 (user_id), INDEX IDX_136AC11381C06096 (activity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles JSON NOT NULL COMMENT '(DC2Type:json)', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE activity ADD CONSTRAINT FK_AC74095A7E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE activity ADD CONSTRAINT FK_AC74095AF4BD7827 FOREIGN KEY (assigned_to_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE activity ADD CONSTRAINT FK_AC74095AD0952FA5 FOREIGN KEY (system_id) REFERENCES planet_system (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE planet ADD CONSTRAINT FK_68136AA5D0952FA5 FOREIGN KEY (system_id) REFERENCES planet_system (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE planet_system ADD CONSTRAINT FK_55501443F0B5AF0B FOREIGN KEY (createdby_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE result ADD CONSTRAINT FK_136AC113A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE result ADD CONSTRAINT FK_136AC11381C06096 FOREIGN KEY (activity_id) REFERENCES activity (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE activity DROP FOREIGN KEY FK_AC74095A7E3C61F9
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE activity DROP FOREIGN KEY FK_AC74095AF4BD7827
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE activity DROP FOREIGN KEY FK_AC74095AD0952FA5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE planet DROP FOREIGN KEY FK_68136AA5D0952FA5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE planet_system DROP FOREIGN KEY FK_55501443F0B5AF0B
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE result DROP FOREIGN KEY FK_136AC113A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE result DROP FOREIGN KEY FK_136AC11381C06096
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE activity
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE planet
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE planet_system
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE result
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE user
        SQL);
    }
}
