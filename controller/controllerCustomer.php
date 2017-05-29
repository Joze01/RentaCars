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
$sql="SELECT * FROM customer ORDER BY customer_Id DESC LIMIT 1";
$resultado = $con->getResult($sql);
$idusuario=0;

while($row = $resultado->fetch_assoc()){
$idusuario=$row['customer_Id'];
}


$Rental_Out=isset($_POST['rentersOut']) ? $_POST['rentersOut'] : null;
$Rental_IN=isset($_POST['rentersIn']) ? $_POST['rentersIn'] : null;
$Rental_VechicleClass=isset($_POST['vehicleclass']) ? $_POST['vehicleclass'] : null;
$Rental_VechicleLicense=isset($_POST['vechiclelicense']) ? $_POST['vechiclelicense'] : null;
$Rental_VechicleYear=isset($_POST['vehicleyear']) ? $_POST['vehicleyear'] : null;
$Rental_VehicleMake=isset($_POST['vechiclemake']) ? $_POST['vechiclemake'] : null;

$Rental_VechicleModel=isset($_POST['vechiclemodel']) ? $_POST['vechiclemodel'] : null;;

$Rental_VehicleMileageOut=isset($_POST['vehiclemileageout']) ? $_POST['vehiclemileageout'] : null;
$Rental_VechicleMileageIn=isset($_POST['vehiclemileagein']) ? $_POST['vehiclemileagein'] : null;
$Rental_FuelOut=isset($_POST['fuelout']) ? $_POST['fuelout'] : null;
$Rental_FuelIn=isset($_POST['fuelin']) ? $_POST['fuelin'] : null;
$Note_OriginalVehicle=isset($_POST['notesoriginalvehicle']) ? $_POST['notesoriginalvehicle'] : null;
$Notes_DOL=isset($_POST['notesdol']) ? $_POST['notesdol'] : null;
$Notes_Notes=isset($_POST['noesnotes']) ? $_POST['noesnotes'] : null;

$Charges_Days=isset($_POST['chargesdays']) ? $_POST['chargesdays'] : null;
$Charges_weeklyrate=isset($_POST['chargesweeklyrate']) ? $_POST['chargesweeklyrate'] : null;
$Charges_DailyRate=isset($_POST['chargesdaylyrate']) ? $_POST['chargesdaylyrate'] : null;
$Charges_Excess=isset($_POST['chargesexcessmiles']) ? $_POST['chargesexcessmiles'] : null;
$Charges_ExcessRate=isset($_POST['chargesexcessrate']) ? $_POST['chargesexcessrate'] : null;
$Charges_Repairs=isset($_POST['chargesrepair']) ? $_POST['chargesrepair'] : null;
$Charges_FuelService=isset($_POST['chargesservice']) ? $_POST['chargesservice'] : null;
$Charges_Cleaning=isset($_POST['chargescleaning']) ? $_POST['chargescleaning'] : null;
$Charges_Tax=isset($_POST['taxesh']) ? $_POST['taxesh'] : null;
$Charges_PDC=isset($_POST['pdc']) ? $_POST['pdc'] : null;
$Charges_Deposit=isset($_POST['deposit']) ? $_POST['deposit'] : null;
$Charges_Payment=isset($_POST['payment']) ? $_POST['payment'] : null;



$sql="INSERT INTO rental(customer_id, Rental_Out, Rental_IN, Rental_VechicleClass, Rental_VechicleLicense, Rental_VechicleYear, Rental_VehicleMake, Rental_VechicleModel, Rental_VehicleMileageOut, Rental_VechicleMileageIn, Rental_FuelOut, Rental_FuelIn, Note_OriginalVehicle, Notes_DOL, Notes_Notes, Charges_Days, Charges_weeklyrate, Charges_DailyRate, Charges_Excess, Charges_ExcessRate, Charges_Repairs, Charges_FuelService, Charges_Cleaning, Charges_Tax, Charges_PDC, Charges_Deposit, Charges_Payment) VALUES (".$idusuario.",'".$Rental_Out."','".$Rental_IN."','".$Rental_VechicleClass."','".$Rental_VechicleLicense."','".$Rental_VechicleYear."','".$Rental_VehicleMake."','".$Rental_VechicleModel."',".$Rental_VehicleMileageOut.",".$Rental_VechicleMileageIn.",'".$Rental_FuelOut."','".$Rental_FuelIn."','".$Note_OriginalVehicle."','".$Notes_DOL."','".$Notes_Notes."',".$Charges_Days.",".$Charges_weeklyrate.",".$Charges_DailyRate.",".$Charges_Excess.",".$Charges_ExcessRate.",".$Charges_Repairs.",".$Charges_FuelService.",".$Charges_Cleaning.",".$Charges_Tax.",".$Charges_PDC.",".$Charges_Deposit.",".$Charges_Payment.")";

$con->queryExecute($sql,"Renta Registrada");



$sql="SELECT * FROM rental ORDER BY customer_Id DESC LIMIT 1";
$resultado = $con->getResult($sql);
$idReport=0;
while($row = $resultado->fetch_assoc()){
$idReport=$row['rental_id'];
}


 header("Location: ../view/fpdf181/generator/pdf.php?id=".$idReport);

?>