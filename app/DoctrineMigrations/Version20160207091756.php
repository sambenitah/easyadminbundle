<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20160207091756 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE genus_note ADD genus_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE genus_note ADD CONSTRAINT FK_6478FCEC85C4074C FOREIGN KEY (genus_id) REFERENCES genus (id)");
        $this->addSql("CREATE INDEX IDX_6478FCEC85C4074C ON genus_note (genus_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE genus_note DROP FOREIGN KEY FK_6478FCEC85C4074C");
        $this->addSql("DROP INDEX IDX_6478FCEC85C4074C ON genus_note");
        $this->addSql("ALTER TABLE genus_note DROP genus_id");
    }
}