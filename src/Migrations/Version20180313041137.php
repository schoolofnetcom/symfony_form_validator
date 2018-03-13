<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180313041137 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE candidatos (id INT AUTO_INCREMENT NOT NULL, cargo_id INT DEFAULT NULL, endereco_id INT DEFAULT NULL, nome VARCHAR(255) NOT NULL, idade INT NOT NULL, sexo VARCHAR(1) NOT NULL, data_nascimento DATE NOT NULL, pretensao_salarial NUMERIC(2, 0) NOT NULL, foto VARCHAR(255) NOT NULL, INDEX IDX_90981086813AC380 (cargo_id), INDEX IDX_909810861BB76823 (endereco_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidatos_tecnologias (candidato_id INT NOT NULL, tecnologia_id INT NOT NULL, INDEX IDX_98D23093FE0067E5 (candidato_id), INDEX IDX_98D2309321F9EE65 (tecnologia_id), PRIMARY KEY(candidato_id, tecnologia_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidatura (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cargos (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enderecos (id INT AUTO_INCREMENT NOT NULL, rua VARCHAR(255) NOT NULL, numero VARCHAR(255) NOT NULL, bairro VARCHAR(255) NOT NULL, cidade VARCHAR(255) NOT NULL, estado VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE historicos_profissional (id INT AUTO_INCREMENT NOT NULL, candidato_id INT DEFAULT NULL, nome_empresa VARCHAR(255) NOT NULL, data_entrada DATE NOT NULL, data_saida DATE DEFAULT NULL, emprego_atual TINYINT(1) NOT NULL, INDEX IDX_9C8882F8FE0067E5 (candidato_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tecnologias (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidatos ADD CONSTRAINT FK_90981086813AC380 FOREIGN KEY (cargo_id) REFERENCES cargos (id)');
        $this->addSql('ALTER TABLE candidatos ADD CONSTRAINT FK_909810861BB76823 FOREIGN KEY (endereco_id) REFERENCES enderecos (id)');
        $this->addSql('ALTER TABLE candidatos_tecnologias ADD CONSTRAINT FK_98D23093FE0067E5 FOREIGN KEY (candidato_id) REFERENCES candidatos (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidatos_tecnologias ADD CONSTRAINT FK_98D2309321F9EE65 FOREIGN KEY (tecnologia_id) REFERENCES tecnologias (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE historicos_profissional ADD CONSTRAINT FK_9C8882F8FE0067E5 FOREIGN KEY (candidato_id) REFERENCES candidatos (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidatos_tecnologias DROP FOREIGN KEY FK_98D23093FE0067E5');
        $this->addSql('ALTER TABLE historicos_profissional DROP FOREIGN KEY FK_9C8882F8FE0067E5');
        $this->addSql('ALTER TABLE candidatos DROP FOREIGN KEY FK_90981086813AC380');
        $this->addSql('ALTER TABLE candidatos DROP FOREIGN KEY FK_909810861BB76823');
        $this->addSql('ALTER TABLE candidatos_tecnologias DROP FOREIGN KEY FK_98D2309321F9EE65');
        $this->addSql('DROP TABLE candidatos');
        $this->addSql('DROP TABLE candidatos_tecnologias');
        $this->addSql('DROP TABLE candidatura');
        $this->addSql('DROP TABLE cargos');
        $this->addSql('DROP TABLE enderecos');
        $this->addSql('DROP TABLE historicos_profissional');
        $this->addSql('DROP TABLE tecnologias');
    }
}
