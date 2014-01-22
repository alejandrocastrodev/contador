<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml2/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"></html>

<LINK rel="stylesheet" href="style.css" type="text/css" media="all">

<head>
<title>Display</title>
</head>
<?php 
if(isset($_POST["box_number"]))
   {
   include "function.php";
   
   $conect_sql = mysql_connect("localhost","root","planvidacs"); 
   mysql_select_db("contador",$conect_sql);

   $control_q = "SELECT * FROM  `control` WHERE `control_id` = '".$idOfType[$_POST["box_type"]]."' ";
   $control_result  = mysql_query($control_q);
   $control_fech = mysql_fetch_array($control_result);
   $last_number = $control_fech['current_global'] + 1;
   
   if($last_number == 1000){
   $last_number = '00';
   }
   
   $update_control_q = "UPDATE  `control` SET  `current_global` =  ".$last_number." WHERE `control_id` =  '".$idOfType[$_POST["box_type"]]."' LIMIT 1 ;";
   mysql_query($update_control_q);
   
   $update_active_q = "UPDATE  `control` SET  `current_global` = '1' WHERE `control_id` =  '0' LIMIT 1 ;";
   mysql_query($update_active_q);
   
	date_default_timezone_set('America/Argentina/Buenos_Aires');	  
	$fechaHora = date("Y-m-d H:i:s");
   
   
   $update_box_q = "UPDATE  `box` SET  `box_current` =  ".$last_number.",`box_type` =  '".$idOfType[$_POST["box_type"]]."',`box_date` =  '".$fechaHora."' WHERE `box_id` =  ".$_POST["box_number"]." LIMIT 1 ;";
   mysql_query($update_box_q);
   
   $this_type = $_POST["box_type"];
   $this_box = $_POST["box_number"];
   }
else
  {
  $last_number = "--";
  $this_box = "1";
  $this_type = "Responsable";
  }
?>

<body>

<div id="main_frame">

<form action="box.php" method="post" style="color: white;">

    BOX <select name="box_number" id="box_number">
		<option selected><?php echo $this_box ?></option>
		<option>1</option>
		<option>2</option>
		<option>3</option>
		<option>4</option>
		<option>5</option>
		<option>6</option>
    </select>
	
    Tipo <select name="box_type" id="box_type">
		<option selected><?php echo $this_type ?></option>
		<option>Manzanera</option>
		<option>Responsable</option>
    </select>
	
	<input type="submit" value="incrementar">
</form>


<div id="show_current" style="background-color: #aaa; margin: 10px auto; width: 200px; height: 60px; padding: 15px;" >
<p>Ultimo numero: <span style="background-color: white; border: 1px solid black; padding: 5px;"><?php echo $last_number ?></span><p>
</div > <!-- cierra show_current -->

</br></br>
<input type="button" value="Volver al inicio" id="back" name="back" onclick="janascript:location.href='index.php'">
</div > <!-- cierra main_frame -->

</body>