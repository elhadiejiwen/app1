<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200723110341 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE continent (id INT AUTO_INCREMENT NOT NULL, libele VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE continent_animeaux (continent_id INT NOT NULL, animeaux_id INT NOT NULL, INDEX IDX_BCBC79CB921F4C77 (continent_id), INDEX IDX_BCBC79CB92420A11 (animeaux_id), PRIMARY KEY(continent_id, animeaux_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE continent_animeaux ADD CONSTRAINT FK_BCBC79CB921F4C77 FOREIGN KEY (continent_id) REFERENCES continent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE continent_animeaux ADD CONSTRAINT FK_BCBC79CB92420A11 FOREIGN KEY (animeaux_id) REFERENCES animeaux (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animeaux ADD CONSTRAINT FK_A5C87701D335D67 FOREIGN KEY (familles_id) REFERENCES familles (id)');
        $this->addSql('CREATE INDEX IDX_A5C87701D335D67 ON animeaux (familles_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE continent_animeaux DROP FOREIGN KEY FK_BCBC79CB921F4C77');
        $this->addSql('DROP TABLE continent');
        $this->addSql('DROP TABLE continent_animeaux');
        $this->addSql('ALTER TABLE animeaux DROP FOREIGN KEY FK_A5C87701D335D67');
        $this->addSql('DROP INDEX IDX_A5C87701D335D67 ON animeaux');
    }
}
