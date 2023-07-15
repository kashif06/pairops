# MySQL vs MongoDB: Practical Comparison

## CREATE DATABASE

| MySQL                                   | MongoDB                             |
|-----------------------------------------|-------------------------------------|
| `CREATE DATABASE ecommerce;`            | `Use ecommerce`                     |


## Use DATABASE

| MySQL                                   | MongoDB                             |
|-----------------------------------------|-------------------------------------|
| `Use ecommerce;`                        | `Use ecommerce`                     |


## DROP DATABASE

| MySQL                                   | MongoDB                             |
|-----------------------------------------|-------------------------------------|
| `DROP DATABASE ecommerce;`              | `db.dropDatabase()`                 |

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

| MySQL                                   | MongoDB                             |
|-----------------------------------------|-------------------------------------|
| `DROP TABLE customers;`                 | `db.customers.drop();`              |

`## SELECT DATA

| MySQL                                   | MongoDB                              |
|-----------------------------------------|--------------------------------------|
| SELECT * FROM customers;                | db.customers.find({});               |
`