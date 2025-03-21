Overview
-------------
   This Magento 2 module enhances order processing by providing a custom API to update order statuses, logs order status changes, and triggers email notifications when an order is marked as shipped..
Features
----------

REST API Endpoint, Event Observer, Performance Optimization
Installation
------------
Copy the Vendor_CustomOrderProcessing folder into app/code/Vendor/CustomOrderProcessing.
Run the following commands in the Magento root directory:

bin/magento setup:upgrade

Verify the module is enabled:
-----------------------------
bin/magento module:enable Vendor_CustomOrderProcessing
API Usage
---------
Authentication: Use a Magento Bearer Token for authentication.
URL: POST V1/integration/admin/token

Request Body (JSON):
{
    "username": "admin",
    "password": "admin123"
}

output:
"your_generated_token_here"


Endpoint: Update Order Status
URL: POST /V1/order/update-status
Headers:
Key: Content-Type: application/json
key: Authorization: Bearer your_generated_token_here

Request Body (JSON):

{
    "orderId": "100000001",
    "status": "complete"
}

output
{
    "success": true,
    "message": "Order status updated successfully."
}






