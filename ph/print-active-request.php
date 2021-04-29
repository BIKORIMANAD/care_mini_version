<?php
	session_start();
	
	require_once "../lib/db_function.php";
	//now select all non-approved request with the current operation code
	$request_data = formatResultSet($rslt=returnResultSet($sql="SELECT md_stock_records.*, md_name.MedecineName, md_stock.Quantity as Stock FROM md_name, md_stock, md_stock_records WHERE md_stock.MedicineStockID = md_stock_records.MedicineStockID && md_stock.MedicineNameID = md_name.MedecineNameID && md_stock_records.Status=0 && md_stock_records.Operation='REQUEST' ORDER BY md_stock.Quantity ASC;",$con),$multirows=true,$con);
	//var_dump($request_data);
$data = <<<DATA
		<style>
			#n0{
				background-color:#efefef;
			}
		</style>
		{$organisation}<br />
		Medicine Request<br />
		<table class=list style='width:400px; border-collapse:collapse;' border=1>
			<tr><th>#</th><th>Medicine</th><th>Current Stock</th><th>Quantity</th></tr>
DATA;
			$i = 1;
			if($request_data){
				foreach($request_data as $rqst){
					$data .= "<tr id='n".($i%2)."'>
					<td>".($i++)."</td>
					<td>{$rqst['MedecineName']}</td>
					<td style='text-align:right; padding:2px;'>{$rqst['Stock']}</td>
					<td style='text-align:right; padding:2px;'>{$rqst['Quantity']}</td>
					</tr>";
				}
			} else{
				$data .= "<tr><td colspan=4 align=center ><span style='color:red;'>No Request is Active</span></td></tr>";
			}
	$data .= "
		</table><br />&nbsp;<br />
		Done At {$organisation_address} &nbsp; On: ".date("Y-m-d",time())."<br />&nbsp;<br />
		Prepared By<br />{$_SESSION['user']['Name']}
		";
//echo $data;
	//require the MPDF Library
require_once "../lib/mpdf57/mpdf.php";

$pdf = new MPDF();

$pdf->Open();

$pdf->AddPage("L");

$pdf->SetFont("Arial","N",10);

$pdf->WriteHTML($data);
//echo $filename;
$pdf->Output(); 
die;

	?>