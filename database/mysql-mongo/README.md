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
  - `SELECT product_name, price FROM products;`
- MongoDB
  - `db.customers.find({}, { email: 1 });`
  - `db.customers.find({}, { email: 1, _id: 0 });`
  - `db.products.find({},{product_name:1, price:1, _id: 0})`

## COUNT

- MySQL
  - `SELECT COUNT(*) FROM customers;`
- MongoDB
  - `db.customers.countDocuments()`

## SORT

- MySQL
  - `SELECT * FROM orders ORDER BY quantity;`
  - `SELECT * FROM orders ORDER BY quantity DESC;`
- MongoDB
  - `db.orders.find({}).sort({'quantity': 1})`
  - `db.orders.find({}).sort({'quantity': -1})`

## LIMIT

- MySQL
  - `SELECT * FROM customers LIMIT 1;`
  - `SELECT * FROM products LIMIT 1;`
  - `SELECT * FROM customers LIMIT 2,1;`
- MongoDB
  - `db.customers.find({}).limit(1)`
  - `db.products.find({}).limit(1)`
  - `db.customers.find({}).skip(2).limit(1)`

## LAST RECORD

- MySQL
  - `SELECT * FROM customers ORDER BY id DESC LIMIT 1;`
- MongoDB
  - `db.customers.find().sort({_id:-1}).limit(1)`

## WHERE

- MySQL
  - `SELECT * FROM customers WHERE first_name = 'John'`
  - `SELECT * FROM products WHERE price > 100`
  - `SELECT * FROM orders WHERE quantity > 2`
- MongoDB
  - `db.customers.find({ first_name: 'John'})`
  - `db.products.find({ price:{$gt:100} })`
  - `db.orders.find({quantity: {$gt : 2} })`

## LIKE

- MySQL
  - `SELECT * FROM products WHERE product_name LIKE '%Mini%';`
  - `SELECT * FROM products WHERE product_name LIKE 'Smart%';;`
  - `SELECT * FROM products WHERE product_name LIKE '%Charger';`
  - `SELECT * FROM customers WHERE email LIKE '%@vimeo.com'`
- MongoDB
  - `db.products.find({product_name:{ $regex: /Mini/ } })`
  - `db.products.find({product_name:{ $regex: /^Smart/ } })`
  - `db.products.find({product_name:{ $regex: /Charger$/ } })`
  - `db.customers.find({ email: { $regex: /@vimeo.com$/ } })`

## AND and OR

- MySQL
  - `SELECT * FROM products WHERE product_name LIKE '%Mini%' AND price > 100`
  - `SELECT * FROM products WHERE product_name LIKE '%Mini%' OR price > 100`
- MongoDB
  - `db.products.find({$and: [ {product_name: {$regex: /Mini/} }, {price: {$gt:100} } ] })`
  - `db.products.find({$or: [ {product_name: {$regex: /Mini/} }, {price: {$gt:100} } ] })`

## DELETE RECORD

- MySQL
  - `DELETE FROM customers WHERE id = 200;`
  - `DELETE FROM customers WHERE email LIKE '%@vimeo.com'`
- MongoDB
  - `db.customers.deleteOne({"_id" : ObjectId("64b6250edd9809f1c0e52ff2")})`
  - `db.customers.deleteMany({email: {$regex: /@vimeo.com$/} })`

## UPDATE RECORD

- MySQL
  - `UPDATE products SET price = 100 WHERE id = 28;`
  - `UPDATE products SET price = 59 WHERE product_name LIKE '%Earphone%';`
- MongoDB
  - `db.products.updateOne({"_id" : ObjectId("64b78b0fdd9809f1c0e533fd")}, { $set: {price: 100}} )`
  - `db.products.updateMany({ product_name: {$regex: /Earphone/} }, { $set: {price: 59} })`
