// Insert One Record
db.categories.insertOne({
  "label": "Electronics",
  "description":"Electronics description",
  "is_active": 1,
  "created_at": new Date(),
  "subcategories": [
    {
      "label": "Phones",
      "description":"Phones description",
      "is_active": 1,
      "created_at": new Date()
    },
    {
      "label": "Laptops",
      "description":"Laptops description",
      "is_active": 1,
      "created_at": new Date()
    },
    {
      "label": "Headphones",
      "description":"Headphones description",
      "is_active": 1,
      "created_at": new Date()
    },
    {
      "label": "Smart Devices",
      "description":"Smart Devices description",
      "is_active": 1,
      "created_at": new Date()
    }
  ]
});

// insert Many Records
db.categories.insertMany([
  { "label": "Appliances", "description":"Appliances description", "is_active": 1, "created_at": new Date() },
  { "label": "Fashion", "description":"Fashion description", "is_active": 1, "created_at": new Date() },
  { "label": "Home & Garden", "description":"Home & Garden description", "is_active": 1, "created_at": new Date() },
  { "label": "Sports & Outdoors", "description":"Sports & Outdoors description", "is_active": 1, "created_at": new Date()},
  { "label": "Automotive", "description":"Automotive description", "is_active": 1, "created_at": new Date()}
]);

