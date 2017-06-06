<?php
require('../fpdf.php');
require('../../../model/Persistencia.class.php');



class PDF extends FPDF
{





function Header()
{

	global $title;
	// Logo
    $this->Image('logo.jpg',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',10);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(40,10,'7120 Hayvenhurts Avenue #111 Van Nuys, ca 91344 ','C');
    $this->Ln(5);
    $this->Cell(61);
    $this->Cell(40,10,'TEL: 818-582-5912 | Mail:Quickarentals@gmail.com','C');
    // Salto de línea
    $this->Ln(20);

}

function Footer()
{
	// Posición a 1,5 cm del final
	$this->SetY(-15);
	// Arial itálica 8
	$this->SetFont('Arial','I',8);
	// Color del texto en gris
	$this->SetTextColor(128);
	// Número de página
	$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}

function ChapterTitle($num, $label)
{
	// Arial 12
	$this->SetFont('Arial','',12);
	// Color de fondo
	$this->SetFillColor(200,220,255);
	// Título
	$this->Cell(0,6,"Capítulo $num : $label",0,1,'L',true);
	// Salto de línea
	$this->Ln(4);
}

function CustomerArea(){
	$con = new Persistencia;	
	$id=$_GET['id'];
	/*VARIABLES*/	
	$RentersName="";
	$RentersAddress="";
	$RentersBOD="";
	$RentersPhone="";
	$RentersState="";
	$RentersCity="";
	$RentersZipCode="";
	$RentersDLState="";
	$RentersLicense="";
	$RentersExpiration="";
	$RentersCompany="";
	$RentersAditional="";
	$RentersAditionalLicense="";

	$VehicleClass="";
	$VehicleLicense="";
	$VehicleYear=2000;
	$VehicleMake="";
	$VehicleModel="";
	$VehiclegasIn="";
	$Vehiclegasout="";
	$VehicleMileageOut=0;
	$VehicleMileageIn=0;
	$VehicleMileageDriven=0;

	$NotesRenters="";
	$NotesDOL="";
	$NotesNotes="";


	$days=0;
	$dayRate=0;
	$weekrate=0;
	$excessMiles=0;
	$rateExcess=0;
	$subTotal1=0;
	$repairs=0;
	$service=0;
	$cleaning=0;
	$subTotal2=0;
	$tax=0;
	$pdc=0;
	$Total=0;
	$payment=0;
	$deposit=0;
	$due=0;



	$sql="select * from customer inner join rental  on rental.customer_id=customer.customer_Id where rental_id=".$id;
	$resultado = $con->getResult($sql);

	while($row = $resultado->fetch_assoc()){
	/*VARIABLES*/	
	$RentersName=$row['customer_RentersName'];
	$RentersAddress=$row['customer_Address'];
	$RentersBOD=$row['customer_DOB'];
	$RentersPhone=$row['customer_Phone'];
	$RentersState=$row['customer_State'];
	$RentersCity=$row['customer_City'];
	$RentersZipCode=$row['customer_ZipCode'];
	$RentersDLState=$row['customer_DLState'];
	$RentersLicense=$row['customer_DriverLicense'];
	$RentersExpiration=$row['customer_ExpirationDate'];
	$RentersCompany=$row['customer_InsuranceCompany'];
	$RentersAditional=$row['customer_AdditionalDriver'];
	$RentersAditionalLicense=$row['customer_DriverLicenseAdditional'];

	$VehicleClass=$row['Rental_VechicleClass'];
	$VehicleLicense=$row['Rental_VechicleLicense'];
	$VehicleYear=$row['Rental_VechicleYear'];
	$VehicleMake=$row['Rental_VehicleMake'];
	$VehicleModel=$row['Rental_VechicleModel'];
	$VehicleMileageOut=$row['Rental_VehicleMileageOut'];
	$VehicleMileageIn=$row['Rental_VechicleMileageIn'];
	$VehicleMileageDriven=$VehicleMileageIn-$VehicleMileageOut;
	$VehiclegasIn=$row['Rental_FuelIn'];
	$Vehiclegasout=$row['Rental_FuelOut'];



	$NotesRenters=$row['Note_OriginalVehicle'];
	$NotesDOL=$row['Notes_DOL'];
	$NotesNotes=$row['Notes_Notes'];


	$days=$row['Charges_Days'];
	$dayRate=$row['Charges_DailyRate'];
	$weekrate=$row['Charges_weeklyrate'];
	$excessMiles=$row['Charges_Excess'];
	$rateExcess=$row['Charges_ExcessRate'];

	if($weekrate>0){
		$subTotal1=$weekrate*($days/7);
	}else{
		$subTotal1=$dayRate*($days);
	}
	




	$repairs=$row['Charges_Repairs'];
	$service=$row['Charges_FuelService'];
	$cleaning=$row['Charges_Cleaning'];
	$subTotal2=$repairs+$service+$cleaning;
	$tax=$row['Charges_Tax'];
	$pdc=$row['Charges_PDC'];
	$Total=$tax+$pdc+$subTotal2+$subTotal1;
	$payment=$row['Charges_Payment'];
	$deposit=$row['Charges_Deposit'];
	$due=$Total-$payment-$deposit;
	}

	$this->SetFont('Arial','',10);
	// Color de fondo
	$this->SetFillColor(224,224,224);
	//header table
	$this->Cell(110,6,'CUSTOMER INFORMATION',1,0,'C',true);
	$this->Cell(78,6,'RENTAL VEHICLE',1,0,'C',true);

	$this->Ln(6);

	//Customer Information
	$this->Cell(110,6,'Renters Name: '.$RentersName,1,'L',false);
	$this->Cell(78,6,'Vehicle Class: '.$VehicleClass,1,'L',false);

	

	$this->Ln(6);
	$this->Cell(110,6,'Address: '.$RentersAddress,1,'L',false);
	$this->Cell(45,6,'License #: '.$VehicleLicense,1,'L',false);
	$this->Cell(33,6,'Year: '.$VehicleYear,1,'L',false);
	$this->Ln(6);
	$this->Cell(30,6,'BOD: '.$RentersBOD,1,0,'L',false);
	$this->Cell(40,6,'Phone: '.$RentersPhone,1,0,'L',false);
	$this->Cell(40,6,'State: '.$RentersState,1,0,'L',false);
	$this->Cell(33,6,'Make: '.$VehicleMake,1,'L',false);
	$this->Cell(45,6,'Model: '.$VehicleModel,1,'L',false);
	$this->Ln(6);
	$this->Cell(30,6,'City:	'.$RentersCity,1,0,'L',false);
	$this->Cell(40,6,'Zip Code: '.$RentersZipCode,1,0,'L',false);
	$this->Cell(40,6,'DL State: '.$RentersDLState,1,0,'L',false);
	$this->Cell(78,6,'Mileage Out: '.$VehicleMileageOut,1,0,'L',false);
	
	$this->Ln(6);
	$this->Cell(60,6,'Drivers License #: '.$RentersLicense,1,0,'L',false);
    $this->Cell(50,6,'Expiration Date: '.$RentersExpiration,1,0,'L',false);
    $this->Cell(78,6,'Mileage In: '.$VehicleMileageIn,1,0,'L',false);
	$this->Ln(6);
	$this->Cell(110,6,'Insurrance Company: '.$RentersCompany,1,'L',false);
	$this->Cell(78,6,'Mileage Driven: '.$VehicleMileageDriven,1,0,'L',false);
$this->Ln(6);
	$this->Cell(110,6,'Additional Driver: '.$RentersAditional,1,'L',false);
	$this->Cell(78,6,'--- No Gasoline Refunds ---',1,0,'C',false);
	$this->Ln(6);
	$this->Cell(60,6,'Drivers License #: '.$RentersAditionalLicense,1,0,'L',false);
	$this->Cell(50);
	$this->Cell(45,6,'Fuel Out: '.$Vehiclegasout,1,0,'L',false);
	$this->Cell(33,6,'Fuel In: '.$VehiclegasIn,1,0,'L',false);
	


	//NOTES
		//box
		//box
	$this->Line(10,35, 10,107);//izquierda vertical
	$this->Line(120,35, 120,90); //medio
	$this->Line(10,107, 10,255);//izquierda vertical
	$this->Line(130,100, 130,141);//Centro
	$this->Line(198,100, 198,255);//derecha vertical
	$this->Line(78,135, 78,170);//Centro
	$this->Line(148,135, 148,255);//Centro 2


	$this->Line(198,35, 198,107); //derecha vertical
	$this->Line(10,255, 198,255); //FONDO

	
	$this->Ln(6);
	$this->Cell(120,6,'NOTES',1,0,'C',true);
	$this->Cell(68,6,'VEHICLE DAMAGE REPORT',1,0,'C',true);
	$this->Ln(6);
	$this->Cell(90,6,'Renters Original Vehicle: '.$NotesRenters,1,'L',false);
	$this->Cell(30,6,'DOL: '.$NotesDOL,1,'L',false);
	$this->Image('car2.jpg',137,100,55);
	$this->Ln(6); 
	$this->MultiCell(120,8,'Notes: '.$NotesNotes,0,'L',false);
	$this->Ln(20);
	$this->Cell(120);
	$this->Cell(68,6,'Damage Notes:  ',1,'L',false);
	$this->Ln(6);
	//
	

	$this->Cell(138,6,'RENTAL INSURANCE',1,0,'C',true);
	$this->Cell(50,6,'CHARGES',1,0,'C',true);
	$this->Ln(6);
	$this->SetFont('Arial','B',8);
	$this->Cell(69,6,'PROPERTY DAMAGE COVERAGE(PDC)',0,0,'C',false);
	$this->Cell(69,6,'YOU ACKNOWLEDGE AND CONFIRM THAT:',0,0,'C',false);

	$this->Cell(69,10,'DAYS: '.$days,0,0,'L',false);




	$this->Ln(5);
	$this->SetFont('Arial','',6);
	$this->Cell(69,6,'renter request property Damage Coverage at daily',0,0,'C',false);
	$this->SetFont('Arial','B',8);
	$this->Cell(69,6,'LIABILITY X_________:',0,0,'L',false);
	$this->Ln(3);
	$this->SetFont('Arial','',6);
	$this->Cell(69,6,'fee Shown in adjoining column(THIS IS NOT ',0,0,'C',false);
	$this->Ln(3);
	$this->Cell(69,6,'LIABILITY INSURANCE) ',0,0,'C',false);

	$this->SetFont('Arial','B',8);
	$this->Cell(69,6,'COMPRENHENSIVE COLLISION X_____________',0,0,'L',false);
	$this->SetFont('Arial','B',6);
	$this->Cell(69,10,'DAILY RATE: $'.$dayRate,0,0,'L',false);
	$this->Ln(5);
	$this->SetFont('Arial','B',6);
	$this->Cell(69,6,'* Declined *',0,0,'C',false);
	$this->Cell(69,6,'',0,0,'C',false);
	$this->Cell(69,10,'WEEKLY RATE: $'.$weekrate,0,0,'L',false);
	$this->Ln(5);
	$this->SetFont('Arial','B',6);
	$this->Cell(69,6,'X ________',0,0,'L',false);
	$this->Cell(69,6,'Insurrance .... some thext',0,0,'C',false);
	$this->Cell(69,10,'EXCESS MILES: '.$excessMiles,0,0,'L',false);
	$this->Ln(5);
	$this->Cell(138);
	$this->Cell(69,10,'RATE($35Mile): $'.$rateExcess,0,0,'L',false);
	$this->Ln(5);
	$this->Cell(138,6,'ACKNOWLEDGEMENT OF TERMS AND CONDITIONS',1,0,'C',true);
	$this->Cell(69,10,'SUB TOTAL: '.$subTotal1,0,0,'C',false);
	$this->Ln(5);
	$this->SetFont('Arial','',10);
	$this->Cell(138,10,'RENTER EXPRESSLY ACKNOWLEDGES AND GREES THAT:',0,0,'L',false);
	$this->SetFont('Arial','B',6);
	$this->Cell(69,10,'REPAIRS: $'.$repairs,0,0,'L',false);
	$this->Ln(5);
	$this->Cell(138,6,'',0,0,'L',false);
	$this->Cell(69,10,'FUEL/SERVICE: $'.$service,0,0,'L',false);
	$this->Ln(5);
	$this->SetFont('Arial','',7);
	$this->Cell(138,6,'-The driver license presented at the time of rental is current and valid in the state of country in which it was issued. ',0,0,'L',false);
	$this->SetFont('Arial','',6);
	$this->Cell(69,10,'CLEANING: $'.$cleaning,0,0,'L',false);
	$this->Ln(3);
	$this->SetFont('Arial','',7);
	$this->Cell(138,6,'-You are responsible for any traffic violations, handling fees and any charges incurred while rental vehicle in your possession.',0,0,'L',false);
	$this->SetFont('Arial','',6);
	$this->Cell(69,10,'SUB TOTAL: $'.$subTotal2,0,0,'C',false);
	$this->Ln(3);
	$this->SetFont('Arial','',7);
	$this->Cell(138,6,'-These charges may or may not be paid by insurrance companies, body shops, attorneys and any third parties. All charges ',0,0,'L',false);
	$this->SetFont('Arial','',6);
	$this->Cell(69,15,'TAX(9.00%): $'.$tax,0,0,'L',false);
	$this->Ln(3);
	$this->SetFont('Arial','',7);
	$this->Cell(138,6,"are the renter's responsibility. Insurance company billing is inerefy a courtesy.",0,0,'L',false);
	$this->SetFont('Arial','',6);
	$this->Cell(69,20,'PDC(9.95/DAY): $'.$pdc,0,0,'L',false);
	$this->Ln(3);
	$this->SetFont('Arial','',7);
	$this->Cell(138,6,'-Your own insurance company may or may not provide Liability and Comprehensive Collision protection, you are responsible',0,0,'L',false);
	$this->SetFont('Arial','',6);
	$this->Cell(69,25,'TOTAL CHARGES: $'.$Total,0,0,'L',false);
	$this->Ln(3);
	$this->SetFont('Arial','',7);
	$this->Cell(138,6,'for all collision/abuse, damage/loss to rental vehicle even if someone else cuased it or the cuase is unknown (this excludes',0,0,'L',false);
	$this->SetFont('Arial','',6);
	$this->Cell(69,30,'DEPOSIT: $'.$deposit,0,0,'L',false);
	$this->Ln(3);
	$this->SetFont('Arial','',7);	
	$this->Cell(138,6,'mechanical failure). You are responsible for the cost of repair up to the value of rental vehicle plus loss of use lowing, ',0,0,'L',false);
	$this->SetFont('Arial','',6);
	$this->Cell(69,35,'PAYMENT: $'.$payment,0,0,'L',false);
	$this->Ln(3);
	$this->SetFont('Arial','',7);
	$this->Cell(138,6,'storage, unpound fees and administrative charges (renters insurer may cover all or part of this)',0,0,'L',false);
	$this->SetFont('Arial','',10);
	$this->Cell(69,35,'AMOUNT DUE: $'.$due,0,0,'L',false);
	$this->Ln(3);
	$this->SetFont('Arial','',7);
	$this->Cell(138,6,'-No one except renter could have a salvaged title.',0,0,'L',false);
	$this->Ln(3);
	$this->Cell(138,6,'-Renter warants that he/she has a valid insurance policy that includes Liability and comprenhensive Collision coverage',0,0,'L',false);
	$this->Ln(3);
	$this->Cell(138,6,'and that he/she will maintain this insurance during the term of this rental agreement.',0,0,'L',false);
		$this->Ln(3);
	$this->Cell(138,6,'-P.D>C or property damage COVERAGE covers the rental vehicle agains comprehensive or Collisions damage. There is',0,0,'L',false);
	$this->Ln(3);
	$this->Cell(138,6,' a $500.00 DEDUCIBLE for wich the renter will be responsible in clase of loss.',0,0,'L',false);
		$this->Ln(5);
	$this->SetFont('Arial','B',10);
	$this->MultiCell(138,4, 'SIGNATURE BELLOW CONFIRMS THAT THE TERMSN AND CONDITIONS ON BOTH SIDES OF THIS AGREEMENT HAVE BEEN READ, SIGNATURE BELOW ALSO AUTHORIZES QUICK AUTO RENTALS TO BILL DIRECTLY FOR PAYMENT REFUSED BY A THIRD PARTY TO WHOM BILLING WAS DIRECTED.',0,'c');

	$this->SetFont('Arial','',10);
	$this->Ln(5);
	$this->Cell(138,6,'RENTERS SIGNATURE: ___________________________________',0,0,'L',false);


}




function Pagina2(){
$this->SetFont('Arial','U',12);
$this->Cell(0,0,'RENTAL CONTRACT AGREEMENT &',0,0,'C',false);
$this->ln(5);
$this->Cell(0,0,'LIMITED POWER OF ATTORNEY',0,0,'C',false);
$this->ln(8);

$this->SetFont('Arial','B',10);
$this->Cell(0,0,'1. WE DON NOT RENT VEHICLES FOR MOR THATN 30 DAYS.',0,0,'L',false);
$this->ln(3);
$this->SetFont('Arial','',10);
$this->MultiCell(190,4,'Vehicles mus be returne on or before the 30th day of rental. Rental contrat can be renew or extended with a cash or credit card deposit.');

$this->ln(3);
$this->SetFont('Arial','B',10);
$this->Cell(0,0,'2. ACCIDENTS:',0,0,'L',false);
$this->ln(2);
$this->SetFont('Arial','',10);
$this->MultiCell(190,4,'In case of an accident or material loss to the rental vehicle, QUICK AUTO RENTALS reserves the right to get the repairs done at our preferred repair facility. Renter CANNOT take rental vehicle to his/her own repair facility ');

$this->ln(3);
$this->SetFont('Arial','B',10);
$this->Cell(0,0,'3. RENTAL INTERIOR:',0,0,'L',false);
$this->ln(2);
$this->SetFont('Arial','',10);
$this->MultiCell(190,4,'If the vehicle is return with stains, mud, paint, oilm gum or any other damage to the interior upholstery the renter will be responble for a $95.00 cleaning fee or the value to replace the interior part/component if it is deemed damage beyond repair.');

$this->ln(3);
$this->SetFont('Arial','B',10);
$this->Cell(0,0,'4. RENTAL EXTERIOR:',0,0,'L',false);
$this->ln(2);
$this->SetFont('Arial','',10);
$this->MultiCell(190,4,'Minor door dings to the rental vehicle are considered normal "wear and tear." Scratches where the paint has been damaged will need to repaired and repainted. Moderated and major collision damages will need to be evaluated by our preferred body shop and/or an insurance company. ' );

$this->ln(3);
$this->SetFont('Arial','B',10);
$this->Cell(0,0,'5. KEYS:',0,0,'L',false);
$this->ln(2);
$this->SetFont('Arial','',10);
$this->MultiCell(190,4,"Renter ins responsible for lost keys including the vehicle's alarm remote control. If in case the keys a locked in the car reneter is resposible for calling a road side service company to get it unlocked. " );

$this->ln(3);
$this->SetFont('Arial','B',10);
$this->Cell(0,0,'6. FLAT TIRES:',0,0,'L',false);
$this->ln(2);
$this->SetFont('Arial','',10);
$this->MultiCell(190,4,'Flat tires are NOT considered normal "Wear and tear." Renter is responsible for the repair or replacemente of the damaged tire(s). If the vehicle is driven with a LOW or FLAT tire renter will be responsible for replacing the damaged tire(s) ' );

$this->ln(3);
$this->SetFont('Arial','B',10);
$this->Cell(0,0,'7. MECHANICAL FAILURE:',0,0,'L',false);
$this->ln(2);
$this->SetFont('Arial','',10);
$this->MultiCell(190,4,'If rental vehicle breaks down, renter is required to call QUICK AUTO RENTALS immediately and the rental company will make arragements for the vehicle to be towed back to our facility, Mechanical repairs CANNOT be performed by the renter or anyone on his/her behalf, Mecanichal failure/problems are not the rent'."'s ".'reponsibility unless our mechanic/repair shop concludes that mechanical failure was a result of renter'."'s ".'abuse to the rental vehicle'  );

$this->ln(3);
$this->SetFont('Arial','B',10);
$this->Cell(0,0,'8. FUFEL CHARGES: ',0,0,'L',false);
$this->ln(2);
$this->SetFont('Arial','',10);
$this->MultiCell(190,4,'If the rental vehicle is returned with less fuel than the original fuel level at the time the contract was signed, the retner will be responsible for a fuel charges of $4.00 per gallon.'  );
$this->ln(3);
$this->MultiCell(190,4,'I,________________________________________________________ do confer limited power of attorney to QUICK AUTO RENTALS, of 7120 hayvenhurts Avenue #111 Van Nuys, Ca 91344 as the true and lawful attorney for me and in my name, place and stead, and for my use and benefit regarding: CASHING OF INSURANCE CHECK/S PAYABLE TO MYSELF AND/OR MYSELF AND QUICK AUTO RENTALS.');
$this->MultiCell(190,4,'Said Attorney in fact sahll not be limited or restricted by the foregoing specifications of the sutiacion. The Rights powers and authority of said attorneys-in-fact garanted in this instruments shall commerce and be in full force and effect on the date that I sign this Power of Attorney, and such rights, powers and authority shall remains in full force and effect thereafter until I give notice in wrigint that such power is terminated. This power of attorney conferred upon the aforementioned shall not be affected by any subsequent disability or incapacity that may befall me.');
$this->MultiCell(190,4,'Furtherore, upon a finding of incompetence by a court of appropiate jurisdiction, this Power of Attoney shall be inrrevocable until such time court determines that I am no loger competent.');
$this->ln(10);
$this->Cell(120,4,'Signature: ____________________________________________',0,0,'L',false);
$this->Cell(30,0,'Date: ______________',0,0,'L',false);

}



function ChapterBody($file)
{
	// Leemos el fichero
	$txt = $this->constuirTabla();
	// Times 12
	$this->SetFont('Times','',12);
	// Imprimimos el texto justificado
	$this->MultiCell(0,5,$txt);
	// Salto de línea
	$this->Ln();
	// Cita en itálica
	$this->SetFont('','I');
	
}

function PrintChapter($num, $title, $file)
{
	$this->AddPage();
	$this->CustomerArea();
	$this->AddPage();
	$this->pagina2();
}
}

$pdf = new PDF();

$pdf->SetAuthor('RENTAL');
$pdf->PrintChapter(1,'','tabla.php');
$pdf->Output();
?>
