<?php
	$connect = mysql_connect('localhost', 'root', 'Jan2008');
	mysql_select_db("savechat", $connect);
	
	$date = new DateTime();
	$date = $date->sub(new DateInterval("PT30S"));
	$date = $date->format('YmdHis');
	$sql = "DELETE FROM `online` WHERE `date` < ".$date;
	mysql_query($sql,$connect);
	
	$query = "SELECT * FROM online";
	$result = mysql_query($query,$connect);
	$in = false;
	
	echo "[";
	$a = 0;
	while($row = mysql_fetch_array($result))
	{
		if($_POST["name"]==$row["name"])
		{
			$query = "UPDATE `online` SET `date` = CURRENT_TIMESTAMP WHERE `name` = '".$_POST["name"]."'";
			mysql_query($query,$connect);
			$in = true;
		}
		else
		{
			if($a>0)
			{
				echo ",";
			}
			echo "{\"name\":\"".$row["name"]."\"}";
			$a++;
		}
	}
	echo "]";
	
	if($in==false)
	{
		$query = "INSERT INTO `savechat`.`online` (`name`,`date`) VALUES ('".$_POST["name"]."', CURRENT_TIMESTAMP);";
		mysql_query($query,$connect);
	}
?>