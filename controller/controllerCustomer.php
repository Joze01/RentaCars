<?php 
include_once("../model/Persistencia.class.php");
$con = new Persistencia;

$sql="";
$customer_RentersName = isset($_POST['rentersName']) ? $_POST['rentersName'] : null;
$customer_DOB = isset($_POST['bod']) ? $_POST['bod'] : null;
$customer_Address = isset($_POST['address']) ? $_POST['address'] : null;
$customer_Phone = isset($_POST['phone']) ? $_POST['phone'] : null;
$customer_City = isset($_POST['city']) ? $_POST['city'] : null;
$customer_State = isset($_POST['state']) ? $_POST['state'] : null;
$customer_ZipCode = isset($_POST['zipcode']) ? $_POST['zipcode'] : null;
$customer_DriverLicense = isset($_POST['driverlicence']) ? $_POST['driverlicence'] : null;
$customer_DLState = isset($_POST['dlstate']) ? $_POST['dlstate'] : null;
$customer_ExpirationDate = isset($_POST['expirationDl']) ? $_POST['expirationDl'] : null;
$customer_InsuranceCompany = isset($_POST['insurrancecompany']) ? $_POST['insurrancecompany'] : null;
$customer_Policy = isset($_POST['policy']) ? $_POST['policy'] : null;
$customer_AdditionalDriver = isset($_POST['additionalName']) ? $_POST['additionalName'] : null;
$customer_DriverLicenseAdditional = isset($_POST['additionallicense']) ? $_POST['additionallicense'] : null;

$sql="INSERT INTO customer(customer_RentersName, customer_DOB, customer_Address, customer_Phone, customer_City, customer_State, customer_ZipCode, customer_DriverLicense, customer_DLState, customer_ExpirationDate, customer_InsuranceCompany, customer_Policy, customer_AdditionalDriver, customer_DriverLicenseAdditional) VALUES ('".$customer_RentersName."','".$customer_DOB."','".$customer_Address."','".$customer_Phone."','".$customer_City."','".$customer_State."','".$customer_ZipCode."','".$customer_DriverLicense."','".$customer_DLState."','".$customer_ExpirationDate."','".$customer_InsuranceCompany."','".$customer_Policy."','".$customer_AdditionalDriver."','".$customer_DriverLicenseAdditional."')";

$con->queryExecute($sql,"Cliente Registrado");

/*
INSERT INTO customer(customer_RentersName, customer_DOB, customer_Address, customer_Phone, customer_City, customer_State, customer_ZipCode, customer_DriverLicense, customer_DLState, customer_ExpirationDate, customer_InsuranceCompany, customer_Policy, customer_AdditionalDriver, customer_DriverLicenseAdditional) VALUES ('Jose Arteaga','4121212','AShahsdahsd','AShahsdahsd','','asjdasd','Texas','55573','1234567890','Tx','','Segure Company','p1111','Carlos Magaña','55555555')


*/





?>