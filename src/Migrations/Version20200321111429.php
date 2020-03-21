<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200321111429 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bateau CHANGE categorie_id categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE enquete ADD visiteur_id INT DEFAULT NULL, CHANGE budget_id budget_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE enquete ADD CONSTRAINT FK_D6D86B297F72333D FOREIGN KEY (visiteur_id) REFERENCES visiteur (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D6D86B297F72333D ON enquete (visiteur_id)');
        $this->addSql('ALTER TABLE visiteur CHANGE tranche_age_id tranche_age_id INT DEFAULT NULL, CHANGE categ_sociale_id categ_sociale_id INT DEFAULT NULL, CHANGE nom nom VARCHAR(255) DEFAULT NULL, CHANGE prenom prenom VARCHAR(255) DEFAULT NULL, CHANGE sexe sexe VARCHAR(20) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE code_postal code_postal INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bateau CHANGE categorie_id categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE enquete DROP FOREIGN KEY FK_D6D86B297F72333D');
        $this->addSql('DROP INDEX UNIQ_D6D86B297F72333D ON enquete');
        $this->addSql('ALTER TABLE enquete DROP visiteur_id, CHANGE budget_id budget_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE visiteur CHANGE tranche_age_id tranche_age_id INT DEFAULT NULL, CHANGE categ_sociale_id categ_sociale_id INT DEFAULT NULL, CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE sexe sexe VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE code_postal code_postal INT DEFAULT NULL');
    }
}
