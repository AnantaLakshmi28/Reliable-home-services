# Reliable Home Services Project
Reliable Home Services is a web based platform that connects users with professional service providers for various home services like cleaning, plumbing, electrical work, and more. Users can browse service categories, book services, make payments, and leave reviews for service providers. 

## Features

- **User Authentication**: Secure login and sign-up for customers and service providers.
- **Service Categories**: Cleaning, Plumbing, Electrical, and more.
- **Booking System**: Users can easily book services for specific time slots.
- **Real-time Notifications**: Receive notifications for booking confirmations, reminders, and updates.
- **Reviews and Ratings**: Customers can rate and review service providers.
- **Admin Dashboard**: Admins can manage services, users, and transactions.
- **SEO Optimized**: The website is built with SEO-friendly practices to ensure high ranking on search engines.

## Installation
### Prerequisites
To run this project on your local machine, ensure the following software is installed:

- **XAMPP** (for running Apache server and MySQL database)
   - Download XAMPP from [Apache Friends](https://www.apachefriends.org/download.html) and install it on your machine.

- **PHPMyAdmin**: You'll use PHPMyAdmin (bundled with XAMPP) to manage the MySQL database.


### Setup Instructions

1. **Clone the repository:**

2. **Move the project:** 

3. **Create the database:**
   -  Open your browser and go to http://localhost/phpmyadmin.
   - Create a new database (e.g., hs).
   - Import the provided SQL file (database.sql) located in the repository:
      - Go to the "Import" tab in PHPMyAdmin.
      - Select the hs.sql file from your project folder. (database file that contains sql query for create all required tables.)
      - Click on "Go" to import the database structure and data.

4. **Configure database connection:**
- The project already contains a `dbconnect.php` file for database connection.
- Ensure that the dbconnect.php file contains the correct database credentials:
```php
$server = "localhost";
$username = "root";  // Default username for XAMPP
$password = "";  // Leave blank for XAMPP default
$database = "hs";  // Name of the database you created
```
- Open your browser and navigate to http://localhost/BCA-home-Services-Project/db/dbconnect.php to make database connection.

5. **Run the project:**
- After successfully connection of database, you can access the platform -> http://localhost/BCA-home-Services-Project/index.php 


## Tech Stack
- **Front-end:** HTML, CSS, JavaScript
- **Back-end:** PHP, Ajax
- **Database:** MySQL (via PHPMyAdmin in XAMPP)
- **Server:** XAMPP (Apache, MySQL)


## How to Use

- Register as a user or log in if you already have an account.
- Browse the available services and choose the one that fits your needs.
- Select a date and time for the service and confirm the booking.
- Service providers can log in to manage their services and view appointments. Make sure Service provider can login after approvement of Admin.
- Admins can manage users, service providers, and bookings through the admin panel.

   `username` - admin  
   `password` - admin


## Contributing
Contributions are always welcome!
-  Fork the repository.
- Create a new branch for your feature or bug fix.
- Submit a pull request with a detailed description of your changes.


## Future Improvements
- **Payment Gateway Integration:** Enable users to pay for services online.
- **Mobile Optimization:** Improve the responsiveness for mobile devices.





