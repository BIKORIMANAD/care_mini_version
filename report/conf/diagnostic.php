<?php
session_start();
require_once "../../lib/db_function.php";
if("rcp" !== returnSingleField($sql="SELECT PostCode from sy_post WHERE PostID='{$_SESSION['user']['PostID']}'",$field="PostCode",$data=true, $con)){
	echo "<script>window.location='../logout.php';</script>";
	return;
}
//var_dump($_GET);
if(@$_GET['activate']){
	saveData($sql = "INSERT INTO co_special_data SET SpecialID='{$_GET['sp_acc']}', DiagnosticID='{$_GET['activate']}'", $con);
	//echo $sql;
}
//var_dump($_GET);
if(@$_GET['deactivate']){
	saveData("DELETE FROM co_special_data WHERE SpecialID='{$_GET['sp_acc']}' && DiagnosticID='{$_GET['deactivate']}'", $con);
}
$acc = array();
$acc_str = "";
if(@$_GET['sp_acc']){
	//var_dump($_GET);
	$accomp = returnAllData("SELECT co_special_data.* , co_diagnostic.* FROM co_special_data, co_diagnostic WHERE co_special_data.DiagnosticID = co_diagnostic.DiagnosticID && co_special_data.SpecialID='{$_GET['sp_acc']}'",$con);
	//var_dump($accomp);
	if($accomp){
		$i = 1;
		foreach($accomp as $acc_){
			if(!in_array($acc_['DiagnosticID'],$acc)){
				$acc[] = $acc_['DiagnosticID'];
				$acc_str .= "<div style='overflow:hidden; width:280px; height:17px;'><label style='cursor:pointer;' title='{$acc_['DiagnosticName']}'>".($i++) . ". ". $acc_['DiagnosticName']."</label></div>";
			}
		}
	}
}

//var_dump($acc);
//select all diagnostic in the system 
$diagnostic = returnAllDataInTable($table = "co_diagnostic",$con, " ORDER BY DiagnosticName ASC");
#var_dump($diagnostic);
echo <<<DONE
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
#new_ td{
	border:1px solid grey; 
	font-size:10px;
}
#tr:hover{
	background-color:#eee;
	cursor:pointer;
}
</style>
</heade>
<body>
DONE;
if($diagnostic){
	echo $acc_str."</div>";
	if(!@$_GET['sp_acc'])
		echo "<a href='#' onclick='$(\"._all\").prop(\"checked\",\":true\"); return false;' title='Click to check all' style='color:blue; text-decoration:none;'>check all</a> | <a href='#' onclick='$(\"._all\").removeProp(\"checked\"); return false;' title='Click to uncheck all' style='color:blue; text-decoration:none;'>uncheck all</a>";
	echo "<table id='new_' >";
	for($i=0;$i<count($diagnostic);$i++){
		if(@$_GET['sp_acc']){
			echo <<<DATA
			<script>
				$("#nd{$i}").change(function(e){
					if($("#nd{$i}").prop("checked")){
						//load the one the activate the data
						$(".update_special").load("./conf/diagnostic.php?sp_acc={$_GET['sp_acc']}&activate=" + $("#nd{$i}").val());
					} else{
						//load the one to deactivate
						$(".update_special").load("./conf/diagnostic.php?sp_acc={$_GET['sp_acc']}&deactivate=" + $("#nd{$i}").val());
					}
				});
			</script>	
DATA;
		}
		echo "<tr style='' id='tr'><td><input class='".(!@$_GET['sp_acc']?"_all":"")."' id='".(@$_GET['sp_acc']?"nd{$i}":"")."' ".(!@$_GET['sp_acc']?"name='diag{$i}'":"")." value='{$diagnostic[$i]['DiagnosticID']}' type=checkbox ".(in_array($diagnostic[$i]['DiagnosticID'],$acc)?"checked":"")." /></td><td>".($i+1)."</td><td>{$diagnostic[$i]['DiagnosticName']}</td></tr>";
	}
	echo "</table>";
}
?>
</body>
</html>