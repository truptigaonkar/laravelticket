# TICKET SYSTEM

A TICKET SYSTEM application built using the Laravel framework.

Features:
1.	It is an unauthenticated system which allows users to perform various tasks: 
    •	List categories and open new category and delete category
    •	List all tickets
    •	Open a ticket with attachment, category selected 
    •	View ticket with comments
    •	Filter tickets based on categories in Ticket view section
    •	Edit/Update a ticket with attachment, category selected
    •	Close/Reopen a ticket 
    •	Comment a ticket
    •	Delete a ticket with comments related to specific ticket
2.	Users can add/edit/delete ticket with attachment (any file extension). Images can be shown on webpage but other files can be  downloaded to watch.
3.	Users can add/edit/delete ticket with category selected from dropdown list.
4.	Users can see total number of tickets and number of comments related to each ticket on home page
5.	Pagination feature is available on home page
6.	MYSQL dump of the database named ‘laravelticket.sql’ is provided.
7.	Images will be stored in folder ‘public/images’ using laravel package ‘File Storage’

### Prerequisites

•	XAMPP (start MySQL, Apache service)
•	Phpmyadmin 
•	Php laravel (Laravel Framework 5.4.36)
•	Text editor

## Getting Started

Step 1: Download and add the folder inside ‘C:\xampp\htdocs’

Step 2: Open phpmyadmin http://localhost/phpmyadmin/index.php , create database ‘laravelticket’ and import database dump file ‘laravelticket.sql’ into it.

Step 3: Go to command prompt

c:\xampp\htdocs\laravelticket>php artisan serve 

Visit http://127.0.0.1:8000/ to see the application in action.

Note: If you cannot see images (attachments) after viewing ticket , then remove folder ‘storage’ from ‘app\public’ and then again link it using command as follows:
‘php artisan storage:link’

### Database Schema

Database: laravelticket
A ticket belong to a category and a category has many tickets.
A comment belongs to a ticket and a ticket has many comments 




