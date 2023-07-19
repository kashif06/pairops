db.getCollection('orders').insert(
[
{ "customer_id":ObjectId("64b6250edd9809f1c0e52f34"), "product_id": ObjectId("64b639f1dd9809f1c0e53194"),"quantity":10, 'created_at':new Date() },
{ "customer_id":ObjectId("64b6250edd9809f1c0e52f3e"), "product_id": ObjectId("64b639f1dd9809f1c0e531a0"),"quantity":4, 'created_at':new Date() },
{ "customer_id":ObjectId("64b6250edd9809f1c0e52f48"), "product_id": ObjectId("64b639f1dd9809f1c0e531a6"),"quantity":11, 'created_at':new Date() }])
