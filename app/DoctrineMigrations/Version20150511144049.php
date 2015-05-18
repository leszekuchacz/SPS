<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150511144049 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE histori DROP INDEX IDX_3A0D602F6B3CA4B, ADD UNIQUE INDEX UNIQ_3A0D602F6B3CA4B (id_user)');
        $this->addSql('ALTER TABLE histori ADD id_region INT DEFAULT NULL, ADD id_mufa INT DEFAULT NULL, ADD id_kabel INT DEFAULT NULL, ADD id_wlokno INT DEFAULT NULL');
        $this->addSql('ALTER TABLE histori ADD CONSTRAINT FK_3A0D602F2955449B FOREIGN KEY (id_region) REFERENCES rejon (id)');
        $this->addSql('ALTER TABLE histori ADD CONSTRAINT FK_3A0D602F3800DB94 FOREIGN KEY (id_mufa) REFERENCES mufa (id)');
        $this->addSql('ALTER TABLE histori ADD CONSTRAINT FK_3A0D602F5202CDC8 FOREIGN KEY (id_kabel) REFERENCES kabel (id)');
        $this->addSql('ALTER TABLE histori ADD CONSTRAINT FK_3A0D602FDCA44A0F FOREIGN KEY (id_wlokno) REFERENCES wlokno (id)');
        $this->addSql('CREATE INDEX IDX_3A0D602F2955449B ON histori (id_region)');
        $this->addSql('CREATE INDEX IDX_3A0D602F3800DB94 ON histori (id_mufa)');
        $this->addSql('CREATE INDEX IDX_3A0D602F5202CDC8 ON histori (id_kabel)');
        $this->addSql('CREATE INDEX IDX_3A0D602FDCA44A0F ON histori (id_wlokno)');
        $this->addSql('ALTER TABLE kabel DROP FOREIGN KEY FK_BC878CF8E490C95F');
        $this->addSql('DROP INDEX UNIQ_BC878CF8E490C95F ON kabel');
        $this->addSql('ALTER TABLE kabel DROP id_histori');
        $this->addSql('ALTER TABLE mufa DROP FOREIGN KEY FK_B320C796E490C95F');
        $this->addSql('DROP INDEX IDX_B320C796E490C95F ON mufa');
        $this->addSql('ALTER TABLE mufa DROP id_histori');
        $this->addSql('ALTER TABLE rejon DROP FOREIGN KEY FK_44E73642E490C95F');
        $this->addSql('DROP INDEX UNIQ_44E73642E490C95F ON rejon');
        $this->addSql('ALTER TABLE rejon DROP id_histori');
        $this->addSql('ALTER TABLE wlokno DROP FOREIGN KEY FK_FA93FFE2E490C95F');
        $this->addSql('DROP INDEX UNIQ_FA93FFE2E490C95F ON wlokno');
        $this->addSql('ALTER TABLE wlokno DROP id_histori');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE histori DROP INDEX UNIQ_3A0D602F6B3CA4B, ADD INDEX IDX_3A0D602F6B3CA4B (id_user)');
        $this->addSql('ALTER TABLE histori DROP FOREIGN KEY FK_3A0D602F2955449B');
        $this->addSql('ALTER TABLE histori DROP FOREIGN KEY FK_3A0D602F3800DB94');
        $this->addSql('ALTER TABLE histori DROP FOREIGN KEY FK_3A0D602F5202CDC8');
        $this->addSql('ALTER TABLE histori DROP FOREIGN KEY FK_3A0D602FDCA44A0F');
        $this->addSql('DROP INDEX IDX_3A0D602F2955449B ON histori');
        $this->addSql('DROP INDEX IDX_3A0D602F3800DB94 ON histori');
        $this->addSql('DROP INDEX IDX_3A0D602F5202CDC8 ON histori');
        $this->addSql('DROP INDEX IDX_3A0D602FDCA44A0F ON histori');
        $this->addSql('ALTER TABLE histori DROP id_region, DROP id_mufa, DROP id_kabel, DROP id_wlokno');
        $this->addSql('ALTER TABLE kabel ADD id_histori INT DEFAULT NULL');
        $this->addSql('ALTER TABLE kabel ADD CONSTRAINT FK_BC878CF8E490C95F FOREIGN KEY (id_histori) REFERENCES histori (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BC878CF8E490C95F ON kabel (id_histori)');
        $this->addSql('ALTER TABLE mufa ADD id_histori INT DEFAULT NULL');
        $this->addSql('ALTER TABLE mufa ADD CONSTRAINT FK_B320C796E490C95F FOREIGN KEY (id_histori) REFERENCES histori (id)');
        $this->addSql('CREATE INDEX IDX_B320C796E490C95F ON mufa (id_histori)');
        $this->addSql('ALTER TABLE rejon ADD id_histori INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rejon ADD CONSTRAINT FK_44E73642E490C95F FOREIGN KEY (id_histori) REFERENCES histori (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_44E73642E490C95F ON rejon (id_histori)');
        $this->addSql('ALTER TABLE wlokno ADD id_histori INT DEFAULT NULL');
        $this->addSql('ALTER TABLE wlokno ADD CONSTRAINT FK_FA93FFE2E490C95F FOREIGN KEY (id_histori) REFERENCES histori (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FA93FFE2E490C95F ON wlokno (id_histori)');
    }
}
