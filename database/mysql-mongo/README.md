# MySQL vs MongoDB: Practical Comparison

## CREATE DATABASE

- MySQL
  - `CREATE DATABASE ecommerce;`
- MongoDB
  - `Use ecommerce`

## Use DATABASE

- MySQL
  - `Use ecommerce;`
- MongoDB
  - `Use ecommerce`

## DROP DATABASE

- MySQL
  - `DROP DATABASE ecommerce;`
- MongoDB
  - `db.dropDatabase()`

## CREATE TABLE

- MySQL
  - `CREATE TABLE customers(id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, email VARCHAR(100) NOT NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);`
  - `CREATE TABLE products(id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT, product_name VARCHAR(255) NOT NULL, price INT NOT NULL, description TEXT NOT NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);`
  - `CREATE TABLE orders(id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT, customer_id INT UNSIGNED NOT NULL, product_id INT UNSIGNED NOT NULL, quantity INT NOT NULL,created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,FOREIGN KEY(customer_id) REFERENCES customers(id),FOREIGN KEY(product_id) REFERENCES products(id));`

- MongoDB
  - `db.createCollection('customers')`
  - `db.createCollection('products')`
  - `db.createCollection('orders'')`

## DROP TABLE

- MySQL
  - `DROP TABLE customers;`
- MongoDB
  - `db.customers.drop();`  

## SELECT DATA

- MySQL
  - `SELECT * FROM customers;`
- MongoDB
  - `db.customers.find({});` 

## INSERT DATA

- MySQL
  - `INSERT INTO customers(first_name, last_name, email) VALUES('John', 'Doe', 'john.doe@gmail.com');`
  - `INSERT INTO customers(first_name, last_name, email) VALUES('Adam', 'Smith', 'adam.smith@gmail.com');`
  - `INSERT INTO customers(first_name, last_name, email) VALUES('John', 'Allen', 'john.allen@gmail.com');`
  - `INSERT INTO orders(customer_id, product_id, quantity) VALUES(1,1,2),(1,2,4),(2,2,1);`

- MongoDB
  - `db.getCollection("customers").insertOne({"first_name": "John","last_name":"Doe","email":"john.doe@gmail.com", 'created_at': new Date()})`
  - `db.getCollection("customers").insertOne({"first_name": "John","last_name":"Allen","email":"john.allen@gmail.com", 'created_at': new Date()})`
  - `db.getCollection("customers").insert([{"first_name": "John","last_name":"Doe","email":"john.doe@gmail.com", 'created_at': new Date()},{"first_name": "Adam","last_name":"Smith","email":"adam.smith@gmail.com", 'created_at': new Date()},])`
  - `db.getCollection("products").insert([{"product_name": "Laptop","price":12000,"description":"Apple laptop", 'created_at': new Date()},{"name": "Chair","price":7000,"description":"office Chair", 'created_at': new Date()}])`
  - `db.getCollection('orders').insert([{ "customer_id":ObjectId("64af9a0a55296e840ec237a5"), "product_id": ObjectId("64afc0b755296e840ec237a7"),"quantity":2, 'created_at':new Date() },{ "customer_id":ObjectId("64af9a0a55296e840ec237a5"), "product_id": ObjectId("64afc0b755296e840ec237a8"),"quantity":4, 'created_at':new Date() },{ "customer_id":ObjectId("64af9a0a55296e840ec237a6"), "product_id": ObjectId("64afc0b755296e840ec237a8"),"quantity":1, 'created_at':new Date() }])`

## SELECT Specific Columns

- MySQL
  - `Select email from customers;`
  - `SELECT product_name FROM products;`
  - `Select email from customers;`
- MongoDB
  - `db.customers.find({}, { email: 1 });`
  - `db.customers.find({}, { email: 1, _id: 0 });`
  - `db.products.find({},{product_name:1, price:1, _id: 0})`

## COUNT

- MySQL
  - `SELECT COUNT(*) first_name FROM customers;`
- MongoDB
  - `db.orders.find({}).sort({'quantity': 1})`
  - `db.orders.find({}).sort({'quantity': -1})`
