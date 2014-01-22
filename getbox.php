<?php 

$result = "";

$conect_sql = mysql_connect("localhost","root","planvidacs"); 
mysql_select_db("contador",$conect_sql);

$control_q = "SELECT * FROM  `control` WHERE `control_id` = 0 ";
$control_result  = mysql_query($control_q);
$control_fech = mysql_fetch_array($control_result);
$result .= "[".$control_fech['current_global']."], ";

$update_active_q = "UPDATE  `control` SET  `current_global` = '0' WHERE `control_id` =  '0' LIMIT 1 ;";
mysql_query($update_active_q);

$get_box_q = "SELECT * FROM  `box` ORDER BY  `box_date` DESC ";
$get_box_result  = mysql_query($get_box_q);


if (mysql_num_rows($get_box_result) > 0)
    {
	while ($row = mysql_fetch_array($get_box_result))
		{
		$result.= "['BOX ".$row['box_id']."', '".$row['box_current']."', '".$row['box_type']."'], ";
		}
    }


if(strlen($result) > 2);
  {$result = substr($result, 0, -2 );}
	  
echo "[".$result."]";

?>