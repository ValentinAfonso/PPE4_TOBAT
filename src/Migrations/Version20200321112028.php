<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200321112028 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE enquete_bateau (enquete_id INT NOT NULL, bateau_id INT NOT NULL, INDEX IDX_DDFB06D25FDC5003 (enquete_id), INDEX IDX_DDFB06D2A9706509 (bateau_id), PRIMARY KEY(enquete_id, bateau_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE enquete_bateau ADD CONSTRAINT FK_DDFB06D25FDC5003 FOREIGN KEY (enquete_id) REFERENCES enquete (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE enquete_bateau ADD CONSTRAINT FK_DDFB06D2A9706509 FOREIGN KEY (bateau_id) REFERENCES bateau (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bateau CHANGE categorie_id categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE enquete CHANGE budget_id budget_id INT DEFAULT NULL, CHANGE visiteur_id visiteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE visiteur CHANGE tranche_age_id tranche_age_id INT DEFAULT NULL, CHANGE categ_sociale_id categ_sociale_id INT DEFAULT NULL, CHANGE nom nom VARCHAR(255) DEFAULT NULL, CHANGE prenom prenom VARCHAR(255) DEFAULT NULL, CHANGE sexe sexe VARCHAR(20) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE code_postal code_postal INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE enquete_bateau');
        $this->addSql('ALTER TABLE bateau CHANGE categorie_id categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE enquete CHANGE budget_id budget_id INT DEFAULT NULL, CHANGE visiteur_id visiteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE visiteur CHANGE tranche_age_id tranche_age_id INT DEFAULT NULL, CHANGE categ_sociale_id categ_sociale_id INT DEFAULT NULL, CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE sexe sexe VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE code_postal code_postal INT DEFAULT NULL');
    }
}
