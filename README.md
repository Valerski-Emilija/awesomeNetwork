# awesomeNetwork
This is my first project with symfony4. It's a simple user's network application: 
users can signup with email, username and password,
login, logout, create a user's profile with an avatar and a description of themselves, update or delete the profile, 
upload or delete a profile picture.

It uses the security bundle to load users from a database and bcrypt to hash the passwords.

Some technical details: you need at least PHP 7.1 ro run this application. 
You need to edit the .env file with your mysql (or whatever) username and password, and database name.
You will also need to create the folder "uploads/userimages" in the public folder, it will hold the user's profile pictures. (for some reason it disappeared...)

I'm not sure what you will also need to install to be able to run the application on your localhost. You can start the server with 
php -S 127.0.0.1:8000 -t public, however, navigating to localhost:8000 will throw an error that autoload.php is missing.
