<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211109143609 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consultation ADD le_professionnel_id INT DEFAULT NULL, ADD l_etablissement_id INT DEFAULT NULL, ADD le_patient_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A6B81BA208 FOREIGN KEY (le_professionnel_id) REFERENCES professionnel_de_sante (id)');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A6364E836 FOREIGN KEY (l_etablissement_id) REFERENCES etablissement (id)');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A64889EDD2 FOREIGN KEY (le_patient_id) REFERENCES patient (id)');
        $this->addSql('CREATE INDEX IDX_964685A6B81BA208 ON consultation (le_professionnel_id)');
        $this->addSql('CREATE INDEX IDX_964685A6364E836 ON consultation (l_etablissement_id)');
        $this->addSql('CREATE INDEX IDX_964685A64889EDD2 ON consultation (le_patient_id)');
        $this->addSql('ALTER TABLE diplome ADD le_professionnel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE diplome ADD CONSTRAINT FK_EB4C4D4EB81BA208 FOREIGN KEY (le_professionnel_id) REFERENCES professionnel_de_sante (id)');
        $this->addSql('CREATE INDEX IDX_EB4C4D4EB81BA208 ON diplome (le_professionnel_id)');
        $this->addSql('ALTER TABLE experience ADD le_professionnel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C103B81BA208 FOREIGN KEY (le_professionnel_id) REFERENCES professionnel_de_sante (id)');
        $this->addSql('CREATE INDEX IDX_590C103B81BA208 ON experience (le_professionnel_id)');
        $this->addSql('ALTER TABLE professionnel_de_sante ADD l_etablissement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE professionnel_de_sante ADD CONSTRAINT FK_D61F97A364E836 FOREIGN KEY (l_etablissement_id) REFERENCES etablissement (id)');
        $this->addSql('CREATE INDEX IDX_D61F97A364E836 ON professionnel_de_sante (l_etablissement_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A6B81BA208');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A6364E836');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A64889EDD2');
        $this->addSql('DROP INDEX IDX_964685A6B81BA208 ON consultation');
        $this->addSql('DROP INDEX IDX_964685A6364E836 ON consultation');
        $this->addSql('DROP INDEX IDX_964685A64889EDD2 ON consultation');
        $this->addSql('ALTER TABLE consultation DROP le_professionnel_id, DROP l_etablissement_id, DROP le_patient_id');
        $this->addSql('ALTER TABLE diplome DROP FOREIGN KEY FK_EB4C4D4EB81BA208');
        $this->addSql('DROP INDEX IDX_EB4C4D4EB81BA208 ON diplome');
        $this->addSql('ALTER TABLE diplome DROP le_professionnel_id');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C103B81BA208');
        $this->addSql('DROP INDEX IDX_590C103B81BA208 ON experience');
        $this->addSql('ALTER TABLE experience DROP le_professionnel_id');
        $this->addSql('ALTER TABLE professionnel_de_sante DROP FOREIGN KEY FK_D61F97A364E836');
        $this->addSql('DROP INDEX IDX_D61F97A364E836 ON professionnel_de_sante');
        $this->addSql('ALTER TABLE professionnel_de_sante DROP l_etablissement_id');
    }
}
