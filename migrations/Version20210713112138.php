<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210713112138 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE arme_accessoire (arme_id INT NOT NULL, accessoire_id INT NOT NULL, INDEX IDX_DE0808C221D9C0A (arme_id), INDEX IDX_DE0808C2D23B67ED (accessoire_id), PRIMARY KEY(arme_id, accessoire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE arme_accessoire ADD CONSTRAINT FK_DE0808C221D9C0A FOREIGN KEY (arme_id) REFERENCES arme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE arme_accessoire ADD CONSTRAINT FK_DE0808C2D23B67ED FOREIGN KEY (accessoire_id) REFERENCES accessoire (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE arme_accessoire');
    }
}
