uvaid: lck8bq

Final Project Submission

login.html -> Login page

login.js -> Javascript for log in. Interfaces with backend to log users in

LoginController.php -> Controller for log in

LoginModel.php -> Connects to DB and verifies log in

home.php -> The main home page

home.js -> JS for home page

HomeController.php -> Handles interaction on the home page and gets data from DB

add_points.php -> Page to add points via form

add_points.js -> JS for add_points

PointsController.php -> Controller for getting data about houses and points

PointsModel.php-> Interfaces with DB to get data

PointsView.php -> Interprets data from model and outputs it all nice.

Images

home_background.jpg -> Background for home page

login_bg -> Background for login page

restricted_bg -> Background for restricted access page

gryff_crest.png -> Gryffindor Banner image

hufflepuff_crest.png -> Hufflepuff Banner image

ravenclaw_crest.png -> Ravenclaw Banner image

slytherin_crest.png -> Slytherin Banner image

mysqldump.txt -> Dump of the database


readme.txt

references.txt

How to run the web app.

1. Set up the database tables with the commands from mysqldump.txt. This creates the users and records table. Some data is already present in the tables.
Here are some users to test if necessary: Username: HarryPotter Password: goldensnitch Username: SeverusSnape Password: lilyevans.
The first page is the login page, login.html, so start there. From there, users can login and register, and the functionality is straightforward.