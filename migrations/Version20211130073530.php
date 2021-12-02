<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211130073530 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE consultation (id INT AUTO_INCREMENT NOT NULL, le_professionnel_id INT DEFAULT NULL, l_etablissement_id INT DEFAULT NULL, le_patient_id INT DEFAULT NULL, type_consultation VARCHAR(255) NOT NULL, motif_consultation VARCHAR(255) NOT NULL, tarif_consultation VARCHAR(255) NOT NULL, moyen_paiement VARCHAR(255) NOT NULL, INDEX IDX_964685A6B81BA208 (le_professionnel_id), INDEX IDX_964685A6364E836 (l_etablissement_id), INDEX IDX_964685A64889EDD2 (le_patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE diplome (id INT AUTO_INCREMENT NOT NULL, le_professionnel_id INT DEFAULT NULL, annee_diplome INT NOT NULL, description_diplome VARCHAR(255) NOT NULL, INDEX IDX_EB4C4D4EB81BA208 (le_professionnel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etablissement (id INT AUTO_INCREMENT NOT NULL, type_etablissement VARCHAR(255) NOT NULL, infos_pratiques VARCHAR(255) NOT NULL, nom_etablissement VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, le_professionnel_id INT DEFAULT NULL, annee_experience INT NOT NULL, description_experience VARCHAR(255) NOT NULL, INDEX IDX_590C103B81BA208 (le_professionnel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professionnel_de_sante (id INT NOT NULL, l_etablissement_id INT DEFAULT NULL, type_profession VARCHAR(255) NOT NULL, presentation VARCHAR(255) NOT NULL, langues_parlees VARCHAR(255) NOT NULL, INDEX IDX_D61F97A364E836 (l_etablissement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, sexe VARCHAR(255) NOT NULL, date_naissance DATETIME NOT NULL, numero_telephone VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, type VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A6B81BA208 FOREIGN KEY (le_professionnel_id) REFERENCES professionnel_de_sante (id)');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A6364E836 FOREIGN KEY (l_etablissement_id) REFERENCES etablissement (id)');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A64889EDD2 FOREIGN KEY (le_patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE diplome ADD CONSTRAINT FK_EB4C4D4EB81BA208 FOREIGN KEY (le_professionnel_id) REFERENCES professionnel_de_sante (id)');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C103B81BA208 FOREIGN KEY (le_professionnel_id) REFERENCES professionnel_de_sante (id)');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EBBF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE professionnel_de_sante ADD CONSTRAINT FK_D61F97A364E836 FOREIGN KEY (l_etablissement_id) REFERENCES etablissement (id)');
        $this->addSql('ALTER TABLE professionnel_de_sante ADD CONSTRAINT FK_D61F97ABF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A6364E836');
        $this->addSql('ALTER TABLE professionnel_de_sante DROP FOREIGN KEY FK_D61F97A364E836');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A64889EDD2');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A6B81BA208');
        $this->addSql('ALTER TABLE diplome DROP FOREIGN KEY FK_EB4C4D4EB81BA208');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C103B81BA208');
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EBBF396750');
        $this->addSql('ALTER TABLE professionnel_de_sante DROP FOREIGN KEY FK_D61F97ABF396750');
        $this->addSql('DROP TABLE consultation');
        $this->addSql('DROP TABLE diplome');
        $this->addSql('DROP TABLE etablissement');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE professionnel_de_sante');
        $this->addSql('DROP TABLE user');
    }
}
