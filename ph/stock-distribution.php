<?php
	session_start();
	
	require_once "../lib/db_function.php";
	//var_dump($_GET);
	
	?>
	<style>
		.list{
			width:100%;
		}
		.list tr:hover{
			background-color:#ddd;
			
		}
	</style>
	<?php
	if(@$_GET['filter'] && trim($_GET['keyword'])){
		$diagnostic = formatResultSet($rslt=returnResultSet($sql="SELECT md_name.* FROM md_name WHERE md_name.MedecineName LIKE('%".PDB($_GET['keyword'],true,$con)."%') && CategoryCode != '' ORDER BY MedecineName ASC",$con),$multirows=true,$con);
		//echo $sql;
		if($diagnostic){
			echo "<table class=list>";
			for($i=0; $i<count($diagnostic); $i++){
				$stock = formatResultSet($rslt=returnResultSet($sql="SELECT md_stock.* FROM md_stock WHERE md_stock.MedicineNameID ='".PDB($diagnostic[$i]['MedecineNameID'],true,$con)."' ORDER BY Quantity ASC",$con),$multirows=false,$con);
				$ommit = false;
				$display = ommitStringPart($str=$diagnostic[$i]['MedecineName'],$char_to_display=30,$ommit);
				echo "<tr onclick='$(\".medicine_field\").html(\"{$diagnostic[$i]['MedecineName']}\");$(\"#medicine\").val(\"{$diagnostic[$i]['MedecineNameID']}\");' style='cursor:pointer;' ".($ommit?"title='{$diagnostic[$i]['MedecineName']}'":"").">
				<td>".($i+1)."</td>
				<td>".$display."</td><td>{$stock['Quantity']}</td>
				<td>Ajust</td>
				</tr>";
			}
			echo "</table>";
		} else{
			echo "<span class=error-text >No Medicine in the Stock</span>";
		}
		return;
	}
	//select all active diagnostic now
	$diagnostic = formatResultSet($rslt=returnResultSet($sql="SELECT md_name.*, md_stock.Quantity as StockQuantity, md_stock.MedicineNameID, md_stock.MedicineStockID, md_stock_records.*, sy_users.Name FROM md_name, md_stock, md_stock_records, sy_users WHERE md_stock.MedicineNameID = md_name.MedecineNameID && md_stock_records.MedicineStockID = md_stock.MedicineStockID && md_stock_records.Operation='DISTRIBUTION' && md_stock_records.UserID = sy_users.UserID ".(@$_GET['start_date']?"&& md_stock_records.Date >= ".mktime(0,0,0,explode("-",$_GET['start_date'])[1],explode("-",$_GET['start_date'])[2],explode("-",$_GET['start_date'])[0]):"")." ".(@$_GET['end_date']?"&& md_stock_records.Date <= ".mktime(23,59,59,explode("-",$_GET['end_date'])[1],explode("-",$_GET['end_date'])[2],explode("-",$_GET['end_date'])[0]):"")." ORDER BY md_stock_records.Date ASC",$con),$multirows=true,$con);
	if($diagnostic){
		echo "<table class=list>
		<tr><th>#</th><th>Medicine</th><th>Stock</th><th>Qty</th><th>Time</th><th>User</th></tr>";
		for($i=0; $i<count($diagnostic); $i++){
			$ommit = false;
			$display = ommitStringPart($str=$diagnostic[$i]['MedecineName'],$char_to_display=30,$ommit);
			echo "<tr onclick='$(\".medicine_field\").html(\"{$diagnostic[$i]['MedecineName']}\");$(\"#medicine\").val(\"{$diagnostic[$i]['MedecineNameID']}\");' style='cursor:pointer;' ".($ommit?"title='{$diagnostic[$i]['MedecineName']}'":"").">
				<td>".($i+1)."</td>
				<td>".$display."</td>
				<td align=right>{$diagnostic[$i]['StockLevel']}</td>
				<td align=right>{$diagnostic[$i]['Quantity']}</td>
				<td>".(date("Y-m-d H:i:s",$diagnostic[$i]['Date']))."</td>
				<td>{$diagnostic[$i]['Name']}</td>
				</tr>";
			//echo "<div style='cursor:pointer;' ".($ommit?"title='{$diagnostic[$i]['MedecineName']}'":"").">".$display." {$diagnostic[$i]['Quantity']}</div>";
		}
		echo "</table>";
	} else{
		echo "<span class=error-text >No Medicine in the Adjust Report</span>";
	}
?>