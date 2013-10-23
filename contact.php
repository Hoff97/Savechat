<?php
	if($_POST["type"]=="input")
	{
		$content = file_get_contents("data.txt");
		if($content!="")
		{
			file_put_contents("data.txt", $content."||||NEXT||||".$_POST["content"]);
		}
		else
		{
			file_put_contents("data.txt", $_POST["content"]);
		}
	}
	else if($_POST["type"]=="output")
	{
		/*$connect = mysql_connect('localhost', 'root', 'Jan2008');
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
		}*/
		echo file_get_contents("data.txt");
	}
?>