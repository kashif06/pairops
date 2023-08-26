-- Insert main categories
INSERT INTO categories (label, parent_category_id) VALUES ('Electronics', NULL);
INSERT INTO categories (label, parent_category_id) VALUES ('Appliances', NULL);
INSERT INTO categories (label, parent_category_id) VALUES ('Fashion', NULL);
INSERT INTO categories (label, parent_category_id) VALUES ('Home & Garden', NULL);
INSERT INTO categories (label, parent_category_id) VALUES ('Sports & Outdoors', NULL);
INSERT INTO categories (label, parent_category_id) VALUES ('Automotive', NULL);

-- Insert subcategories under Electronics
INSERT INTO categories (label, parent_category_id) VALUES ('Phones', 1);
INSERT INTO categories (label, parent_category_id) VALUES ('Laptops', 1);
INSERT INTO categories (label, parent_category_id) VALUES ('Headphones', 1);
INSERT INTO categories (label, parent_category_id) VALUES ('Smart Devices', 1);

-- Insert subcategories under Appliances
INSERT INTO categories (label, parent_category_id) VALUES ('Kitchen Appliances', 2);
INSERT INTO categories (label, parent_category_id) VALUES ('Home Appliances', 2);

-- Insert subcategories under Kitchen Appliances
INSERT INTO categories (label, parent_category_id) VALUES ('Blenders', 6);
INSERT INTO categories (label, parent_category_id) VALUES ('Coffee Makers', 6);
INSERT INTO categories (label, parent_category_id) VALUES ('Toasters', 6);
