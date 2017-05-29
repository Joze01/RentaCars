<?php
include_once("../model/Persistencia.class.php");
$con = new Persistencia;


$sql="SELECT * FROM rental inner join customer on customer.customer_Id=rental.customer_id";
$resultado = $con->getResult($sql);


while($row = $resultado->fetch_assoc()){
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

	echo "<tr>";
		echo "<td>".$row['rental_id']."</td>";
		echo "<td>".$row['customer_RentersName']."</td>";
		echo "<td>".$row['Rental_Out']."</td>";
		echo "<td>".$row['Rental_IN']."</td>";
		echo "<td>".$row['Rental_VechicleClass']."</td>";
		echo "<td>".$row['Rental_VechicleModel']."</td>";
		echo "<td>$".$due."</td>";
		echo "<td><a href='fpdf181/generator/pdf.php?id=".$row['rental_id']."' class='btn btn-success btn-large'>VIEW REPORT</button></td>";

	echo "</tr>";


}




?>