<?php
	#echo "Done\nDone1\nDone2\nDone22\nDone21\nName1\nName2\n"; die;
	$q=$_GET['q'];
	$my_data=mysql_real_escape_string($q);
	$mysqli=mysqli_connect('localhost','root','','library_2') or die("Database Error");
	$sql="SELECT DISTINCT LanguageName FROM tbl_languages WHERE LanguageName LIKE '%$my_data%' ORDER BY LanguageName ASC";
	$result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
	
	if($result)
	{
		while($row=mysqli_fetch_array($result,MYSQL_ASSOC))
		{
			echo $row['LanguageName']."\n";
		}
	}
?>