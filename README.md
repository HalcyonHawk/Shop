An Ecomerce website made using Laravel and styled with Bootstrap. 

Any user can view products, including a seperate page to see a product in more detail. 

Only logged in users can add to cart or checkout.

Users can add products to the cart and remove them from the cart.

When checking out, users go to a form for entering shipping details. After that, they go to the payment form.
Currently payment is just enter something and submit the form. Nothing happens to this data since no payment gateway is setup. When that step is done, an order record is made, cart items removed for the user and product detail stock updated.

Logged in users can also view previous orders including all product details they purchased.




Project makes use of multiple Laravel features such as:
    - Specific Request to keep validation logic out of the controller
    - Model function to reuse logic
    - Model attributes to get data such as total price easily 
    - Model scope to make eloquent queries better for things such as getting in stock products only
    - Model relationships to simplify queries 
    - Service class to reduce repeated code
    - Policy to keep authentication logic seperate and make it easy to do a check that a user can only have 1 product detail in the cart
    - Database seeders to get test data
    - Database migrations to manage database schema changes
    - Controllers to seperate logic
    - Resource controllers for simple project structure
    - Authentication middleware to handle routes for guests and users
    - Paginating products to ensure the page loads quickly even with lots of products in the database
    - Eager loading database relationships to make queries run faster
