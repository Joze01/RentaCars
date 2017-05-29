function subtotal1(){
		var days = 0;
		var dailyRate=0;
		var weeklyRate=0;
		var excessMiles=0;
		var excessRate = 35;
		var subtot1=0;

	days=document.getElementById("chargesdays").value;	
	dailyRate = document.getElementById("chargesdaylyrate").value;
	weeklyRate = document.getElementById("chargesweeklyrate").value;
	excessMiles = document.getElementById("chargesexcessmiles").value;
	excessRate = document.getElementById("chargesexcessrate").value;

	


	if(weeklyRate>0){
		
	subtot1 = ((days/7) * weeklyRate) + (excessMiles * excessRate);
	}
	else{
		
	subtot1 = (days * dailyRate) + (excessMiles * excessRate);
	}


	

	



	var divobj = document.getElementById('subtotal1');
    divobj.style.display='block';
    divobj.innerHTML = " $"+subtot1;
 
 return subtot1;
}

function subtotal2(){
		var reparis = 0;
		var services=0;
		var cleaning=0;
		
		var subtot2=0;

	reparis=document.getElementById("chargesrepair").value;	
	services = document.getElementById("chargesservice").value;
	cleaning = document.getElementById("chargescleaning").value;
	
	subtot2= reparis*1 + services*1 + cleaning*1;

	

	var divobj = document.getElementById('subtotal2');
    divobj.style.display='block';
    divobj.innerHTML = " $"+subtot2;
  
 return subtot2;
}

function pdsc(){
	var pd=0;
	var days = 0;
	days=document.getElementById("chargesdays").value;	
	pd = days * 9.95;
	document.getElementById('pdch').value=pd.toFixed(2);
	var divobj = document.getElementById('pdc');
    divobj.style.display='block';
    divobj.innerHTML = " $"+pd.toFixed(2);

   
	return pd;
}


function taxes(){
	console.log("EN LOG");
	var tax=0;
	tax = (subtotal2() + subtotal1()) * 0.09;
	document.getElementById('taxesh').value=tax.toFixed(2);
	console.log("TAXES: "+tax);
	
	var divobj = document.getElementById('taxesd');
    divobj.style.display='block';
    divobj.innerHTML = " $"+tax.toFixed(2);


    totalreal(tax);

	return tax;

}



function totalreal(tx){
	var totalfinal=0;
	

	totalfinal=(subtotal1()+subtotal2()+pdsc()+tx)*1;
	/*var divobj = document.getElementById('totalf');
    divobj.style.display='block';
    divobj.innerHTML = " $"+totalfinal;
   
	*/
	//totalfinal=totalfinal.toFixed(2);
	totalfinal=totalfinal.toFixed(2);
	document.getElementById('totalf').value=totalfinal;

	var divobj = document.getElementById('totalff');
    divobj.style.display='block';
    divobj.innerHTML = " $"+totalfinal;
	return totalfinal;

}

function amountDue(){
	var deposit  =0;
	var payment  =0;
	var total=0;
	var resultado=0;
	deposit=document.getElementById('deposit').value;
	payment=document.getElementById('payment').value;
	total=document.getElementById('totalf').value;
	resultado=total-deposit-payment;
	resultado=resultado.toFixed(2);
	document.getElementById('amountdue').value = resultado;

	var divobj = document.getElementById('amountduediv');
    divobj.style.display='block';
    divobj.innerHTML = " $"+resultado;
}
