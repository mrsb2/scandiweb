-- Active: 1677957155867@@127.0.0.1@3306@scandiweb
USE scandiweb;

CREATE TABLE products (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    sku VARCHAR(50) NOT NULL UNIQUE,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    type VARCHAR(50) NOT NULL
);

CREATE TABLE product_attributes (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    attribute_type VARCHAR(50) NOT NULL,
    attribute_value VARCHAR(255) NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO products (sku, name, price, type)
VALUES 
    ('DVD001', 'The Shawshank Redemption', 12.99, 'DVD'),
    ('DVD002', 'The Godfather', 15.99, 'DVD'),
    ('BK789', 'The Catcher in the Rye', 10.99, 'Book'),
    ('FRN123', 'Oak Table', 249.99, 'Furniture');


INSERT INTO product_attributes (product_id, attribute_type, attribute_value)
VALUES 
    (1, 'Size (MB)', '150'),
    (2, 'Size (MB)', '200'),
    (3, 'Weight (kg)', '0.5'),
    (4, 'Dimensions (HxWxL)', '120x80x60'); 