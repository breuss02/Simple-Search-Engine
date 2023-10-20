# PHP Search Engine

Welcome to the PHP Search Engine project! This simple PHP application allows users to search for websites stored in a MySQL database and insert new websites into the database. To get started, please follow these instructions:

## Installation

1. Clone the repository to your local machine

2. Ensure that you have PHP and a MySQL database server (e.g., XAMPP or WAMP) installed on your system.

3. Open the project directory.

4. **Configure the Database Connection:**

- Open the following PHP files in a text editor: `insert_site.php` and `result.php`.
- Locate the line that establishes the database connection:

  ```php
  $connect = mysqli_connect("localhost", "root", "", "search");
  ```

- Replace `"search"` with the name of your MySQL database. Be sure to change this line in both PHP files.

5. **Create the Required Database and Tables:**

- Create a new database in your MySQL server with the same name you specified in step 4.
- Create a table named `sites` with these columns:
  - `id` (auto-increment)
  - `site_title` (VARCHAR)
  - `site_link` (VARCHAR)
  - `site_keywords` (VARCHAR)
  - `site_desc` (TEXT)
  - `site_image` (VARCHAR)

You can use a tool like phpMyAdmin to create the database and tables or execute SQL queries via the MySQL command line.

6. Ensure your web server (e.g., Apache) is running.

7. Open a web browser and navigate to the project's main page (e.g., `http://localhost/php-search-engine`).

## Usage

- The main page allows users to insert new websites into the database. Fill in the required information and click "Add Site."

- The search page (`search1.html`) enables users to enter search queries to retrieve matching results from the database.

## Note

This is a basic example of a search engine project. When deploying in a production environment, remember to implement security measures, such as protecting against SQL injection and validating user inputs to ensure the application's security.



