# awesomeNetwork
This is my first project with symfony4. It's a simple user's network application: 
users can signup with email, username and password,
login, logout, create a user's profile with an avatar and a description of themselves, update or delete the profile, 
upload or delete a profile picture.

It uses the security bundle to load users from a database and bcrypt to hash the passwords.
Twig as templating engine, doctrine and ORM for database actions.

Some technical details: you need composer and at least PHP 7.1 to run this application. 

After having cloned or downloaded it, do following steps:

1) navigate into its folder within a terminal and run "composer install".
2) Edit the .env file with your mysql (or whatever) username and password, and database name:        DATABASE_URL=mysql://your_username:your_password@127.0.0.1:3306/your_database_name
3) Create the folder "uploads/userimages" in the public folder, it will hold the user's profile pictures. (for some reason it disappeared.)
4) Start the server: run "php -S 127.0.0.1:8000 -t public" in your terminal
5) Have fun. create users, login, update profile, upolad a profile picture, delete profiles. 
Feel free to add more feautures.
However, if you want to use it for real world applications, consider all possible bugs and security issues (I am not responsible for this).

