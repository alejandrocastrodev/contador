<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml2/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"></html>

<LINK rel="stylesheet" href="style.css" type="text/css" media="all">

<head>
<title>Display</title>
</head>

<?php 
if(isset($_POST["index_number"]))
   {   
   
   include "function.php";
   
   $conect_sql = mysql_connect("localhost","root","planvidacs"); 
   mysql_select_db("contador",$conect_sql);   
   
   $update_box_q = "UPDATE  `box` SET  `box_current` =  '--', `box_type` =  '0', `box_date` = '0000-00-00 00:00:00'  WHERE `box_id` > 0 AND `box_id` < 7 AND `box_type` = '".$idOfType[$_POST["box_type"]]."';";
   mysql_query($update_box_q);
   
   $update_control_q = "UPDATE  `control` SET  `current_global` =  ".($_POST["index_number"]-1)." WHERE `control_id` =  '".$idOfType[$_POST["box_type"]]."' LIMIT 1 ;";
   mysql_query($update_control_q);   
   
   $update_active_q = "UPDATE  `control` SET  `current_global` =  '1' WHERE `control_id` =  0 LIMIT 1 ;";
   mysql_query($update_active_q);
   
   }
?>

<body>

<div id="main_frame">

<form action="reset.php" method="post" style="color: white; text-align: none;">
Tipo <select name="box_type" id="box_type">
		<option>Responsable</option>
		<option>Manzanera</option>
    </select>
	  </br></br>
    Iniciar en: <input type="text" value="" name="index_number" id="index_number">
	  </br></br>
	<input type="submit" value="Reiniciar">
</form>

</br></br>
<input type="button" value="Volver al inicio" id="back" name="back" onclick="janascript:location.href='index.php'">
</div > <!-- cierra main_frame -->

</body>