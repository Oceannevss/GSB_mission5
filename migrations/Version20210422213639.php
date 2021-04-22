<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210422213639 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE visiteur ADD un_praticien_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE visiteur ADD CONSTRAINT FK_4EA587B8D3F01F29 FOREIGN KEY (un_praticien_id) REFERENCES praticien (id)');
        $this->addSql('CREATE INDEX IDX_4EA587B8D3F01F29 ON visiteur (un_praticien_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE visiteur DROP FOREIGN KEY FK_4EA587B8D3F01F29');
        $this->addSql('DROP INDEX IDX_4EA587B8D3F01F29 ON visiteur');
        $this->addSql('ALTER TABLE visiteur DROP un_praticien_id');
    }
}
