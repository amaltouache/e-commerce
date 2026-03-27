# e-commerce
Step 1 – Template Integration

Description :

In this step, we focused on integrating the static HTML templates provided for the project into a Symfony application. The goal was to organize the front-end pages properly without adding any dynamic functionality or database connections

Key actions performed:
Project setup:
- Created a new Symfony project.
- Installed the necessary Symfony dependencies
- 
Controller separation:
Created separate controllers for each feature/page group:
-AuthController → Login page
- ProfileController → User profile page
- HomeController → Homepage and categories page
- ProductController → Product details and products by category
- CartController → Shopping cart page

Template organization:
All templates correspond to the static HTML pages provided: login, profile, homepage, browse categories, product details, products by category, and cart

Routing setup:
Defined routes in each controller corresponding to each page
Connected templates to routes using "render()" method in Symfony controllers
