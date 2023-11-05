######################
ESX Homework Project
######################
Using CodeIgniter 3 Framework


Step 1: Adjust application/config/config.php on line 26 with your path for the project

Step 2: Process the SQL data before testing the project and don't forget to adjust application/config/database.php with your credentials. SQL provided bellow.

Step 3: Test the project accessing the default url you've set up on step 1


######################
API Functionality
######################
In order to get users JSON, use /api/users/id where id is the user's id in DB

In order to soft delete a user use /api/soft_delete/id where id is the user's id in DB

In order to reactivate a user use /api/reactivate/id where id is the user's id in DB

In order to hard delete a user use /api/hard_delete/id where id is the user's id in DB

######################
SQL Data
######################
Access https://devand.ro/esx.sql
(Couldn't think of a free cdn)