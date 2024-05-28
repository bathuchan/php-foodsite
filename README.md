# Recipe Management System

This is a simple Recipe Management System built with PHP and MySQL. The system allows users to add, edit, and delete recipes, and view them in a structured format.

## Features

- Add new recipes with name, ingredients, and instructions.
- Edit existing recipes.
- Delete recipes from the database.
- View a list of all recipes.

## Installation

### Prerequisites

- Web server (e.g., Apache)
- PHP 7.4 or higher
- MySQL 5.7 or higher
- phpMyAdmin (optional, for database management)

### Steps

1. **Clone the repository:**

    ```sh
    git clone https://github.com/bathuchan/php-foodsite.git
    ```

2. **Navigate to the project directory:**

    ```sh
    cd php-foodsite
    ```

3. **Set up the database:**

    - Import the provided SQL file (`proje_php.sql`) into your MySQL database using phpMyAdmin or the MySQL command line:

    ```sh
    mysql -u username -p database_name < proje_php.sql
    ```

4. **Update the database configuration:**

    - Open necessary files and update the database connection details with your own.

    ```php
    <?php
    $servername = "your_host";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database_name";
    ?>
    ```

5. **Deploy the application:**

    - Move the project directory to your web server's root directory (e.g., `htdocs` for XAMPP, `www` for WAMP).

6. **Access the application:**

    - Open your web browser and navigate to `http://localhost/yourfilename` (adjust the URL as necessary based on your server setup).

## Usage

### Adding a Recipe

1. Click on the "Add Recipe" button.
2. Fill in the recipe name, ingredients, and instructions.
3. Click "Submit" to save the recipe.

### Editing a Recipe

1. Click on the "Edit Recipe" button next to the recipe you want to edit.
2. Update the recipe details as needed.
3. Click "Submit" to save the changes.

### Deleting a Recipe

1. Click on the "Delete Recipe" button next to the recipe you want to delete.
2. Confirm the deletion.

## Database Structure

The database contains two tables named `users` `yemekler`:


## SQL Export File

An SQL export file (`php_proje.sql`) is provided to set up the database structure and some initial data. This file should be imported into your MySQL database to get started quickly.


## Acknowledgements

- This project uses [Bootstrap](https://getbootstrap.com/) for styling.
- Icons are provided by [Glyphicons](https://glyphicons.com/).
- Here check this project online [Click Here](http://95.130.171.20/~st20360859008).


