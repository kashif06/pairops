# MySQL vs MongoDB: Practical Comparison

<details>
  <summary><strong>Create Database</strong></summary>

- MySQL
  - `CREATE DATABASE ecommerce;`
- MongoDB
  - `Use ecommerce`
</details>

<details>
  <summary><strong>Use Database</strong></summary>

- MySQL
  - `Use ecommerce;`
- MongoDB
  - `Use ecommerce`
</details>

<details>
  <summary><strong>Drop Database</strong></summary>

- MySQL
  - `DROP DATABASE ecommerce;`
- MongoDB
  - `db.dropDatabase()`
</details>

<details>
  <summary><strong>Create Table</strong></summary>

- MySQL
  - `CREATE TABLE customers(id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, email VARCHAR(100) NOT NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);`
  - `CREATE TABLE products(id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT, name VARCHAR(255) NOT NULL, price INT NOT NULL, description TEXT NOT NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);`
  - `CREATE TABLE orders(id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT, customer_id INT UNSIGNED NOT NULL, product_id INT UNSIGNED NOT NULL, quantity INT NOT NULL,created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,FOREIGN KEY(customer_id) REFERENCES customers(id),FOREIGN KEY(product_id) REFERENCES products(id));`

- MongoDB
  - `db.createCollection('customers')`
  - `db.createCollection('products')`
  - `db.createCollection('orders'')`
</details>

<details>
  <summary><strong>Drop Table</strong></summary>

- MySQL
  - `DROP TABLE customers;`
- MongoDB
  - `db.customers.drop();` 
</details>

<details>
  <summary><strong>Select Data</strong></summary>

- MySQL
  - `SELECT * FROM customers;`
- MongoDB
  - `db.customers.find({});` 
</details>

<details>
  <summary><strong>Insert Data</strong></summary>

- MySQL
  - `INSERT INTO customers(first_name, last_name, email) VALUES('John', 'Doe', 'john.doe@gmail.com');`
  - `INSERT INTO customers(first_name, last_name, email) VALUES('Adam', 'Smith', 'adam.smith@gmail.com');`
  - `INSERT INTO customers(first_name, last_name, email) VALUES('John', 'Allen', 'john.allen@gmail.com');`
  - `INSERT INTO orders(customer_id, product_id, quantity) VALUES(1,1,2),(1,2,4),(2,2,1);`

- MongoDB
  - `db.getCollection("customers").insertOne({"first_name": "John","last_name":"Doe","email":"john.doe@gmail.com", 'created_at': new Date()})`
  - `db.getCollection("customers").insertOne({"first_name": "John","last_name":"Allen","email":"john.allen@gmail.com", 'created_at': new Date()})`
  - `db.getCollection("customers").insert([{"first_name": "John","last_name":"Doe","email":"john.doe@gmail.com", 'created_at': new Date()},{"first_name": "Adam","last_name":"Smith","email":"adam.smith@gmail.com", 'created_at': new Date()},])`
  - `db.getCollection("products").insert([{"name": "Laptop","price":12000,"description":"Apple laptop", 'created_at': new Date()},{"name": "Chair","price":7000,"description":"office Chair", 'created_at': new Date()}])`
  - `db.getCollection('orders').insert([{ "customer_id":ObjectId("64af9a0a55296e840ec237a5"), "product_id": ObjectId("64afc0b755296e840ec237a7"),"quantity":2, 'created_at':new Date() },{ "customer_id":ObjectId("64af9a0a55296e840ec237a5"), "product_id": ObjectId("64afc0b755296e840ec237a8"),"quantity":4, 'created_at':new Date() },{ "customer_id":ObjectId("64af9a0a55296e840ec237a6"), "product_id": ObjectId("64afc0b755296e840ec237a8"),"quantity":1, 'created_at':new Date() }])`
</details>

<details>
  <summary><strong>Select Columns</strong></summary>

- MySQL
  - `Select email from customers;`
  - `SELECT name, price FROM products;`
- MongoDB
  - `db.customers.find({}, { email: 1 });`
  - `db.customers.find({}, { email: 1, _id: 0 });`
  - `db.products.find({},{name:1, price:1, _id: 0})`
</details>

<details>
  <summary><strong>Count</strong></summary>

- MySQL
  - `SELECT COUNT(*) FROM customers;`
- MongoDB
  - `db.customers.countDocuments()`
</details>

<details>
  <summary><strong>Sort</strong></summary>

- MySQL
  - `SELECT * FROM orders ORDER BY quantity;`
  - `SELECT * FROM orders ORDER BY quantity DESC;`
- MongoDB
  - `db.orders.find({}).sort({'quantity': 1})`
  - `db.orders.find({}).sort({'quantity': -1})`
</details>

<details>
  <summary><strong>Limit</strong></summary>

- MySQL
  - `SELECT * FROM customers LIMIT 1;`
  - `SELECT * FROM products LIMIT 1;`
  - `SELECT * FROM customers LIMIT 2,1;`
- MongoDB
  - `db.customers.find({}).limit(1)`
  - `db.products.find({}).limit(1)`
  - `db.customers.find({}).skip(2).limit(1)`
