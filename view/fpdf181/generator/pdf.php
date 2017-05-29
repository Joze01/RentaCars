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
	$this->SetFont('Arial','B',8);
	$this->Cell(69,6,'some text here',0,0,'C',false);
	$this->Cell(69,6,'LIABILITY X_________:',0,0,'L',false);
	$this->Cell(69,10,'DAILY RATE: '.$dayRate,0,0,'L',false);
	$this->Ln(5);
	$this->SetFont('Arial','B',6);
	$this->Cell(69,6,'* Declined *',0,0,'C',false);
	$this->Cell(69,6,'COMPRENHENSIVE COLLISION X_____________',0,0,'C',false);
	$this->Cell(69,10,'WEEKLY RATE: '.$weekrate,0,0,'L',false);
	$this->Ln(5);
	$this->SetFont('Arial','B',6);
	$this->Cell(69,6,'X ________',0,0,'L',false);
	$this->Cell(69,6,'Insurrance .... some thext',0,0,'C',false);
	$this->Cell(69,10,'EXCESS MILES: '.$excessMiles,0,0,'L',false);
	$this->Ln(5);
	$this->Cell(138);
	$this->Cell(69,10,'RATE($35Mile): '.$rateExcess,0,0,'L',false);
	$this->Ln(5);
	$this->Cell(138,6,'ACKNOWLEDGEMENT OF TERMS AND CONDITIONS',1,0,'C',true);
	$this->Cell(69,10,'SUB TOTAL: '.$subTotal1,0,0,'C',false);
	$this->Ln(5);
	$this->Cell(138,6,'',0,0,'L',false);
	$this->Cell(69,10,'REPAIRS: '.$repairs,0,0,'L',false);
	$this->Ln(5);
	$this->Cell(138,6,'',0,0,'L',false);
	$this->Cell(69,10,'FUEL/SERVICE: '.$service,0,0,'L',false);
	$this->Ln(5);
	$this->Cell(138,6,'',0,0,'L',false);
	$this->Cell(69,10,'CLEANING: '.$cleaning,0,0,'L',false);
	$this->Ln(5);
	$this->Cell(138,6,'',0,0,'L',false);
	$this->Cell(69,10,'SUB TOTAL: '.$subTotal2,0,0,'C',false);
	$this->Ln(5);
	$this->Cell(138,6,'',0,0,'L',false);
	$this->Cell(69,10,'TAX(9.00%): '.$tax,0,0,'L',false);
	$this->Ln(5);
	$this->Cell(138,6,'',0,0,'L',false);
	$this->Cell(69,10,'PDC(9.95/DAY): '.$pdc,0,0,'L',false);
	$this->Ln(8);
	$this->Cell(138,6,'',0,0,'L',false);
	$this->Cell(69,10,'TOTAL CHARGES: '.$Total,0,0,'L',false);
	$this->Ln(5);
	$this->Cell(138,6,'',0,0,'L',false);
	$this->Cell(69,10,'DEPOSIT: '.$deposit,0,0,'L',false);
	$this->Ln(5);
	$this->Cell(138,6,'',0,0,'L',false);
	$this->Cell(69,10,'PAYMENT: '.$payment,0,0,'L',false);
	$this->Ln(10);
	$this->Cell(138,6,'',0,0,'L',false);
	$this->Cell(69,2,'AMOUNT DUE: '.$due,0,0,'L',false);
	$this->Ln(5);
	$this->Cell(138,6,'',0,0,'L',false);

	$this->Ln(5);
	$this->Cell(138,6,'',0,0,'L',false);

	$this->SetFont('Arial','B',10);
	$this->Ln(12);
	$this->Cell(138,6,'RENTERS SIGNATURE: ___________________________________',0,0,'L',false);


}




function Pagina2(){
$texto = "";
$this->Cell(0,0,'TITLE',0,0,'C',false);
$this->ln(8);

$this->MultiCell(190,6,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tincidunt ultricies magna hendrerit tristique. Integer ullamcorper urna non tortor eleifend faucibus. Cras eu placerat ex, et blandit quam. Integer eu odio urna. Suspendisse vel nibh diam. In rutrum sem et purus rhoncus, nec eleifend elit convallis. Quisque et leo non ipsum convallis maximus. Maecenas interdum lobortis finibus. Nam maximus, nibh id fringilla bibendum, mauris risus mattis massa, id gravida urna odio vitae metus. Duis tincidunt eros ex, et vestibulum nisl facilisis vitae. Fusce gravida, urna non consequat tincidunt, tortor elit convallis lectus, ut aliquet nibh diam et enim. Nulla varius vulputate urna volutpat suscipit. Morbi sit amet diam odio. Maecenas nec sem blandit, sagittis augue cursus, egestas sapien. In eget tincidunt elit. Donec gravida nisl libero, ut scelerisque dolor fermentum sed.

Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed velit augue, ornare ut malesuada vitae, tempus ac lorem. Curabitur interdum risus ut magna rhoncus, egestas vestibulum lectus malesuada. Suspendisse ut fermentum est. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat risus, ultricies sed pulvinar in, porta sed eros. Nulla pellentesque condimentum ex, quis placerat nulla posuere vitae. Sed cursus aliquam neque eget bibendum.

Cras cursus imperdiet ligula. Pellentesque ornare diam nec nisl pretium ornare. Donec justo dolor, porta in dui non, facilisis molestie nisi. Morbi lectus purus, mattis in vestibulum ut, luctus ut lorem. Donec facilisis velit arcu, sed feugiat enim feugiat sed. Maecenas fermentum tristique velit quis varius. Donec porttitor augue vitae dui semper elementum. Suspendisse ut nisi eu sapien blandit tempus semper at velit. Sed consequat velit eu libero aliquam, vitae tempus ipsum fermentum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eleifend lectus augue, in sollicitudin ante maximus eget. Sed et leo id mi fermentum pulvinar. Proin dui ligula, tempor eget tellus vel, aliquam accumsan massa. Donec bibendum sapien elit.

Aliquam a ultricies nulla. Nam dignissim fringilla laoreet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque interdum ullamcorper massa eu blandit. Nullam vestibulum sit amet ante nec facilisis. Curabitur semper viverra elementum. Suspendisse ut pharetra est. Suspendisse eleifend eget purus faucibus blandit. Nullam mattis rutrum magna sed scelerisque. Nulla facilisis sollicitudin nunc ut tincidunt. Maecenas convallis eget sem sed consequat. Quisque sit amet consectetur sem. Cras feugiat turpis ac risus ultrices, sed pharetra orci pellentesque. Nullam ultricies nunc pharetra tempus vestibulum.

Aenean mollis lacus nec venenatis luctus. Mauris pellentesque, nibh non varius auctor, eros elit varius erat, vel aliquam nulla dui sagittis eros. Donec non nisl at ipsum mattis aliquam eu in purus. Nullam scelerisque, tellus quis commodo vulputate, velit orci dapibus risus, vel vestibulum ante turpis in lectus. Nulla porta tortor quis tellus lacinia sodales. Sed elementum sapien sapien, et mollis est aliquam nec. Mauris id accumsan tellus, non facilisis elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque euismod euismod ex, vel vehicula lacus semper et. Morbi rhoncus elit at ante convallis iaculis.');

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
