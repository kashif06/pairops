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

| MySQL                                   | MongoDB                             |
|-----------------------------------------|-------------------------------------|
| `CREATE TABLE customers (`              | `db.createCollection('customers');` |
|  `id INT UNSIGNED PRIMARY KEY`          |                                     | 
|   `AUTO_INCREMENT,`                     |                                     |
| `first_name VARCHAR(50) NOT NULL,`                                         |                                     |
|  `last_name VARCHAR(50) NOT NULL,`                                         |                                     |
|   `email VARCHAR(100) NOT NULL,`                                         |                                     |
|   `created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP`                        |                                     |
| `); `                                