</details>

<details>
  <summary><strong>Last Record</strong></summary>

- MySQL
  - `SELECT * FROM customers ORDER BY id DESC LIMIT 1;`
- MongoDB
  - `db.customers.find().sort({_id:-1}).limit(1)`
</details>

<details>
  <summary><strong>Where</strong></summary>

- MySQL
  - `SELECT * FROM customers WHERE first_name = 'Michael'`
  - `SELECT * FROM products WHERE price > 100`
  - `SELECT * FROM orders WHERE quantity > 2`
- MongoDB
  - `db.customers.find({ first_name: 'Michael'})`
  - `db.products.find({ price:{$gt:100} })`
  - `db.orders.find({quantity: {$gt : 2} })`

</details>

<details>
  <summary><strong>Like</strong></summary>

- MySQL
  - `SELECT * FROM products WHERE name LIKE '%Mini%';`
  - `SELECT * FROM products WHERE name LIKE 'Smart%';;`
  - `SELECT * FROM products WHERE name LIKE '%Charger';`
  - `SELECT * FROM customers WHERE email LIKE 'john%'`
- MongoDB
  - `db.products.find({name:{ $regex: /Mini/ } })`
  - `db.products.find({name:{ $regex: /^Smart/ } })`
  - `db.products.find({name:{ $regex: /Charger$/ } })`
  - `db.customers.find({ email: { $regex: /^john/ } })`
</details>

<details>
  <summary><strong>AND and OR</strong></summary>

- MySQL
  - `SELECT * FROM products WHERE name LIKE '%Mini%' AND price > 100`
  - `SELECT * FROM products WHERE name LIKE '%Mini%' OR price > 100`
- MongoDB
  - `db.products.find({$and: [ {name: {$regex: /Mini/} }, {price: {$gt:100} } ] })`
  - `db.products.find({$or: [ {name: {$regex: /Mini/} }, {price: {$gt:100} } ] })`
</details>

<details>
  <summary><strong>Delete Record</strong></summary>

- MySQL
  - `DELETE FROM customers WHERE id = 200;`
  - `DELETE FROM customers WHERE email LIKE 'john%'`
- MongoDB
  - `db.customers.deleteOne({"_id" : ObjectId("64b6250edd9809f1c0e52ff2")})`
  - `db.customers.deleteMany({email: { $regex: /^john/ } })`
</details>

<details>
<summary><strong>Update Record</strong></summary>

- MySQL
  - `UPDATE products SET price = 100 WHERE id = 28;`
  - `UPDATE products SET price = 59 WHERE name LIKE '%Earphone%';`
- MongoDB
  - `db.products.updateOne({"_id" : ObjectId("64b78b0fdd9809f1c0e533fd")}, { $set: {price: 100}} )`
  - `db.products.updateMany({ name: {$regex: /Earphone/} }, { $set: {price: 59} })`
</details>

<details>
<summary><strong>Alter Table</strong></summary>

- MySQL
  - `ALTER TABLE products ADD COLUMN manufacturer VARCHAR(50) NULL AFTER description;`
     - `SELECT * FROM products WHERE name LIKE '%Bluetooth%'`
     - `UPDATE products SET manufacturer = 'Samsung' WHERE name LIKE '%Bluetooth%';`
     - `SELECT * FROM products WHERE manufacturer IS NOT NULL;`
     - `SELECT * FROM products WHERE manufacturer IS NULL;`
- MongoDB
  - `db.products.find({name: {$regex: /Bluetooth/}})`
      - `db.products.updateMany({name: {$regex:/Bluetooth/} },{ $set: {manufacturer : 'Samsung'}})`
      - `db.products.find({manufacturer: {$exists: true }})`
      - `db.products.find({manufacturer: {$exists: false }})`
</details>

<details>
<summary><strong>Aggregation</strong></summary>

- MySQL
  - Where   
      - `SELECT * FROM products WHERE name = 'Laptop'`
  - Like
      - `SELECT * FROM products WHERE name LIKE '%Bluetooth%'`
  - Sort
      - `SELECT * FROM products ORDER BY price DESC`
  - Limit
      - `SELECT * FROM products ORDER BY price DESC LIMIT 1`
  - Sequence
      - `SELECT * FROM products ORDER BY price DESC LIMIT 2`
  - Projection
      - `SELECT name,price FROM products ORDER BY price DESC LIMIT 2`
- MongoDB
  - Where
      - `db.products.aggregate([{$match: {name: 'Laptop'}}])`
  - Like
      - `db.products.aggregate([{$match: {name: {$regex: /Bluetooth/}}}])`
  - Sort
      - `db.products.aggregate([{$sort: {price: -1}}])`
  - Limit
      - `db.products.aggregate([{$sort: {price: -1}},{$limit: 1}])`
  - Sequence
      - `db.products.aggregate([{$sort: {price: -1}},{$limit: 2}])`
      - `db.products.aggregate([{$limit: 2},{$sort: {price: -1}}])`
  - Projection
      - `db.products.aggregate([{$sort: {price: -1}}, {$limit: 2},{ $project: {name: 1, price: 1, _id: 0}}])`
</details>