<?php
require '../core/init.php';
$general->logged_out_protect();

$designer_id  = htmlentities($user['id']);
$site_id = $_GET['id'];

if (isset($_POST['submit'])) {
 $status = "send";
 $quote_accepted   ="No";

$quote_price                = htmlentities($_POST['quote_price']);
$finish_date                = htmlentities($_POST['finish_date']);
//$quote_num                  = htmlentities($_POST['quote_num']);
$own_maintenance            = htmlentities($_POST['own_maintenance']);
$basic_m_amt                = htmlentities($_POST['basic_m_amt']);
$advanced_m_amt                = htmlentities($_POST['advanced_m_amt']);
$basic_m_period                = htmlentities($_POST['basic_m_period']);
$advanced_m_period          = htmlentities($_POST['advanced_m_period']);


$createquote = $quotation->create_quote($designer_id, $site_id, $quote_price, $finish_date, $own_maintenance, $basic_m_amt,$advanced_m_amt, $basic_m_period,$advanced_m_period, $status, $quote_accepted);

header("location:send_code_reports.php");
}

elseif(isset($_POST['save'])) 
  {

    $status = "draft";
 $quote_accepted   ="No";

$quote_price                = htmlentities($_POST['quote_price']);
$finish_date                = htmlentities($_POST['finish_date']);
//$quote_num                  = htmlentities($_POST['quote_num']);
$own_maintenance            = htmlentities($_POST['own_maintenance']);
$basic_m_amt                = htmlentities($_POST['basic_m_amt']);
$advanced_m_amt                = htmlentities($_POST['advanced_m_amt']);
$basic_m_period                = htmlentities($_POST['basic_m_period']);
$advanced_m_period          = htmlentities($_POST['advanced_m_period']);


$createquote = $quotation->create_quote($designer_id, $site_id, $quote_price, $finish_date, $own_maintenance, $basic_m_amt,$advanced_m_amt, $basic_m_period,$advanced_m_period, $status, $quote_accepted);
header("location:preview_quote.php");
  }



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>Create a quotation for a client!!!!</h3>
<hr>
<br>
<form method="post" action="">
	
 
     <label for="title">Quote Price :</label>
     <input type="text" id="quote_price" class="form-control" maxlength="17" value="<?php if(isset($_POST['quote_price'])) echo htmlentities($_POST['quote_price']); ?>" name="quote_price" ><br><br>
       
      <label for="title">Finish Date :</label>
     <input type="date" id="finish_date" class="form-control" maxlength="17" value="<?php if(isset($_POST['finish_date'])) echo htmlentities($_POST['finish_date']); ?>" name="finish_date" ><br><br>
      
      <label for="title">Own Maintenance :</label>
     <input type="text" id="own_maintenance" class="form-control" maxlength="17" value="<?php if(isset($_POST['own_maintenance'])) echo htmlentities($_POST['own_maintenance']); ?>" name="own_maintenance" ><br><br>
    
      <label for="title">Basic Maintenance Amt :</label>
     <input type="text" id="basic_m_amt" class="form-control" maxlength="17" value="<?php if(isset($_POST['basic_m_amt'])) echo htmlentities($_POST['basic_m_amt']); ?>" name="basic_m_amt" ><br><br>
     
      <label for="title">advanced_M_Amt :</label>
     <input type="text" id="advanced_m_amt" class="form-control" maxlength="17" value="<?php if(isset($_POST['advanced_m_amt'])) echo htmlentities($_POST['advanced_m_amt']); ?>" name="advanced_m_amt" ><br><br>

    <label for="title">Basic_M_Period :</label>
     <input type="text" id="basic_m_period" class="form-control" maxlength="17" value="<?php if(isset($_POST['basic_m_period'])) echo htmlentities($_POST['basic_m_period']); ?>" name="basic_m_period" ><br><br>

     <label for="title">Advanced_M_Period :</label>
     <input type="text" id="advanced_m_period" class="form-control" maxlength="17" value="<?php if(isset($_POST['advanced_m_period'])) echo htmlentities($_POST['advanced_m_period']); ?>" name="advanced_m_period" ><br><br>

     
     <input type="submit" name="save" value="Save" />            
  <input type="submit" name="submit" value="Submit" />

 
 
</form>
</body>
</html>