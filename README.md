# awesomeNetwork
My first project with symfony4. It's a simple user's network application: 
users can signup with email, username and password,
login, logout, create a user's profile with an avatar and a description of themselves, update or delete the profile, 
upload or delete a profile picture.

It uses the security bundle to load users from a database and bcrypt to hash the passwords.
Doctrine and ORM for database actions, Twig as templating engine, Bootstrap4 for the Styles.

Some technical details: you need composer, MySQL and at least PHP 7.1 to run this application. 

follow those steps:

1) run "composer install".
2) Edit the .env file with your mysql (or whatever) username and password, and database name:        DATABASE_URL=mysql://your_username:your_password@127.0.0.1:3306/your_database_name
3) Configure your db driver and server_version in config/packages/doctrine.yaml
4) Create the database: run "php bin/console doctrine:database:create" and the tables: "php bin/console doctrine:migrations:diff" 
     "php bin/console doctrine:migrations:migrate"
5) Create the folder "uploads/userimages" in the public folder, it will hold the user's profile pictures. (for some reason it disappeared.)
6) Start the server: run "php -S 127.0.0.1:8000 -t public" in your terminal, and navigate within your browser to "http://localhost:8000/"
7) Have fun. signup users, login, update profiles, upolad a profile picture, delete profiles. 
Feel free to add more feautures.
However, if you want to use it for real world applications, consider all possible vulnerabilities and security issues, I am not responsible for this.

