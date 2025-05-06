<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250430084714 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, ref_modele_id INT DEFAULT NULL, user_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email LONGTEXT NOT NULL, mdp VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, ville VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, INDEX IDX_1D1C63B3DF4EB64F (ref_modele_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3DF4EB64F FOREIGN KEY (ref_modele_id) REFERENCES modele (id)');
        $this->addSql('ALTER TABLE avion ADD ref_modele_id INT NOT NULL');
        $this->addSql('ALTER TABLE avion ADD CONSTRAINT FK_234D9D38DF4EB64F FOREIGN KEY (ref_modele_id) REFERENCES modele (id)');
        $this->addSql('CREATE INDEX IDX_234D9D38DF4EB64F ON avion (ref_modele_id)');
        $this->addSql('ALTER TABLE vol ADD ref_avion_id INT NOT NULL');
        $this->addSql('ALTER TABLE vol ADD CONSTRAINT FK_95C97EB6AC7EC6 FOREIGN KEY (ref_avion_id) REFERENCES avion (id)');
        $this->addSql('CREATE INDEX IDX_95C97EB6AC7EC6 ON vol (ref_avion_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3DF4EB64F');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('ALTER TABLE avion DROP FOREIGN KEY FK_234D9D38DF4EB64F');
        $this->addSql('DROP INDEX IDX_234D9D38DF4EB64F ON avion');
        $this->addSql('ALTER TABLE avion DROP ref_modele_id');
        $this->addSql('ALTER TABLE vol DROP FOREIGN KEY FK_95C97EB6AC7EC6');
        $this->addSql('DROP INDEX IDX_95C97EB6AC7EC6 ON vol');
        $this->addSql('ALTER TABLE vol DROP ref_avion_id');
    }
}
