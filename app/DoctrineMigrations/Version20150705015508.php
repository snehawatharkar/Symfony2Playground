<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150705015508 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE test_expense_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test_expenses (id INT AUTO_INCREMENT NOT NULL, test_expense_vendor_id INT DEFAULT NULL, test_expense_category_id INT DEFAULT NULL, INDEX idx_test_expense_category_id_test_expenses (test_expense_category_id), INDEX idx_test_expense_vendor_id_test_expenses (test_expense_vendor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test_expense_vendor (id INT AUTO_INCREMENT NOT NULL, test_expense_category_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX idx_test_expense_category_id_test_expense_vendor (test_expense_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test_lab_orders (id INT AUTO_INCREMENT NOT NULL, test_expense_id INT DEFAULT NULL, test_lab_id INT DEFAULT NULL, practice_settings_id INT NOT NULL, patient_id INT NOT NULL, INDEX idx_test_lab_id_test_expense_orders (test_lab_id), INDEX idx_test_expense_id_test_expense_orders (test_expense_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test_labs (id INT AUTO_INCREMENT NOT NULL, test_expense_vendor_id INT DEFAULT NULL, practice_settings_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX idx_test_expense_vendor_id_test_labs (test_expense_vendor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE test_expenses ADD CONSTRAINT FK_B1F5F80D9973302B FOREIGN KEY (test_expense_vendor_id) REFERENCES test_expense_vendor (id)');
        $this->addSql('ALTER TABLE test_expenses ADD CONSTRAINT FK_B1F5F80D14FDA1D FOREIGN KEY (test_expense_category_id) REFERENCES test_expense_category (id)');
        $this->addSql('ALTER TABLE test_expense_vendor ADD CONSTRAINT FK_4CC11AEE14FDA1D FOREIGN KEY (test_expense_category_id) REFERENCES test_expense_category (id)');
        $this->addSql('ALTER TABLE test_lab_orders ADD CONSTRAINT FK_BC4CD8388A66D42 FOREIGN KEY (test_expense_id) REFERENCES test_expenses (id)');
        $this->addSql('ALTER TABLE test_lab_orders ADD CONSTRAINT FK_BC4CD83F55014FB FOREIGN KEY (test_lab_id) REFERENCES test_labs (id)');
        $this->addSql('ALTER TABLE test_labs ADD CONSTRAINT FK_821F35DC9973302B FOREIGN KEY (test_expense_vendor_id) REFERENCES test_expense_vendor (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE test_expenses DROP FOREIGN KEY FK_B1F5F80D14FDA1D');
        $this->addSql('ALTER TABLE test_expense_vendor DROP FOREIGN KEY FK_4CC11AEE14FDA1D');
        $this->addSql('ALTER TABLE test_lab_orders DROP FOREIGN KEY FK_BC4CD8388A66D42');
        $this->addSql('ALTER TABLE test_expenses DROP FOREIGN KEY FK_B1F5F80D9973302B');
        $this->addSql('ALTER TABLE test_labs DROP FOREIGN KEY FK_821F35DC9973302B');
        $this->addSql('ALTER TABLE test_lab_orders DROP FOREIGN KEY FK_BC4CD83F55014FB');
        $this->addSql('DROP TABLE test_expense_category');
        $this->addSql('DROP TABLE test_expenses');
        $this->addSql('DROP TABLE test_expense_vendor');
        $this->addSql('DROP TABLE test_lab_orders');
        $this->addSql('DROP TABLE test_labs');
    }
}
