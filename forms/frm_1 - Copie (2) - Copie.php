<?php
session_start();
/* header("Content-Type: application/pdf"); */
//var_dump($_SESSION);
require_once "../lib/db_function.php";
header("Title=Private Form");
$record = formatResultSet($rslt=returnResultSet($sql="SELECT pa_records.* from pa_records WHERE PatientRecordID='{$_GET['records']}'",$con),$multirows=false,$con);
$count_consult = count($conslt = formatResultSet($rslt=returnResultSet($sql="SELECT co_category.* from co_category",$con),$multirows=true,$con));
$patient = formatResultSet($rslt=returnResultSet($sql="SELECT pa_info.* from pa_info WHERE PatientID='{$record['PatientID']}'",$con),$multirows=false,$con);
$family = formatResultSet($rslt=returnResultSet($sql="SELECT pa_info.* from pa_info WHERE N_ID='{$patient['FamilyCode']}'",$con),$multirows=false,$con);
//select three last records and display them
$records = formatResultSet($rslt=returnResultSet($sql="SELECT co_records.* from pa_records, co_records  WHERE pa_records.PatientRecordID = co_records.PatientRecordID && pa_records.PatientID='{$record['PatientID']}' ORDER BY co_records.Date DESC LIMIT 0, 3",$con),$multirows=true,$con);
$last = "";
if($records){
	foreach($records as $r){
		$last .= "<div>";
		$last .= "Date: {$last['Date']}<br />";
		$last .= "Deases: {$last['DeasesFound']}<br />";
		
		//select exams
		$exams = formatResultSet($rslt=returnResultSet($sql="SELECT la_records.*, la_exam.ExamCode from la_records, la_price, la_exam  WHERE la_records.ExamPriceID = la_price.ExamPriceID && la_price.ExamID = la_exam.ExamID && la_records.ConsultationRecordID='{$r['ConsultationRecordID']}'",$con),$multirows=true,$con);
		if($exams){
			$last .= "Exams<br />";
			$last .= "<table style='width:100%'>";
			foreach($exams as $ex){
				$last .= "<tr><td>Code:{$ex['ExamCode']}</td><td>Result: {$ex['Result']}</td><td>Date: {$ex['ResultDate']}</td></tr>";
			}
			$last .= "</table>";
		}
		//select medecines
		$exams = formatResultSet($rslt=returnResultSet($sql="SELECT md_records.*, la_exam.ExamCode from md_records, md_price, md_name, md_prescription  WHERE md_records.MedecinePriceID = md_price.MedecinePriceID && md_price.MedecineNameID = md_name.MedecineNameID && md_records.MedecineRecordID = md.prescription.MedecineRecordID && md_records.ConsultationRecordID='{$r['ConsultationRecordID']}'",$con),$multirows=true,$con);
		if($exams){
			$last .= "Medecines:<br />";
			$last .= "<table style='width:100%'>";
			foreach($exams as $ex){
				$last .= "<tr><td>:{$ex['MedecineName']}</td><td>{$ex['Result']}</td><table><tr><td>M</td><td>N</td><td>E</td><td>MD</td><td>Special</td></tr><tr><td>{$ex['Morning']}</td><td>{$ex['Noon']}</td><td>{$ex['Evening']}</td><td>{$ex['Midnight']}</td><td>{$ex['SpecialPrescription']}</td></tr></table></tr>";
			}
			$last .= "</table>";
		}
		$last .= "</div>";
	}
} else{
	$last = "No Previous Record!";
}
//var_dump($records);
//die;
$consult_str = "";
$empty_cells = "";
foreach($conslt as $c){
	$consult_str .= "<td>{$c['ConsultationCategoryName']}</td>";
	$empty_cells .= "<td style='height:20px'></td>";
}
$info = <<<INFO
<html><head><title>Private Patients</title></head><body>
<style>
	.withborders td{
		border:1px solid #000;
	}
</style>
<table width=100% border=0>
	<tr>
		<th align=left>
			Republique du Rwanda<br />
			MINISTERE DE LA SANTE <br />
			Health Center: {$institution_name}<br />
		</th>
	</tr>
	<tr>
		<th align=center>
			Prestation Document No: {$record['DocID']}
		</th>
	</tr>
	<tr>
		<td>
			<table width=100% style='width:100%'>
				<tr>
					<td colspan=3>Code: <b>{$patient['PatientID']}</b></td>
				</tr>
				<tr>
					<td style='width:370px'>Patient Name: <b>{$patient['Name']}</b></td>
					<td style='width:210px'>Birth Date: <b>{$patient['DateofBirth']}</b></td>
					<td>Sex: <b>Male</b></td>
				</tr>
				<tr>
					<td colspan=3>Family Chief Name: <b>{$family['Name']}</b></td>
					<!--<td>Birth Date: <b>{$patient['DateofBirth']}</b></td>
					<td>Sex: <b>Male</b></td>-->
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			{$last}
		</td>
	</tr>
	<tr>
		<td>
			Details on received acts
			<table width=100% border=0 class='withborders' style='border-collapse:collapse;'>
				<tr valign=top>
					<td rowspan=3>Date</td><td rowspan=3>Code</td><td colspan='{$count_consult}'>ITEM</td><td>Quantity</td><td>Unit Price</td><td>Total Price</td>
				</tr>
				<tr>
				{$consult_str}
					<td rowspan=2></td>
					<td rowspan=2></td>
					<td rowspan=2></td>
				</tr>
				<tr>
					{$empty_cells}
				</tr>
				<tr valign=top>
					<td style='height:80px'></td>
					<td></td>
					<td colspan='{$count_consult}'>Exam:<br /><br /><br />&nbsp;</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr valign=top>
					<td style='height:80px'></td>
					<td></td>
					<td colspan='{$count_consult}'>Medecines:<br /><br /><br /><br />&nbsp;</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr valign=top>
					<td style='height:80px'></td>
					<td></td>
					<td colspan='{$count_consult}'>Consummables:<br /><br /><br />&nbsp;</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr valign=top>
					<td style='height:50px'></td>
					<td></td>
					<td colspan='{$count_consult}'>Ambulance:<br /><br />&nbsp;</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr valign=top>
					<td style='height:30px'></td>
					<td></td>
					<td colspan='{$count_consult}'>Hospitalization:<br />Number of Days:<br /><br />&nbsp;</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr valign=top>
					<td style='height:30px'></td>
					<td></td>
					<td colspan='{$count_consult}'>Other:<br /><br />&nbsp;</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td colspan='2'></td>
					<td colspan='{$count_consult}'>Total</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style='height:50px;'>Date: {$record['DateIn']}</td>
	</tr>
	<tr>
		<td>
			<table width=100% border=0>
				<tr valign=top>
					<td style='height:70px; width:400px'>
						Nurse's Name & Signature
					</td>
					<td>
						Beneficiary Name & Signature<br />
						{$patient['Name']}
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
<script>
window.print();
</script>
</html>
INFO;

//echo $info;

//require the MPDF Library
require_once "../lib/mpdf57/mpdf.php";

$pdf = new MPDF();

$pdf->Open();

$pdf->AddPage();

$pdf->SetFont("Arial","N",10);

$pdf->WriteHTML($info);

$pdf->Output(); 
die;
?>