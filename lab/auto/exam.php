<?php
	//echo "Done\nDone1\nDone2\nDone22\nDone21\nName1\nName2\n"; die;
	$q=$_GET['q'];
	$mysqli=mysql_connect('localhost','root','') or die("Database Error");
	//echo $database_name;
	require_once "../../lib/main_file.php";
	mysql_select_db($database_name)or die(mysql_error());
	$my_data=mysql_real_escape_string($q);
	$sql="SELECT ExamName FROM la_exam WHERE ExamName LIKE '%$my_data%' ORDER BY ExamName";
	$result = mysql_query($sql);
	//echo $sql;
	if($result)
	{
		while($row=mysql_fetch_array($result))
		{
			echo $row['ExamName']."\n";
		}
	}
?>