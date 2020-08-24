# Deputy Challenge

Prerequisite

1. PHP 7.3 and onward
2. Unix environment

==

Getting started

1. Git clone this repo https://github.com/shagenius/deputychallenge.git to your local repo
2. Go to your local repo and run composer install to get the PHPUnit package
3. Running the code:
	- command line: php index.php
	- browser: make sure apache is running and the codes are in the webroot, eg in localhost go to http://localhost/deputychallenge
	The challenge results will be outputted to your command line interface or browser.
		- to fetch different result, modify the index.php file which call the function "getSubordinates()" from the UserRole class. 
4. Update the data set
	- to test with different data set, update the class "User" or "Role" which are in the folder called "classes", User class holds all the users in the static variable 	$users and Role class holds all the roles in the static variable $roles.
	calling and initialising the class UserRole: 
		eg: 
		- $userRole = new UserRole();
		- $userRole->setRoles(Role::$roles);
		- $userRole->setUsers(User::$users);
	
5. Running PHPUnit test
	The test resides in the folder called "test"
	run the following in the command line: phpunit test/UserRoleTest.php
	
