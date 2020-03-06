<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200306103704 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bateau (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, exposant_id INT NOT NULL, nom_bateau VARCHAR(255) NOT NULL, immatriculation VARCHAR(255) NOT NULL, INDEX IDX_A664B05ABCF5E72D (categorie_id), INDEX IDX_A664B05A1385CBB4 (exposant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom_categ VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enquete (id INT AUTO_INCREMENT NOT NULL, visiteur_id INT NOT NULL, date_enquete DATE NOT NULL, categ_sociale VARCHAR(255) DEFAULT NULL, budget_achat INT DEFAULT NULL, revenir_annee_pro TINYINT(1) DEFAULT NULL, raison_venue VARCHAR(255) DEFAULT NULL, pass_vip TINYINT(1) NOT NULL, INDEX IDX_D6D86B297F72333D (visiteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exposant (id INT AUTO_INCREMENT NOT NULL, nom_exposant VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visiteur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(32) NOT NULL, prenom VARCHAR(32) NOT NULL, date_naissance DATE NOT NULL, sexe VARCHAR(20) NOT NULL, email VARCHAR(255) NOT NULL, code_postal INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bateau ADD CONSTRAINT FK_A664B05ABCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE bateau ADD CONSTRAINT FK_A664B05A1385CBB4 FOREIGN KEY (exposant_id) REFERENCES exposant (id)');
        $this->addSql('ALTER TABLE enquete ADD CONSTRAINT FK_D6D86B297F72333D FOREIGN KEY (visiteur_id) REFERENCES visiteur (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bateau DROP FOREIGN KEY FK_A664B05ABCF5E72D');
        $this->addSql('ALTER TABLE bateau DROP FOREIGN KEY FK_A664B05A1385CBB4');
        $this->addSql('ALTER TABLE enquete DROP FOREIGN KEY FK_D6D86B297F72333D');
        $this->addSql('DROP TABLE bateau');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE enquete');
        $this->addSql('DROP TABLE exposant');
        $this->addSql('DROP TABLE visiteur');
    }
}
