<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231017113518 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE companion ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE companion ADD CONSTRAINT FK_1BAD2E69A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_1BAD2E69A76ED395 ON companion (user_id)');
        $this->addSql('ALTER TABLE user ADD adress_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6498486F9AC FOREIGN KEY (adress_id) REFERENCES adress (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6498486F9AC ON user (adress_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE companion DROP FOREIGN KEY FK_1BAD2E69A76ED395');
        $this->addSql('DROP INDEX IDX_1BAD2E69A76ED395 ON companion');
        $this->addSql('ALTER TABLE companion DROP user_id');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D6498486F9AC');
        $this->addSql('DROP INDEX IDX_8D93D6498486F9AC ON `user`');
        $this->addSql('ALTER TABLE `user` DROP adress_id');
    }
}
