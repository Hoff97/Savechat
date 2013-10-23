<?php
	if($_POST["type"]=="input")
	{
		$connect = mysql_connect('localhost', 'root', 'Jan2008');
		mysql_select_db("savechat", $connect);
		echo $_POST["content"];
		$sql = "INSERT INTO messages VALUES ('" . $_POST["content"] . "')";
		mysql_query($sql,$connect);
	}
	else if($_POST["type"]=="output")
	{
		$connect = mysql_connect('localhost', 'root', 'Jan2008');
		mysql_select_db("savechat", $connect);
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