# WartexStore

WartexStore is a PHP-based online store for games and applications with essential features to simplify user experience and management.

## Features
- **User Login with Element API**: Seamless authentication via [elemsocial.com](https://elemsocial.com).
- **MySQL Database**: Reliable data storage for users, games, and purchases.
- **Admin Panel**: Manage store content and settings efficiently.
- **Game Pages**: Individual pages for each game, similar to popular stores.
- **User Profiles**: Personalized user profiles for account management.
- **Basic Functionality**: Core features implemented (library currently non-functional).
- **Simple Design**: Basic front-end layout (requires improvement).

## Requirements
- PHP 7.4 or later
- MySQL database
- Web server (Apache, Nginx, etc.)

## Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/wartexstore.git
   ```

2. Set up the database:
   - Import the provided SQL file (`database.sql`) into your MySQL server.
   - Configure database credentials in the `config.php` file.

3. Set up Element API:
   - Register your app on [elemsocial.com](https://elemsocial.com).
   - Update API keys in `config.php`.

4. Deploy the application:
   - Place the project files in your web server’s root directory.
   - Ensure the `public` directory is accessible.

5. Access the store:
   - Open your browser and navigate to `http://yourdomain.com`.

## Usage
- **Admin Panel**: Accessible via `/admin`. Use admin credentials to log in.
- **User Authentication**: Log in with Element API.

## Known Issues
- **Library Non-functional**: Some features are not fully implemented yet.
- **Basic Front-End Design**: Requires enhancements for better user experience.

## Contributing
Feel free to submit pull requests or report issues in the repository.

## License
This project is licensed under the MIT License. See `LICENSE` for details.

---

*WartexStore is a work in progress, and contributions are welcome!*
