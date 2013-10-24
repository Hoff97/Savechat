<?php
	$connect = mysql_connect('localhost', 'root', 'Jan2008');
	mysql_select_db("savechat", $connect);
	
	$date = (new DateTime())->sub(new DateInterval('P1D'));
	$date = $date->format('YmdHis');
	$sql = "DELETE FROM `messages` WHERE `date` < ".$date;
	mysql_query($sql,$connect);

	if($_POST["type"]=="input")
	{
		$sql = "INSERT INTO messages (`content` ,`date`) VALUES ('" . $_POST["content"] . "',CURRENT_TIMESTAMP)";
		mysql_query($sql,$connect);
	}
	else if($_POST["type"]=="output")
	{
		$query = "SELECT * FROM messages";
		$result = mysql_query($query,$connect);
		
		$a = 0;
		while($row = mysql_fetch_array($result))
		{
			if($a>0)
			{
				echo "||||NEXT||||";
			}
			echo $row["content"];
			$a++;
		}
	}
?>