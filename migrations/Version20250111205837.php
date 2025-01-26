<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250111205837 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE manufacturer ADD country_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE manufacturer ADD CONSTRAINT FK_3D0AE6DCF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_3D0AE6DCF92F3E70 ON manufacturer (country_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE manufacturer DROP FOREIGN KEY FK_3D0AE6DCF92F3E70');
        $this->addSql('DROP INDEX IDX_3D0AE6DCF92F3E70 ON manufacturer');
        $this->addSql('ALTER TABLE manufacturer DROP country_id');
    }
}
