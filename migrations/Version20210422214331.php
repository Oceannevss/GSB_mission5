<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210422214331 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE praticien ADD un_type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE praticien ADD CONSTRAINT FK_D9A27D3B36DCE1B FOREIGN KEY (un_type_id) REFERENCES type_praticien (id)');
        $this->addSql('CREATE INDEX IDX_D9A27D3B36DCE1B ON praticien (un_type_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE praticien DROP FOREIGN KEY FK_D9A27D3B36DCE1B');
        $this->addSql('DROP INDEX IDX_D9A27D3B36DCE1B ON praticien');
        $this->addSql('ALTER TABLE praticien DROP un_type_id');
    }
}
