<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/colorpicker.css" />
<link rel="stylesheet" href="css/datepicker.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link rel="stylesheet" href="css/bootstrap-wysihtml5.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">QUICK AUTO RENTALS</a></h1>
</div>
<!--close-Header-part--> 





<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-list"></i>Forms</a>
  <ul>
    <li class="submenu"> <a href="#"><i class="icon icon-info-sign"></i> <span>Rental</span> </a>
      <ul>
        <li><a href="error403.html">Add New</a></li>
        <li><a href="error404.html">History</a></li>
      </ul>
    </li>

  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">NEW DOCUMENT</a> </div>
    <h1>QUICK AUTO RENTALS</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>NEW REPORT</h5>
          </div>
          <div class="widget-content nopadding">
            <form id="form-wizard" class="form-horizontal" action="../controller/controllerCustomer.php" method="post">
              <div id="form-wizard-1" class="step">
              <h5> CUSTOMER INFORMATION </h5>
                <div class="control-group">
                  <label class="control-label">Renter's Name</label>
                  <div class="controls">
                    <input type="text" required="true" name="rentersName" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">DOB</label>
                  <div class="controls">
                    <input id="text" type="text" required="true" name="bod" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Address</label>
                  <div class="controls">
                    <input id="text" type="text" required="true" name="address" />
                  </div>
                </div>
                <div class="control-group">
                  <label for="normal" class="control-label">Phone</label>
                  <div class="controls">
                    <input type="text" name="phone" id="mask-phone" required class=" mask text">
                    <span class="help-block blue">(999) 999-9999</span> </div>
                </div>
                <div class="control-group">
                  <label class="control-label">City</label>
                  <div class="controls">
                    <input type="text" required="true" name="city" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">State</label>
                  <div class="controls">
                    <input type="text" required="true" name="state" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Zip Code</label>
                  <div class="controls">
                    <input type="number" required name="zipcode" id="zipcode" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Driver's Licence #</label>
                  <div class="controls">
                    <input type="text" required="true" name="driverlicence" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">DL State</label>
                  <div class="controls">
                    <input type="text" required="true" name="dlstate" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Expiration Date</label>
                  <div class="controls">
                    <div  data-date="12-02-2012" class="input-append date datepicker">
                      <input type="text" name="expirationDl" required="true"  data-date-format="mm-dd-yyyy" class="span11" >
                      <span class="add-on"><i class="icon-th"></i></span> </div>
                 </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Insurrance Company</label>
                  <div class="controls">
                    <input type="text" required="true" name="insurrancecompany" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Policy #</label>
                  <div class="controls">
                    <input type="text" required="true" name="policy" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Additional Driver's Name</label>
                  <div class="controls">
                    <input type="text"  name="additionalName" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Additional Driver's License #</label>
                  <div class="controls">
                    <input type="text"  name="additionallicense" />
                  </div>
                </div>
              </div>
              <div id="form-wizard-2" class="step">
              <h5> RENTAL VEHICLE </h5>
              <div class="control-group">
                  <label class="control-label">Out</label>
                  <div class="controls">
                    <div  data-date="5-28-2017" class="input-append date datepicker">
                      <input type="text" name="rentersOut" required="true"  data-date-format="mm-dd-yyyy" class="span11" >
                      <span class="add-on"><i class="icon-th"></i></span> </div>
                 </div>
              </div>
              <div class="control-group">
                  <label class="control-label">IN</label>
                  <div class="controls">
                    <div  data-date="5-28-2017" class="input-append date datepicker">
                      <input type="text" name="rentersIn" required="true"  data-date-format="mm-dd-yyyy" class="span11" >
                      <span class="add-on"><i class="icon-th"></i></span> </div>
                 </div>
              </div>


                <div class="control-group">
                  <label class="control-label">Vehicle Class</label>
                  <div class="controls">
                    <input  type="text" required name="vehicleclass" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">License #</label>
                  <div class="controls">
                    <input  type="text" required name="vechiclelicense" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Year</label>
                  <div class="controls">
                    <input type="number" min = "2000" required name="vehicleyear"  />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Make </label>
                  <div class="controls">
                    <input  type="text" required name="vechiclemake" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Model </label>
                  <div class="controls">
                    <input  type="text" required name="vechiclemodel" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Mileage Out</label>
                  <div class="controls">
                    <input type="number"  required name="vehiclemileageout"  />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Mileage In</label>
                  <div class="controls">
                    <input type="number"  required name="vehiclemileagein"  />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Fuel Out</label>
                  <div class="controls">
                    <label>
                      <input type="radio" value="Empty" name="fuelout" />
                      Empty</label>
                    <label>
                      <input type="radio" value="1/4" name="fuelout" />
                      1/4</label>
                    <label>
                      <input type="radio" value="2/4" name="fuelout" />
                      2/4</label>
                     <label>
                      <input type="radio" value="3/4" name="fuelout" />
                      3/4</label>
                     <label>
                      <input type="radio" value="Full" name="fuelout" />
                      Full</label>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Fuel In</label>
                  <div class="controls">
                    <label>
                      <input type="radio" value="Empty" name="fuelin" />
                      Empty</label>
                    <label>
                      <input type="radio" value="1/4"  name="fuelin" />
                      1/4</label>
                    <label>
                      <input type="radio" value="2/4" name="fuelin" />
                      2/4</label>
                     <label>
                      <input type="radio" value="3/4" name="fuelin" />
                      3/4</label>
                     <label>
                      <input type="radio" value="Full" name="fuelin" />
                      Full</label>
                  </div>
                </div>


              </div>

              <div id="form-wizard-3" class="step">
              <h5>NOTES</h5>
                <div class="control-group">
                  <label class="control-label">Renter's Original Vehicle</label>
                  <div class="controls">
                    <input type="text" name="notesoriginalvehicle" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">DOL</label>
                  <div class="controls">
                    <input type="text" name="notesdol" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Notes</label>
                  <div class="controls">
                    <input type="text" name="noesnotes" />
                  </div>
                </div>
              </div>
            <div id="form-wizard-4" class="step">
              <h5>CHARGES</h5>
                <div class="control-group">
                  <label class="control-label">DAYS</label>
                  <div class="controls">
                    <input type="number" step="1" max="30" onChange ="pdsc()" value="0" id="chargesdays" name="chargesdays" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">DAILY RATE</label>
                  <div class="controls">
                    <input type="number" step="0.1" onChange="subtotal1(); taxes();" value="0" id="chargesdaylyrate" name="chargesdaylyrate" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">WEEKLY RATE</label>
                  <div class="controls">
                    <input type="number" value="0" step="0.1" onChange="subtotal1(); taxes();" id="chargesweeklyrate" name="chargesweeklyrate" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">EXCESS MILES</label>
                  <div class="controls">
                    <input type="number" value="0" step="1" onChange="subtotal1(); taxes();" id="chargesexcessmiles" name="chargesexcessmiles" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">RATE($35 Mile)</label>
                  <div class="controls">
                    <input type="number" value="35" step="0.1" onChange="subtotal1(); taxes();" id="chargesexcessrate" name="chargesexcessrate" />
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">SUB TOTAL: </label>
                  <div class="controls">
                    <div id="subtotal1"></div>
                  </div>
                </div>


                <div class="control-group">
                  <label class="control-label">REPARIS</label>
                  <div class="controls">
                    <input type="number" value="0" onChange="subtotal2(); taxes(); " step="0.1" id="chargesrepair" name="chargesrepair" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">FUEL/SERVICE</label>
                  <div class="controls">
                    <input type="number" value="0" onChange="subtotal2(); taxes();" step="0.1" id="chargesservice" name="chargesservice" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">CLEANING</label>
                  <div class="controls">
                    <input type="number" value="0" onChange="subtotal2(); taxes();" step="0.1" id="chargescleaning" name="chargescleaning" />
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">SUB TOTAL: </label>
                  <div class="controls">
                   <div id="subtotal2"></div>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">TAX(9.00%) </label>
                  <div class="controls">
                   <input type="hidden"  disabled id="taxesh" name="taxesh" />
                    <div id="taxesd"></div>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">PDC($9.95/DAY) </label>
                  <div class="controls">
                   <input type="hidden" step="0.01"  disabled id="pdch" name="pdc" />
                    <div id="pdc"></div>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">TOTAL CHARGES </label>
                  <div class="controls">
                  <div id="totalff"></div>
                      <input type="hidden" step="0.01"  disabled id="totalf" name="totalf" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">DEPOSITS </label>
                  <div class="controls">
                    <input type="number" value="0" step="0.01" id="deposit" onChange="amountDue();" name="deposit" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">PAYMENT </label>
                  <div class="controls">
                    <input type="number" value="0" step="0.01" id="payment" onChange="amountDue();" name="payment" />
                  </div>
                </div>              
                <div class="control-group">
                  <label class="control-label">AMOUNT DUE </label>
                  <div class="controls">
                  <div id="amountduediv"></div>
                    <input type="hidden" value="0" step="0.01" disabled id="amountdue" name="amountdue" />
                  </div>
                </div>  
              </div>


              <div class="form-actions">
                <input id="back" class="btn btn-primary" type="reset" value="Back" />
                <input id="next" class="btn btn-primary" type="submit" value="Next" />
                <div id="status"></div>
              </div>
              <div id="submitted"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2017 </a> </div>
</div>
<!--end-Footer-part-->

<!--end-Footer-part--> 
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/bootstrap-colorpicker.js"></script> 
<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/jquery.toggle.buttons.js"></script> 
<script src="js/masked.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.wizard.js"></script>
<script src="js/jquery.wizard.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/matrix.form_common.js"></script>  
<script src="js/calculos.js"></script>  

<script src="js/jquery.validate.js"></script> 






<script src="js/wysihtml5-0.3.0.js"></script> 
</body>
</html>
