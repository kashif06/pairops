INSERT INTO orders (customer_id, product_id, quantity)
VALUES
  ((SELECT id FROM customers WHERE email = 'john.doe@example.com'), (SELECT id FROM products WHERE NAME = 'Laptop'), 1),
  ((SELECT id FROM customers WHERE email = 'william.jones@example.com'), (SELECT id FROM products WHERE NAME = 'Wireless Keyboard'), 1),
  ((SELECT id FROM customers WHERE email = 'james.davis@example.com'), (SELECT id FROM products WHERE NAME = 'Printer'), 2),
  ((SELECT id FROM customers WHERE email = 'john.doe@example.com'), (SELECT id FROM products WHERE NAME = 'Printer'), 1);