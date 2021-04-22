<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210422213245 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rapport_visite ADD un_visiteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rapport_visite ADD CONSTRAINT FK_D1D74171117835AD FOREIGN KEY (un_visiteur_id) REFERENCES visiteur (id)');
        $this->addSql('CREATE INDEX IDX_D1D74171117835AD ON rapport_visite (un_visiteur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rapport_visite DROP FOREIGN KEY FK_D1D74171117835AD');
        $this->addSql('DROP INDEX IDX_D1D74171117835AD ON rapport_visite');
        $this->addSql('ALTER TABLE rapport_visite DROP un_visiteur_id');
    }
}
