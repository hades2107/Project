NAME: Mobile Money Agent Commission Tracking System
DESCRIPTION: An application to manage agents in a business and track their daily commission

Before you run the app make sure to have any localhost server installed and running in your computer (Apache Server)
Apache comes with a package if you install Xampp

                      STEPS TO SETTING UP DATABASE
Install Xampp and start Apache + MySQL
Open you browser and enter https://localhost/phpmyadmin/ 
Create a database named "tracking_system"
Create 2 tables in the database; "users" & "transactions"
"users" table should have rows:
                                -id; mark A_I box, set datatype to INT
                                -username; datatype VARCHAR
                                -email; datatype VARCHAR, set Index to UNIQUE
                                -password; datatype VARCHAR
                                -role; datatype VARCHAR
                                -commission; datatype INT

"transactions" table should have rows:
                                -id; mark A_I box, set datatype to INT
                                -date; datatype DATE
                                -email; datatype VARCHAR, set Index to UNIQUE
                                -commission; datatype INT
