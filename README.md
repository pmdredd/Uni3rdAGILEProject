### Setting up the project
Make sure you have the following installed:

- PHP 7.2+
    - If you are using windows, I recommend installing [XAMPP](https://www.apachefriends.org/download.html)
- Composer 1.9+
    - This is used to manage the dependencies for the project, namely PHPUnit. Installation instructions can be found [here](https://getcomposer.org/download/)
- (Optional) SQLiteBrowser 3+
    - This can be used to view the database (database/courseworkapp.db). Download it [here](https://sqlitebrowser.org/dl/)


Download the master branch by running the following in Git Bash/PowerShell:  
 `git clone https://github.com/Lairdd1989/Uni3rdAGILEProject.git`

Open up the repository in the terminal by doing  
`cd Uni3rdAGILEProject`

Install PHPUnit by running:  
  `composer install`

### Application structure
The database can be found at database/courseworkapp.db.  
The tests directory holds all the tests for the app, including the example test.  
composer.json is the file Composer uses to determine dependencies as well as basic info about the project. **You can ignore this.**  
composer.lock makes sure the dependencies installed by Composer are consistent. **You can ignore this.**
example.php is a small php function that adds two numbers together and can be used as an example to show how PHPUnit works.
  


### Running a test
You can run a specific test by running that test file with PHPUnit. You can use the example.php and tests/example_test.php 
I prepared earlier. To run the test, execute the following command:  
`.\vendor\bin\phpunit .\tests\example_test.php`  
The first part of the command calls the PHPUnit executable, and the second part of the command is where the test file is located.
