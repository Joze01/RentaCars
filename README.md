# RentaCars
basic template PHP + report fpdf181

PROJECT ELEMENTS
XAMPP for Windows 5.6.20
-Apache Version	Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.20
-PHP Version 5.6.20
-FPDF V 181





TO SET UP PROJECT

FPDF  http://www.fpdf.org/

Download XAMPP FOR APACHE AND MYSQL SERVER
https://www.apachefriends.org/es/index.html

1. clone repository into your apache php server
2. Load data base located at bdd/rental.sql
3. change the connection  to your mysql server: model/Conexion.php
4. Go into localhost/RentaCars/view/
5. Enjoy


TO CHANGE THE PDF CONTENT 

1. Go to RentaCars\view\fpdf181\generator\pdf.php 
2. for page 1: change function "CustomerArea" at line 58
3. for page 2: change function "Pagina2" at line 373 
4. 
Users: 
user: user
password: 123456
