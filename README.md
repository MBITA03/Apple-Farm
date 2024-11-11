# Apple-Farm

## Overview
Apple-Farm is a simple web application that allows users to manage their products. Users can register, authenticate, log in, log out, and perform CRUD (Create, Read, Update, Delete) operations on their products. The application also includes a search functionality for users to find products easily. NOTE: SOME FEATURES MAY NOT BE FULLY FUNCTIONAL OR MISSING.

## Features
- **User Registration:** Users can create a new account.
- **Authentication:** Secure authentication for user accounts.
- **Login/Logout:** Users can log in and log out of their accounts.
- **Product Management:**
  - **Post Products:** Users can add new products.
  - **Edit Products:** Users can edit existing products.
  - **Delete Products:** Users can delete their products.
- **Search Functionality:** Users can search for products using keywords.

## Installation
1. Clone the repository:
    ```sh
    git clone https://github.com/MBITA03/Apple-Farm.git
    ```
2. Navigate to the project directory:
    ```sh
    cd Apple-Farm
    ```
3. Move project files to the XAMPP htdocs directory:

    Copy or move the entire Apple-Farm folder into the htdocs directory of your XAMPP installation. For example, C:\xampp\htdocs\Apple-Farm on Windows.

4. Start Apache and MySQL in XAMPP:
   
5. Set up the MySQL database:
    Open phpMyAdmin in your browser by navigating to http://localhost/phpmyadmin.
    Create a new database named  `crswrkv1`
    Import the database file located in `Apple-Farm/database`
   
6. Access the application:
    In your browser, go to http://localhost/Apple-Farm to see the application.

## Usage
1. **Register a new account**:
    - Navigate to the registration page.
    - Fill in the required details and submit the form.
2. **Log in to your account**:
    - Navigate to the login page.
    - Enter your credentials and submit the form.
3. **Manage products**:
    - **Post a new product**:
        - Navigate to the 'Add Product' page.
        - Fill in the product details and submit the form.
    - **Edit an existing product**:
        - Navigate to the 'My Products' page.
        - Select the product you want to edit.
        - Update the product details and submit the form.
    - **Delete a product**:
        - Navigate to the 'My Products' page.
        - Select the product you want to delete and confirm the deletion.
4. **Search for products**:
    - Use the search bar to find products by entering keywords.

## Contributing
1. Fork the repository.
2. Create a new branch (`git checkout -b feature/YourFeature`).
3. Commit your changes (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature/YourFeature`).
5. Open a Pull Request.

