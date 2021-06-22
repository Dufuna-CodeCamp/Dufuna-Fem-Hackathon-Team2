CREATE DATABASE inventory_database;

use inventory_database;

CREATE TABLE admin (
	id INT NOT NULL auto_increment,
    name VARCHAR(50) NOT NULL,
    created_at DATETIME NOT NULL,
    primary key (id)
);

INSERT INTO admin (name, created_at)
VALUES ('Motunrayo', now());

CREATE TABLE categories (
	id INT NOT NULL auto_increment,
    created_by INT NOT NULL,
    category_name VARCHAR(50) NOT NULL,
    created_at DATETIME NOT NULL,
    foreign key (created_by) references admin(id),
    primary key (id)
);

INSERT INTO categories(created_by, category_name, created_at)
VALUES (1, 'haberdashery', now());

CREATE TABLE inventories (
	id INT NOT NULL auto_increment,
    created_by INT NOT NULL,
    product_name VARCHAR(50) NOT NULL,
    quantity INT NOT NULL default 0,
    created_at DATETIME NOT NULL,
    foreign key (created_by) references admin(id),
    primary key (id)
);

INSERT INTO inventories(created_by, product_name, quantity, created_at)
VALUES(1, 'stopper', 3, now());

CREATE TABLE vendors (
	id INT NOT NULL auto_increment,
    vendor_name VARCHAR(70) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    email VARCHAR(120) NOT NULL,
    address VARCHAR(150) NOT NULL,
    primary key (id)
);

INSERT INTO vendors(vendor_name, phone_number, email, address)
VALUES('Simbi', '07014567896', 'simbithefds@gmail,com', '5, Simpson street, Lagos Island');

CREATE TABLE purchases (
 id INT NOT NULL auto_increment,
 product INT NOT NULL,
 product_price INT NOT NULL,
 quantity INT NOT NULL,
 vendor INT NOT NULL,
 created_at DATETIME NOT NULL,
 created_by INT NOT NULL,
 foreign key (product) references inventories (id),
 foreign key (vendor) references vendors (id),
 foreign key (created_by) references admin(id),
 primary key (id)
);

INSERT INTO purchases(product, product_price, quantity, vendor, created_at, created_by)
VALUES(1, 50, 3, 1, now(), 1);

CREATE TABLE sales (
	id INT NOT NULL auto_increment,
    product INT NOT NULL,
	product_price INT NOT NULL,
    quantity INT NOT NULL,
    customer_name VARCHAR(50) NOT NULL,
    created_at DATETIME NOT NULL,
    created_by INT NOT NULL,
	foreign key (product) references inventories (id),
	foreign key (created_by) references admin(id),
	primary key (id)
);

INSERT INTO sales(product, product_price, quantity, customer_name, created_at, created_by)
VALUES(1, 50, 2, 'Ali', now(), 1);