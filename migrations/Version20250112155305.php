<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250112155305 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE manufacturers_to_electronic_categories (manufacturer_id INT NOT NULL, electronic_category_id INT NOT NULL, INDEX IDX_10B58904A23B42D (manufacturer_id), INDEX IDX_10B58904F5352B0C (electronic_category_id), PRIMARY KEY(manufacturer_id, electronic_category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE manufacturers_to_electronic_categories ADD CONSTRAINT FK_10B58904A23B42D FOREIGN KEY (manufacturer_id) REFERENCES manufacturer (id)');
        $this->addSql('ALTER TABLE manufacturers_to_electronic_categories ADD CONSTRAINT FK_10B58904F5352B0C FOREIGN KEY (electronic_category_id) REFERENCES electronic_category (id)');
        $this->addSql('ALTER TABLE electronic_category ADD title_ua VARCHAR(255) NOT NULL, CHANGE title title_eng VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE manufacturers_to_electronic_categories DROP FOREIGN KEY FK_10B58904A23B42D');
        $this->addSql('ALTER TABLE manufacturers_to_electronic_categories DROP FOREIGN KEY FK_10B58904F5352B0C');
        $this->addSql('DROP TABLE manufacturers_to_electronic_categories');
        $this->addSql('ALTER TABLE electronic_category ADD title VARCHAR(255) NOT NULL, DROP title_eng, DROP title_ua');
    }
}
