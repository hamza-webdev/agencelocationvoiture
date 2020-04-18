<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200418171051 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, numero INT DEFAULT NULL, adresse VARCHAR(255) NOT NULL, cp INT NOT NULL, ville VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C35F081619EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carecteristiques (id INT AUTO_INCREMENT NOT NULL, modele_id INT DEFAULT NULL, version VARCHAR(255) NOT NULL, couleur VARCHAR(255) DEFAULT NULL, nbre_place INT DEFAULT NULL, energie VARCHAR(50) DEFAULT NULL, boite_vitesse VARCHAR(25) DEFAULT NULL, puissance_fiscale VARCHAR(50) DEFAULT NULL, date_enregistrement DATETIME DEFAULT NULL, moteur VARCHAR(255) DEFAULT NULL, descriptif VARCHAR(255) DEFAULT NULL, INDEX IDX_A10CB08BAC14B70A (modele_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, telephone INT DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, cin INT NOT NULL, num_passeport VARCHAR(255) DEFAULT NULL, pseudoname VARCHAR(255) DEFAULT NULL, date_inscription DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etat_maj_voiture (id INT AUTO_INCREMENT NOT NULL, voiture_id INT DEFAULT NULL, date_enregistrement DATETIME NOT NULL, kilometrage INT NOT NULL, descriptif_voiture VARCHAR(255) DEFAULT NULL, date_controle DATETIME DEFAULT NULL, etat_voiture TINYINT(1) DEFAULT NULL, INDEX IDX_9253196B181A8BA (voiture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE file_attachement_client (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, permis_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, file_url VARCHAR(255) DEFAULT NULL, INDEX IDX_71A217E619EB6921 (client_id), UNIQUE INDEX UNIQ_71A217E63594A24E (permis_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE file_attachement_voiture (id INT AUTO_INCREMENT NOT NULL, voiture_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, file_url VARCHAR(255) NOT NULL, date_enregistrement DATETIME NOT NULL, descriptif VARCHAR(255) DEFAULT NULL, INDEX IDX_BB3C852A181A8BA (voiture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marque (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modele (id INT AUTO_INCREMENT NOT NULL, marque_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_100285584827B9B2 (marque_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE permis (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, numero VARCHAR(255) NOT NULL, code_permis INT DEFAULT NULL, date_delivrance DATE NOT NULL, date_expiration DATE NOT NULL, type_vehicule VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1738945319EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voiture (id INT AUTO_INCREMENT NOT NULL, marque_id INT DEFAULT NULL, carecteristique_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, descriptif VARCHAR(255) DEFAULT NULL, numero_plaque VARCHAR(255) NOT NULL, date_enregistrement DATETIME DEFAULT NULL, INDEX IDX_E9E2810F4827B9B2 (marque_id), UNIQUE INDEX UNIQ_E9E2810F9D788BD4 (carecteristique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adresse ADD CONSTRAINT FK_C35F081619EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE carecteristiques ADD CONSTRAINT FK_A10CB08BAC14B70A FOREIGN KEY (modele_id) REFERENCES modele (id)');
        $this->addSql('ALTER TABLE etat_maj_voiture ADD CONSTRAINT FK_9253196B181A8BA FOREIGN KEY (voiture_id) REFERENCES voiture (id)');
        $this->addSql('ALTER TABLE file_attachement_client ADD CONSTRAINT FK_71A217E619EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE file_attachement_client ADD CONSTRAINT FK_71A217E63594A24E FOREIGN KEY (permis_id) REFERENCES permis (id)');
        $this->addSql('ALTER TABLE file_attachement_voiture ADD CONSTRAINT FK_BB3C852A181A8BA FOREIGN KEY (voiture_id) REFERENCES voiture (id)');
        $this->addSql('ALTER TABLE modele ADD CONSTRAINT FK_100285584827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE permis ADD CONSTRAINT FK_1738945319EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE voiture ADD CONSTRAINT FK_E9E2810F4827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE voiture ADD CONSTRAINT FK_E9E2810F9D788BD4 FOREIGN KEY (carecteristique_id) REFERENCES carecteristiques (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE voiture DROP FOREIGN KEY FK_E9E2810F9D788BD4');
        $this->addSql('ALTER TABLE adresse DROP FOREIGN KEY FK_C35F081619EB6921');
        $this->addSql('ALTER TABLE file_attachement_client DROP FOREIGN KEY FK_71A217E619EB6921');
        $this->addSql('ALTER TABLE permis DROP FOREIGN KEY FK_1738945319EB6921');
        $this->addSql('ALTER TABLE modele DROP FOREIGN KEY FK_100285584827B9B2');
        $this->addSql('ALTER TABLE voiture DROP FOREIGN KEY FK_E9E2810F4827B9B2');
        $this->addSql('ALTER TABLE carecteristiques DROP FOREIGN KEY FK_A10CB08BAC14B70A');
        $this->addSql('ALTER TABLE file_attachement_client DROP FOREIGN KEY FK_71A217E63594A24E');
        $this->addSql('ALTER TABLE etat_maj_voiture DROP FOREIGN KEY FK_9253196B181A8BA');
        $this->addSql('ALTER TABLE file_attachement_voiture DROP FOREIGN KEY FK_BB3C852A181A8BA');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE carecteristiques');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE etat_maj_voiture');
        $this->addSql('DROP TABLE file_attachement_client');
        $this->addSql('DROP TABLE file_attachement_voiture');
        $this->addSql('DROP TABLE marque');
        $this->addSql('DROP TABLE modele');
        $this->addSql('DROP TABLE permis');
        $this->addSql('DROP TABLE voiture');
    }
}
