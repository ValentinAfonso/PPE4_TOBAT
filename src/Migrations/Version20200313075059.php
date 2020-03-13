<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200313075059 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bateau (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, nom_bateau VARCHAR(255) NOT NULL, immatriculation VARCHAR(255) NOT NULL, INDEX IDX_A664B05ABCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE budget (id INT AUTO_INCREMENT NOT NULL, tranche_budget VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_bateau (id INT AUTO_INCREMENT NOT NULL, nom_categ_bateau VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categ_social (id INT AUTO_INCREMENT NOT NULL, nom_categ_social VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enquete (id INT AUTO_INCREMENT NOT NULL, budget_id INT DEFAULT NULL, date_enquete DATE NOT NULL, revenir_annee_pro TINYINT(1) NOT NULL, raison_venue VARCHAR(255) NOT NULL, pass_vip TINYINT(1) NOT NULL, INDEX IDX_D6D86B2936ABA6B8 (budget_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tranche_age (id INT AUTO_INCREMENT NOT NULL, tranche_age VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visiteur (id INT AUTO_INCREMENT NOT NULL, tranche_age_id INT DEFAULT NULL, categ_sociale_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, sexe VARCHAR(20) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, code_postal INT DEFAULT NULL, INDEX IDX_4EA587B8A43AD6F0 (tranche_age_id), INDEX IDX_4EA587B88418967D (categ_sociale_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bateau ADD CONSTRAINT FK_A664B05ABCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie_bateau (id)');
        $this->addSql('ALTER TABLE enquete ADD CONSTRAINT FK_D6D86B2936ABA6B8 FOREIGN KEY (budget_id) REFERENCES budget (id)');
        $this->addSql('ALTER TABLE visiteur ADD CONSTRAINT FK_4EA587B8A43AD6F0 FOREIGN KEY (tranche_age_id) REFERENCES tranche_age (id)');
        $this->addSql('ALTER TABLE visiteur ADD CONSTRAINT FK_4EA587B88418967D FOREIGN KEY (categ_sociale_id) REFERENCES categ_social (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE enquete DROP FOREIGN KEY FK_D6D86B2936ABA6B8');
        $this->addSql('ALTER TABLE bateau DROP FOREIGN KEY FK_A664B05ABCF5E72D');
        $this->addSql('ALTER TABLE visiteur DROP FOREIGN KEY FK_4EA587B88418967D');
        $this->addSql('ALTER TABLE visiteur DROP FOREIGN KEY FK_4EA587B8A43AD6F0');
        $this->addSql('DROP TABLE bateau');
        $this->addSql('DROP TABLE budget');
        $this->addSql('DROP TABLE categorie_bateau');
        $this->addSql('DROP TABLE categ_social');
        $this->addSql('DROP TABLE enquete');
        $this->addSql('DROP TABLE tranche_age');
        $this->addSql('DROP TABLE visiteur');
    }
}
