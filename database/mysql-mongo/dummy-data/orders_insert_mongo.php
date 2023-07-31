const customerId1 = db.customers.findOne({email:"john.doe@example.com"},{_id:1})['_id']
const customerId2 = db.customers.findOne({email:"william.jones@example.com"},{_id:1})['_id']
const customerId3 = db.customers.findOne({email:"james.davis@example.com"},{_id:1})['_id']

const productId1 = db.products.findOne({name:"Laptop"},{_id:1})['_id']
const productId2 = db.products.findOne({name:"Wireless Keyboard"},{_id:1})['_id']
const productId3 = db.products.findOne({name:"Printer"},{_id:1})['_id']


// Step 3: Insert into "orders" collection
db.orders.insertMany([
  {
    customer_id: customerId1,
    product_id: productId1,
    quantity: 1,
    created_at: new Date(),
  },
  {
    customer_id: customerId2,
    product_id: productId2,
    quantity: 1,
    created_at: new Date(),
  },
  {
    customer_id: customerId3,
    product_id: productId3,
    quantity: 2,
    created_at: new Date(),
  },
  {
    customer_id: customerId1,
    product_id: productId3,
    quantity: 1,
    created_at: new Date(),
  }
]);
