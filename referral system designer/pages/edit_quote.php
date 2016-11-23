<?php
require '../designers/init.php';
$general->logged_out_protect();

$designer_id  = htmlentities($user['id']);

$id = $_GET['id'];
$view_quote_details = $quotation->view_quote_details($id);

if (isset($_POST['submit'])) {
 $status = "send";
 $quote_accepted   ="No";

$quote_price                = htmlentities($_POST['quote_price']);
$finish_date                = htmlentities($_POST['finish_date']);
$own_maintenance            = htmlentities($_POST['own_maintenance']);
$basic_m_amt                = htmlentities($_POST['basic_m_amt']);
$advanced_m_amt             = htmlentities($_POST['advanced_m_amt']);
$basic_m_period             = htmlentities($_POST['basic_m_period']);
$advanced_m_period          = htmlentities($_POST['advanced_m_period']);


$update = $quotation-> update_send_quote($designer_id,  $quote_price, $finish_date, $own_maintenance, $basic_m_amt,$advanced_m_amt, $basic_m_period,$advanced_m_period, $status, $quote_accepted);


header("location:send_code_reports.php");
  }

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>Updating a quotation for a client!!!!</h3>
<hr>
<br>
<form action="" method="POST">
<?php foreach ($view_quote_details as $key) {?>

 
     <label for="title">Quote Price :</label>
     <input type="text" name ="quote_price" value="<?php echo $key['quote_price'];?>"><br><br>
       
      <label for="title">Finish Date :</label>
     <input type="date" name ="finish_date" value="<?php echo $key['finish_date'];?>"><br><br>
      
      <label for="title">Own Maintenance :</label>
     <input type="taxt" name ="own_maintenance" value="<?php echo $key['own_maintenance'];?>"><br><br>
    
      <label for="title">Basic Maintenance Amt :</label>
     <input type="taxt" name ="basic_m_amt" value="<?php echo $key['basic_m_amt'];?>"><br><br>
     
      <label for="title">advanced_M_Amt :</label>
     <input type="taxt" name ="advanced_m_amt" value="<?php echo $key['advanced_m_amt'];?>"><br><br>

    <label for="title">Basic_M_Period :</label>
     <input type="taxt" name ="basic_m_period" value="<?php echo $key['basic_m_period'];?>"><br><br>

     <label for="title">Advanced_M_Period :</label>
     <input type="taxt" name ="advanced_m_period" value="<?php echo $key['advanced_m_period'];?>"><br><br>

     
          
  <input type="submit" name="submit" value="Submit" />

 
 <?php }?>
</form>
</body>
</html>