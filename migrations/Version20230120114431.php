<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230120114431 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE alerts (id INT AUTO_INCREMENT NOT NULL, users_id_id INT DEFAULT NULL, status VARCHAR(50) NOT NULL, type VARCHAR(50) NOT NULL, datails LONGTEXT NOT NULL, created_at DATETIME NOT NULL, traited_at DATETIME NOT NULL, INDEX IDX_F77AC06B98333A1E (users_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE arrivals (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, closed_at DATETIME NOT NULL, is_closed TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE arrivals_detalis (id INT AUTO_INCREMENT NOT NULL, arrivals_id_id INT NOT NULL, products_id_id INT NOT NULL, quantity INT NOT NULL, INDEX IDX_1707EE12571CA593 (arrivals_id_id), INDEX IDX_1707EE129F1D6087 (products_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, slug VARCHAR(50) NOT NULL, active TINYINT(1) NOT NULL, picture VARCHAR(250) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coupons (id INT AUTO_INCREMENT NOT NULL, coupons_types_id_id INT NOT NULL, code VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, discount INT NOT NULL, max_usage INT NOT NULL, validity DATETIME NOT NULL, is_valid TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_F5641118E10A5A33 (coupons_types_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coupons_types (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customers (id INT AUTO_INCREMENT NOT NULL, users_id_id INT DEFAULT NULL, adress VARCHAR(50) NOT NULL, zipcode VARCHAR(50) NOT NULL, city VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_62534E2198333A1E (users_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE deliveries (id INT AUTO_INCREMENT NOT NULL, orders_id_id INT DEFAULT NULL, deliveried_by_id INT DEFAULT NULL, adress VARCHAR(50) NOT NULL, zipcode VARCHAR(50) NOT NULL, city VARCHAR(50) NOT NULL, price INT NOT NULL, state VARCHAR(50) NOT NULL, INDEX IDX_6F0785683EEE31F6 (orders_id_id), INDEX IDX_6F078568C15B68A9 (deliveried_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE faqs (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(50) NOT NULL, question LONGTEXT NOT NULL, answer LONGTEXT NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, produtc_id_id INT NOT NULL, name VARCHAR(50) NOT NULL, file VARCHAR(50) NOT NULL, INDEX IDX_E01FBE6AA1F7F79 (produtc_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE likes (id INT AUTO_INCREMENT NOT NULL, products_id_id INT NOT NULL, email VARCHAR(50) NOT NULL, liked TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_49CA4E7D9F1D6087 (products_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, coupons_id_id INT NOT NULL, users_id_id INT NOT NULL, reference VARCHAR(50) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_E52FFDEE40329D60 (coupons_id_id), INDEX IDX_E52FFDEE98333A1E (users_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders_details (id INT AUTO_INCREMENT NOT NULL, orders_id_id INT NOT NULL, products_id_id INT NOT NULL, quantity INT NOT NULL, price INT NOT NULL, INDEX IDX_835379F13EEE31F6 (orders_id_id), INDEX IDX_835379F19F1D6087 (products_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payements (id INT AUTO_INCREMENT NOT NULL, orders_id_id INT DEFAULT NULL, ref VARCHAR(50) NOT NULL, payed_at DATETIME NOT NULL, mode VARCHAR(50) NOT NULL, details LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_866EB2DC3EEE31F6 (orders_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, slug VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, price INT NOT NULL, stock INT NOT NULL, active TINYINT(1) NOT NULL, created_add DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reviews (id INT AUTO_INCREMENT NOT NULL, products_id_id INT NOT NULL, rate DOUBLE PRECISION NOT NULL, comment LONGTEXT NOT NULL, name VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_6970EB0F9F1D6087 (products_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(50) NOT NULL, password VARCHAR(50) NOT NULL, lastname VARCHAR(50) NOT NULL, firstname VARCHAR(50) NOT NULL, avatar VARCHAR(50) NOT NULL, active TINYINT(1) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', created_at DATETIME NOT NULL, login_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE alerts ADD CONSTRAINT FK_F77AC06B98333A1E FOREIGN KEY (users_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE arrivals_detalis ADD CONSTRAINT FK_1707EE12571CA593 FOREIGN KEY (arrivals_id_id) REFERENCES arrivals (id)');
        $this->addSql('ALTER TABLE arrivals_detalis ADD CONSTRAINT FK_1707EE129F1D6087 FOREIGN KEY (products_id_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE coupons ADD CONSTRAINT FK_F5641118E10A5A33 FOREIGN KEY (coupons_types_id_id) REFERENCES coupons_types (id)');
        $this->addSql('ALTER TABLE customers ADD CONSTRAINT FK_62534E2198333A1E FOREIGN KEY (users_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE deliveries ADD CONSTRAINT FK_6F0785683EEE31F6 FOREIGN KEY (orders_id_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE deliveries ADD CONSTRAINT FK_6F078568C15B68A9 FOREIGN KEY (deliveried_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6AA1F7F79 FOREIGN KEY (produtc_id_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE likes ADD CONSTRAINT FK_49CA4E7D9F1D6087 FOREIGN KEY (products_id_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE40329D60 FOREIGN KEY (coupons_id_id) REFERENCES coupons (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE98333A1E FOREIGN KEY (users_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE orders_details ADD CONSTRAINT FK_835379F13EEE31F6 FOREIGN KEY (orders_id_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE orders_details ADD CONSTRAINT FK_835379F19F1D6087 FOREIGN KEY (products_id_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE payements ADD CONSTRAINT FK_866EB2DC3EEE31F6 FOREIGN KEY (orders_id_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE reviews ADD CONSTRAINT FK_6970EB0F9F1D6087 FOREIGN KEY (products_id_id) REFERENCES products (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alerts DROP FOREIGN KEY FK_F77AC06B98333A1E');
        $this->addSql('ALTER TABLE arrivals_detalis DROP FOREIGN KEY FK_1707EE12571CA593');
        $this->addSql('ALTER TABLE arrivals_detalis DROP FOREIGN KEY FK_1707EE129F1D6087');
        $this->addSql('ALTER TABLE coupons DROP FOREIGN KEY FK_F5641118E10A5A33');
        $this->addSql('ALTER TABLE customers DROP FOREIGN KEY FK_62534E2198333A1E');
        $this->addSql('ALTER TABLE deliveries DROP FOREIGN KEY FK_6F0785683EEE31F6');
        $this->addSql('ALTER TABLE deliveries DROP FOREIGN KEY FK_6F078568C15B68A9');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6AA1F7F79');
        $this->addSql('ALTER TABLE likes DROP FOREIGN KEY FK_49CA4E7D9F1D6087');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE40329D60');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE98333A1E');
        $this->addSql('ALTER TABLE orders_details DROP FOREIGN KEY FK_835379F13EEE31F6');
        $this->addSql('ALTER TABLE orders_details DROP FOREIGN KEY FK_835379F19F1D6087');
        $this->addSql('ALTER TABLE payements DROP FOREIGN KEY FK_866EB2DC3EEE31F6');
        $this->addSql('ALTER TABLE reviews DROP FOREIGN KEY FK_6970EB0F9F1D6087');
        $this->addSql('DROP TABLE alerts');
        $this->addSql('DROP TABLE arrivals');
        $this->addSql('DROP TABLE arrivals_detalis');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE coupons');
        $this->addSql('DROP TABLE coupons_types');
        $this->addSql('DROP TABLE customers');
        $this->addSql('DROP TABLE deliveries');
        $this->addSql('DROP TABLE faqs');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE likes');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE orders_details');
        $this->addSql('DROP TABLE payements');
        $this->addSql('DROP TABLE products');
        $this->addSql('DROP TABLE reviews');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
