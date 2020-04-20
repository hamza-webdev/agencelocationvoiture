<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200419180457 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE adresse CHANGE client_id client_id INT DEFAULT NULL, CHANGE numero numero INT DEFAULT NULL');
        $this->addSql('ALTER TABLE carecteristiques CHANGE modele_id modele_id INT DEFAULT NULL, CHANGE couleur couleur VARCHAR(255) DEFAULT NULL, CHANGE nbre_place nbre_place INT DEFAULT NULL, CHANGE energie energie VARCHAR(50) DEFAULT NULL, CHANGE boite_vitesse boite_vitesse VARCHAR(25) DEFAULT NULL, CHANGE puissance_fiscale puissance_fiscale VARCHAR(50) DEFAULT NULL, CHANGE date_enregistrement date_enregistrement DATETIME DEFAULT NULL, CHANGE moteur moteur VARCHAR(255) DEFAULT NULL, CHANGE descriptif descriptif VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE client CHANGE telephone telephone INT DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE num_passeport num_passeport VARCHAR(255) DEFAULT NULL, CHANGE pseudoname pseudoname VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE etat_maj_voiture CHANGE voiture_id voiture_id INT DEFAULT NULL, CHANGE descriptif_voiture descriptif_voiture VARCHAR(255) DEFAULT NULL, CHANGE date_controle date_controle DATETIME DEFAULT NULL, CHANGE etat_voiture etat_voiture TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE file_attachement_client CHANGE client_id client_id INT DEFAULT NULL, CHANGE permis_id permis_id INT DEFAULT NULL, CHANGE file_url file_url VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE file_attachement_voiture CHANGE voiture_id voiture_id INT DEFAULT NULL, CHANGE descriptif descriptif VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE modele CHANGE marque_id marque_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE permis CHANGE code_permis code_permis INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE voiture ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL, ADD thumbnail VARCHAR(255) NOT NULL, CHANGE marque_id marque_id INT DEFAULT NULL, CHANGE carecteristique_id carecteristique_id INT DEFAULT NULL, CHANGE descriptif descriptif VARCHAR(255) DEFAULT NULL, CHANGE date_enregistrement date_enregistrement DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE adresse CHANGE client_id client_id INT DEFAULT NULL, CHANGE numero numero INT DEFAULT NULL');
        $this->addSql('ALTER TABLE carecteristiques CHANGE modele_id modele_id INT DEFAULT NULL, CHANGE couleur couleur VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE nbre_place nbre_place INT DEFAULT NULL, CHANGE energie energie VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE boite_vitesse boite_vitesse VARCHAR(25) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE puissance_fiscale puissance_fiscale VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE date_enregistrement date_enregistrement DATETIME DEFAULT \'NULL\', CHANGE moteur moteur VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE descriptif descriptif VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE client CHANGE telephone telephone INT DEFAULT NULL, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE num_passeport num_passeport VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE pseudoname pseudoname VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE etat_maj_voiture CHANGE voiture_id voiture_id INT DEFAULT NULL, CHANGE descriptif_voiture descriptif_voiture VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE date_controle date_controle DATETIME DEFAULT \'NULL\', CHANGE etat_voiture etat_voiture TINYINT(1) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE file_attachement_client CHANGE client_id client_id INT DEFAULT NULL, CHANGE permis_id permis_id INT DEFAULT NULL, CHANGE file_url file_url VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE file_attachement_voiture CHANGE voiture_id voiture_id INT DEFAULT NULL, CHANGE descriptif descriptif VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE modele CHANGE marque_id marque_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE permis CHANGE code_permis code_permis INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
        $this->addSql('ALTER TABLE voiture DROP created_at, DROP updated_at, DROP thumbnail, CHANGE marque_id marque_id INT DEFAULT NULL, CHANGE carecteristique_id carecteristique_id INT DEFAULT NULL, CHANGE descriptif descriptif VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE date_enregistrement date_enregistrement DATETIME DEFAULT \'NULL\'');
    }
}
