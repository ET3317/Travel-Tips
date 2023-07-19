<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230718132726 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tips (id INT AUTO_INCREMENT NOT NULL, city_id INT NOT NULL, country_id INT NOT NULL, continent_id INT NOT NULL, category_id INT NOT NULL, user_id INT NOT NULL, title VARCHAR(50) NOT NULL, text VARCHAR(400) NOT NULL, picture VARCHAR(255) NOT NULL, INDEX IDX_642C41088BAC62AF (city_id), INDEX IDX_642C4108F92F3E70 (country_id), INDEX IDX_642C4108921F4C77 (continent_id), INDEX IDX_642C410812469DE2 (category_id), INDEX IDX_642C4108A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tips ADD CONSTRAINT FK_642C41088BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE tips ADD CONSTRAINT FK_642C4108F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE tips ADD CONSTRAINT FK_642C4108921F4C77 FOREIGN KEY (continent_id) REFERENCES continent (id)');
        $this->addSql('ALTER TABLE tips ADD CONSTRAINT FK_642C410812469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE tips ADD CONSTRAINT FK_642C4108A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tips DROP FOREIGN KEY FK_642C41088BAC62AF');
        $this->addSql('ALTER TABLE tips DROP FOREIGN KEY FK_642C4108F92F3E70');
        $this->addSql('ALTER TABLE tips DROP FOREIGN KEY FK_642C4108921F4C77');
        $this->addSql('ALTER TABLE tips DROP FOREIGN KEY FK_642C410812469DE2');
        $this->addSql('ALTER TABLE tips DROP FOREIGN KEY FK_642C4108A76ED395');
        $this->addSql('DROP TABLE tips');
    }
}
