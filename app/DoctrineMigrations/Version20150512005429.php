<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150512005429 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE standard CHANGE color1 color1 VARCHAR(20) DEFAULT NULL, CHANGE color2 color2 VARCHAR(20) DEFAULT NULL, CHANGE color3 color3 VARCHAR(20) DEFAULT NULL, CHANGE color4 color4 VARCHAR(20) DEFAULT NULL, CHANGE color5 color5 VARCHAR(20) DEFAULT NULL, CHANGE color7 color7 VARCHAR(20) DEFAULT NULL, CHANGE color8 color8 VARCHAR(20) DEFAULT NULL, CHANGE color9 color9 VARCHAR(20) DEFAULT NULL, CHANGE color10 color10 VARCHAR(20) DEFAULT NULL, CHANGE color11 color11 VARCHAR(20) DEFAULT NULL, CHANGE color12 color12 VARCHAR(20) DEFAULT NULL, CHANGE color13 color13 VARCHAR(20) DEFAULT NULL, CHANGE color14 color14 VARCHAR(20) DEFAULT NULL, CHANGE color15 color15 VARCHAR(20) DEFAULT NULL, CHANGE color16 color16 VARCHAR(20) DEFAULT NULL, CHANGE color17 color17 VARCHAR(20) DEFAULT NULL, CHANGE color18 color18 VARCHAR(20) DEFAULT NULL, CHANGE color19 color19 VARCHAR(20) DEFAULT NULL, CHANGE color20 color20 VARCHAR(20) DEFAULT NULL, CHANGE color21 color21 VARCHAR(20) DEFAULT NULL, CHANGE color22 color22 VARCHAR(20) DEFAULT NULL, CHANGE color23 color23 VARCHAR(20) DEFAULT NULL, CHANGE color24 color24 VARCHAR(20) DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE standard CHANGE color1 color1 VARCHAR(20) NOT NULL, CHANGE color2 color2 VARCHAR(20) NOT NULL, CHANGE color3 color3 VARCHAR(20) NOT NULL, CHANGE color4 color4 VARCHAR(20) NOT NULL, CHANGE color5 color5 VARCHAR(20) NOT NULL, CHANGE color7 color7 VARCHAR(20) NOT NULL, CHANGE color8 color8 VARCHAR(20) NOT NULL, CHANGE color9 color9 VARCHAR(20) NOT NULL, CHANGE color10 color10 VARCHAR(20) NOT NULL, CHANGE color11 color11 VARCHAR(20) NOT NULL, CHANGE color12 color12 VARCHAR(20) NOT NULL, CHANGE color13 color13 VARCHAR(20) NOT NULL, CHANGE color14 color14 VARCHAR(20) NOT NULL, CHANGE color15 color15 VARCHAR(20) NOT NULL, CHANGE color16 color16 VARCHAR(20) NOT NULL, CHANGE color17 color17 VARCHAR(20) NOT NULL, CHANGE color18 color18 VARCHAR(20) NOT NULL, CHANGE color19 color19 VARCHAR(20) NOT NULL, CHANGE color20 color20 VARCHAR(20) NOT NULL, CHANGE color21 color21 VARCHAR(20) NOT NULL, CHANGE color22 color22 VARCHAR(20) NOT NULL, CHANGE color23 color23 VARCHAR(20) NOT NULL, CHANGE color24 color24 VARCHAR(20) NOT NULL');
    }
}
