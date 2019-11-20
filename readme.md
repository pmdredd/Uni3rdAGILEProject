# GA30003 Agile Project
#### Project for 3rd Year uni course on AGILE   
#### Requirement - To provide a Student Record System allowing the tracking of coursework submissions, assessment marks and averages  

---

### Team 4
#### Members
* Stuart Anderson - Communications
* Derek Brankin - Scrum master
* Jack Bremner - Developer
* Jack Laird - Github/Teams

---

### Setting up the project
#### Requirements
Make sure you have the following installed:

- PHP 7.2+
    - If you are using windows, I recommend installing [XAMPP](https://www.apachefriends.org/download.html)
- Composer 1.9+
    - This is used to manage the dependencies for the project, namely PHPUnit. Installation instructions can be found [here](https://getcomposer.org/download/)
- Git
    - This is used for version control and is required to get a (development) copy of the project to work on. Any contributions to the project must be made via Git.
      It can be downloaded for Windows [here](https://git-scm.com/downloads)
- (Optional) SQLiteBrowser 3+
    - This can be used to view the database (database/courseworkapp.db). Download it [here](https://sqlitebrowser.org/dl/)
  
Open the folder you want to keep the project in e.g. Desktop/code, then right-click and select the option 'Git Bash here' (or open the same folder in PowerShell)  

#### Steps
Download the master branch by running the following in Git Bash/PowerShell:  
 `git clone https://github.com/Lairdd1989/Uni3rdAGILEProject.git`

Open up the repository in the terminal by doing  
`cd Uni3rdAGILEProject`

Install PHPUnit by running:  
  `composer install`

If you have PHP installed (via XAMPP) then you can run the following command to get a local version of the project running:  
  `php -S localhost:8000`

### Running the tests
You can run all tests by executing the following command:  
`.\vendor\bin\phpunit .\tests\`  
The first part of the command calls the PHPUnit executable, and the second part of the command is the directory where the test files are located.
To run a specific test, give a specific test file to PHPUnit e.g.
`.\vendor\bin\phpunit .\tests\StudentsTest.php`

### Application structure
The sqlite3 database file can be found at /database/courseworkapp.db.  
The /tests directory holds all the tests for the app.  
JS and CSS files can be found in the /js and /css folders.  
composer.json is the file Composer uses to determine dependencies as well as other info about the project e.g. authors. **You can ignore this.**  
composer.lock makes sure the dependencies installed by Composer are consistent for everyone. **You can ignore this.**  
  
The files for each feature are found in that feature's directory, for example all files relating to the Students are found in /students. These directories usually contain one 'main' PHP file that define all the necessary functions (e.g. student_functions.php), and then other PHP files that only use these functions and display data (e.g. all_students.php).