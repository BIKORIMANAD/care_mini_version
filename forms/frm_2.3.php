<?php
session_start();
/* header("Content-Type: application/pdf"); */
//var_dump($_SESSION);
require_once "../lib/db_function.php";
header("Title='CBHI FORM'");
$record = formatResultSet($rslt=returnResultSet($sql="SELECT pa_records.* from pa_records WHERE PatientRecordID='{$_GET['records']}'",$con),$multirows=false,$con);
$tm_paid = formatResultSet($rslt=returnResultSet($sql="SELECT mu_tm.* from mu_tm WHERE PatientRecordID='{$_GET['records']}'",$con),$multirows=false,$con);
// var_dump($record); die;

$transfer_str = "";
if($record['Status'] > 1){
	$transfer_str = "
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					Transfer <img src='../images/box-checked.png' />";
}

$outpatient_str = "<img src='../images/box.png' />";
$inpatient_str = "<img src='../images/box.png' />";

$newcase_str = "<img src='../images/box.png' />";
$oldcase_str = "<img src='../images/box.png' />";
$nd_str = "<img src='../images/box.png' />";
$od_str = "<img src='../images/box.png' />";
$other_str = "<img src='../images/box.png' />";
$rta_str = "<img src='../images/box.png' />";
$wa_str = "<img src='../images/box.png' />";

$tm = "";
if($tm_paid['TicketPaid'] == 0){
	$tm = "<th style='font-size:18px; border:1px solid #000;'>TM Not Paid!</th>";
} else{
	$tm = "<th style='font-size:18px; border:0px solid #000;'>&nbsp;</th>";

}


$service = formatResultSet($rslt=returnResultSet($sql="SELECT se_records.*, se_name.ServiceCode from se_records, se_name WHERE se_name.ServiceNameID = se_records.ServiceNameID && se_records.PatientRecordID='{$record['PatientRecordID']}'",$con),$multirows=false,$con);
$date_ = $record['DateIn']; // date("Y-m-d",time());
//var_dump($service); die;
$count_consult = 3; count($conslt = formatResultSet($rslt=returnResultSet($sql="SELECT co_category.* from co_category, se_consultation WHERE se_consultation.ServiceID = '{$service['ServiceNameID']}' && se_consultation.ConsulationID = co_category.ConsultationCategoryID ORDER BY ConsultationCategoryName ASC",$con),$multirows=true,$con));
$patient = formatResultSet($rslt=returnResultSet($sql="SELECT pa_info.* from pa_info WHERE PatientID='{$record['PatientID']}'",$con),$multirows=false,$con);
$patient_address = formatResultSet($rslt=returnResultSet($sql="SELECT ad_village.VillageName, ad_cell.CellID, ad_cell.CellName, ad_sector.SectorID, ad_sector.SectorName, ad_district.DistrictID, ad_district.DistrictName from ad_village, ad_cell, ad_sector, ad_district WHERE ad_village.ViillageID='{$patient['VillageID']}' && ad_village.CellID = ad_cell.CellID && ad_cell.SectorID = ad_sector.SectorID && ad_sector.DistrictID = ad_district.DistrictID",$con),$multirows=false,$con);
//$family = !$patient['FamilyCode']?null:formatResultSet($rslt=returnResultSet($sql="SELECT pa_info.* from pa_info WHERE N_ID='{$patient['FamilyCode']}'",$con),$multirows=false,$con);
$existing_cons = returnAllData("SELECT * FROM co_records WHERE PatientRecordID='{$record['PatientRecordID']}'",$con);
//$records = null;
if($existing_cons)
	$date_ = $existing_cons[0]['Date'];
//select three last records and display them
$records = formatResultSet($rslt=returnResultSet($sql="SELECT co_records.*, pa_records.DocID, pa_records.PatientRecordID from pa_records, co_records  WHERE pa_records.PatientRecordID != '{$_GET['records']}' && pa_records.PatientRecordID = co_records.PatientRecordID && pa_records.PatientID='{$record['PatientID']}' && pa_records.DateIn < '{$date_}' ORDER BY co_records.Date DESC LIMIT 0, 2",$con),$multirows=true,$con);
$to_day_records = formatResultSet($rslt=returnResultSet($sql="SELECT co_records.*, pa_records.DocID from pa_records, co_records  WHERE pa_records.PatientRecordID = co_records.PatientRecordID && pa_records.PatientRecordID='{$_GET['records']}' ORDER BY co_records.Date DESC LIMIT 0, 2",$con),$multirows=true,$con);
//var_dump($to_day_records);

$old_consultation = "";
$last = "";
$nurseName = returnSingleField("SELECT Name FROM sy_users AS a INNER JOIN co_records AS b ON a.UserID = b.ConsultantID WHERE b.PatientRecordID = '{$_GET['records']}'", "Name", true, $con);
// var_dump($nurseName); die();
		
if($records){
	//$records[] = $records[0];
	$last .= "<div>
	<table class=_history><tr><th>Date</th><th>Diagnostic</th><th>Exams</th><th>Medecines</th><th>Acts</th><th>Hosp.</th></tr>";
	foreach($records as $r){
		//var_dump($r);
		$last .= "<tr valign=top><td>{$r['Date']}</td><td style='width:180px;'>";
		//search for diagnostic
		$diag_ = formatResultSet($rslt=returnResultSet($sql="SELECT co_diagnostic_records.*, co_diagnostic.DiagnosticName FROM co_diagnostic_records, co_diagnostic  WHERE co_diagnostic_records.DiagnosticID = co_diagnostic.DiagnosticID && co_diagnostic_records.ConsulationRecordID = '{$r['ConsultationRecordID']}' ORDER BY DiagnosticType ASC",$con),$multirows=true,$con);
		if($diag_){
			foreach($diag_ as $dg){
				$last .= ($dg['CaseType']?"AC":"NC").": ".$dg['DiagnosticName']."<br />";
			}
		}
		$last .= "</td><td style='width:150px;'>";
		//select exams
		$exams = formatResultSet($rslt=returnResultSet($sql="SELECT la_records.*, la_exam.ExamName, la_result.ResultName from la_result_record, la_result, la_records, la_price, la_exam  WHERE la_result.ResultID = la_result_record.ResultID && la_records.ExamRecordID = la_result_record.ExamRecordID && la_records.ExamPriceID = la_price.ExamPriceID && la_price.ExamID = la_exam.ExamID && la_records.ConsultationRecordID='{$r['ConsultationRecordID']}'",$con),$multirows=true,$con);
		//echo $sql;
		if($exams){
			$ck= 0;
			foreach($exams as $ex){
				$last .= "{$ex['ExamName']}: <font color=red>{$ex['ResultName']}</font><br />";
			}
		}
		$last .= "</td><td style='width:220px;'>";
		//select medecines
		$exams = formatResultSet($rslt=returnResultSet($sql="SELECT md_records.*, md_name.MedecineName from md_records, md_price, md_name  WHERE md_records.MedecinePriceID = md_price.MedecinePriceID && md_price.MedecineNameID = md_name.MedecineNameID && md_records.ConsultationRecordID='{$r['ConsultationRecordID']}'",$con),$multirows=true,$con);
		if($exams){
			$ck= 0;
			foreach($exams as $ex){
				$last .= "{$ex['Quantity']} {$ex['MedecineName']}<br />";
			}
		}
		$last .= "</td><td style='width:160px'>";
		//select acts
		$exams = formatResultSet($rslt=returnResultSet($sql="SELECT ac_records.*, ac_name.Name FROM ac_records, ac_price, ac_name  WHERE ac_records.ActPriceID = ac_price.ActPriceID && ac_price.ActNameID = ac_name.ActNameID && ac_records.PatientRecordID='{$r['PatientRecordID']}'",$con),$multirows=true,$con);
		if($exams){
			$ck= 0;
			foreach($exams as $ex){
				$last .= "{$ex['Name']}<br />";
			}
		}
		$last .= "</td><td style='width:150px'>";
		//select hospitalisation history now
		$exams = formatResultSet($rslt=returnResultSet($sql="SELECT ho_record.* FROM ho_record WHERE ho_record.RecordID='{$r['PatientRecordID']}'",$con),$multirows=true,$con);
		if($exams){
			$ck= 0;
			foreach($exams as $ex){
				$last .= "{$ex['Days']} Jrs<br />";
			}
		}
		$last .= "</td></tr>";
	}
	$last .= "</table></div>";
} else{
	$last = "No Previous Record";
}

//var_dump($records);
//die;
$consult_str = "<table><tr>";
$empty_cells = "";
$old_consultation_cells = "";
//var_dump($record);
$existing_cons = returnAllData("SELECT * FROM co_records WHERE PatientRecordID='{$record['PatientRecordID']}'",$con);
//var_dump($existing_cons);
$invisibl_ = true;
if(is_array($conslt)){
	foreach($conslt as $c){
		//var_dump($c);
		if($c['ConsultationCategoryName'] != "invisible"){
			$invisibl_ = false;
		}
		$consult_str .= $c['ConsultationCategoryName'] != "invisible"?"<td style='text-align:center; border:0px solid #000; width:120px; text-align:right;'>{$c['ConsultationCategoryName']}</td><td style='vertical-align:bottom; text-align:center; width:40px;'>".($c['ConsultationCategoryID'] == returnSingleField("SELECT co_price.ConsultationCategoryID FROM co_price WHERE co_price.ConsultationPriceID='{$to_day_records[0]['ConsultationPriceID']}'","ConsultationCategoryID",true,$con)?"<img src='../images/close.png' />":"&nbsp;&nbsp;&nbsp;")."</td>":"";
		//var_dump($existing_cons);
		if($existing_cons)
			$empty_cells .= "<td style='height:20px'>".(($ssss = returnSingleField($s_q_l = "SELECT co_price.ConsultationPriceID FROM co_price WHERE ConsultationPriceID='{$existing_cons[0]['ConsultationPriceID']}' && ConsultationCategoryID='{$c['ConsultationCategoryID']}'","ConsultationPriceID",$data=true, $con)) == $existing_cons[0]["ConsultationPriceID"]?"<center><img src='../images/close.png' width='30px' /></center>":"")."</td>";
		else
			$empty_cells .= "<td style='height:20px'></td>";
	}
}
if(!$invisibl_)
	$consult_str .= "<td style='text-align:center; border:0px solid #000; width:150px; text-align:right;'>Register No:</td><td style='width:100px;'></td>";
$consult_str .= "</tr></table>";
$diagno = "";
$existing_medicines = "";
$existing_medicines_date = "";
$existing_consumables = "";
$existing_consumables_date = "";
$existing_exams = "";
$existing_exams_date = "";
if($existing_cons){
	//select all diagno for the existing record
	$diag = returnAllData("SELECT co_diagnostic.*, co_diagnostic_records.* FROM co_diagnostic, co_diagnostic_records WHERE co_diagnostic.DiagnosticID = co_diagnostic_records.DiagnosticID && co_diagnostic_records.ConsulationRecordID='{$existing_cons[0]['ConsultationRecordID']}' ORDER BY DiagnosticType ASC",$con);
	//var_dump($diag);
	if(is_array($diag)){
		foreach($diag as $di){
			$diagno .= ($di['DiagnosticType'] == 1?"Principal":"Secondary").":".$di['DiagnosticName']." ".($di['CaseType']?"AC":"NC")."<br />";
		}
	}
	
	//select all exams for the existing record
	$exm = returnAllData("SELECT la_exam.*, la_result.*, la_records.* FROM la_exam, la_records, la_result_record, la_result WHERE la_exam.ExamID = la_result.ExamID && la_records.ExamRecordID = la_result_record.ExamRecordID && la_result_record.ResultID = la_result.ResultID && la_records.ConsultationRecordID = '{$existing_cons[0]['ConsultationRecordID']}'",$con);
	//var_dump($exm);
	$count_ = 1;
	if(is_array($exm))
		foreach($exm as $di){
			$existing_exams .= ($count_++).". ".$di['ExamName']." Result:".$di['ResultName']."<br />";
			if(!preg_match("/{$di['ResultDate']}/",$existing_exams_date))
				$existing_exams_date .= $di['ResultDate']."<br />";
			else
				$existing_exams_date .= "<br />";
		}
	//select who create the file'
		// $created = returnAllData("SELECT sy_users.name FROM sy_users,pa_records 
		// 												WHERE sy_users.UserID = pa_records.ReceptionistID",$con);
		// $agentCreate = $created['name'];
		// echo $agentCreate;
	//select all medecines for the existing record
	$mds = returnAllData("SELECT md_name.*, md_records.* FROM md_name, md_records, md_price WHERE md_name.MedecineNameID = md_price.MedecineNameID && md_price.MedecinePriceID = md_records.MedecinePriceID && md_records.ConsultationRecordID = '{$existing_cons[0]['ConsultationRecordID']}'",$con);
	//var_dump($exm);
	$count_ = 1;
	if(is_array($mds))
		foreach($mds as $di){
			$existing_medicines .= ($count_++).". ".$di['MedecineName']." Qty:".$di['Quantity']."<br />";
			if(!preg_match("/{$di['Date']}/",$existing_medicines_date))
				$existing_medicines_date .= $di['Date']."<br />";
			else
				$existing_medicines_date .= "<br />";
		}
	
	//select all consummables for the existing record
	$cns = returnAllData("SELECT md_name.*, cn_records.* FROM md_name, cn_records, md_price WHERE md_name.MedecineNameID = md_price.MedecineNameID && md_price.MedecinePriceID = cn_records.MedecinePriceID && cn_records.PatientRecordID = '{$existing_cons[0]['PatientRecordID']}'",$con);
	//var_dump($cns);
	$count_ = 1;
	if(is_array($cns))
		foreach($cns as $di){
			$existing_consumables .= ($count_++).". ".$di['MedecineName']." Qty:".$di['Quantity']."<br />";
			if(!preg_match("/{$di['Date']}/",$existing_consumables_date))
				$existing_consumables_date .= $di['Date']."<br />";
			else
				$existing_consumables_date .= "<br />";
		}
}
$age = getAge($patient['DateofBirth']);
$file_ID = $record['NationalID'];
$file_number = preg_replace("#/\d{1,2}$#", "", $record['InsuranceCardID']);
$genderFemale = $patient['Sex'] == "Female"?"<img src='../images/box-checked.png' />":"<img src='../images/box.png' />";
$genderMale = $patient['Sex'] == "Male"?"<img src='../images/box-checked.png' />":"<img src='../images/box.png' />";
//echo $file_number; die;

$agentName = "";

$zone 			= "<img src='../images/box.png' />";
$horszone 		= "<img src='../images/box.png' />";
$horsdistrict 	= "<img src='../images/box.png' />";

if(in_array($patient_address['CellID'], $zone_cells)){
	$zone = "<img src='../images/box-checked.png' />";
} else if(in_array($patient_address['DistrictID'], $zone_districts)){
	$horszone = "<img src='../images/box-checked.png' />";
} else {
	$horsdistrict = "<img src='../images/box-checked.png' />";
}

// var_dump($agentName); die();
$totalAmount = "";
$currentDiagnostics = returnAllData("SELECT GROUP_CONCAT(c.DiagnosticName) AS currentDiagnostics,
											a.PatientRecordID AS PatientRecordID,
											a.Date AS Date,
											1 AS Quantity,
											d.Amount AS Amount,
											e.ConsultationCategoryName AS ConsultationCategoryName,
											a.ConsultationRecordID AS ConsultationRecordID
											FROM co_records AS a
											INNER JOIN co_diagnostic_records AS b
											ON a.ConsultationRecordID = b.ConsulationRecordID
											INNER JOIN co_diagnostic AS c
											ON b.DiagnosticID = c.DiagnosticID
											INNER JOIN co_price AS d
											ON a.ConsultationPriceID = d.ConsultationPriceID
											INNER JOIN co_category AS e
											ON d.ConsultationCategoryID = e.ConsultationCategoryID
											WHERE a.PatientRecordID = '{$_GET['records']}'
											GROUP BY a.PatientRecordID
											", $con);
$currentDiagnostics = $currentDiagnostics[0];
if(is_array($currentDiagnostics)){
	$totalAmount = $currentDiagnostics['Amount'];
}
// var_dump($currentDiagnostics); echo"<hr />";
$currentLaboratoryExams = returnAllData("SELECT CONCAT(c.ExamName, ' number : ', a.ExamNumber, ' result: ', d.resultName) AS examName,
												a.ExamRecordID AS ExamRecordID,
												1 AS Quantity,
												b.Amount AS Amount
												FROM la_records AS a
												INNER JOIN la_price AS b
												ON a.ExamPriceID = b.ExamPriceID
												INNER JOIN la_exam AS c
												ON b.ExamID = c.ExamID
												LEFT JOIN (
													SELECT 	a.ExamRecordID AS ExamRecordID,
															GROUP_CONCAT(c.ResultName) AS resultName
															FROM la_records AS a
															INNER JOIN la_result_record AS b
															ON a.ExamRecordID = b.ExamRecordID
															INNER JOIN la_result AS c
															ON b.ResultID = c.ResultID
															WHERE a.ConsultationRecordID ='{$currentDiagnostics['ConsultationRecordID']}'
															GROUP BY ExamRecordID
												) AS d
												ON a.ExamRecordID = d.ExamRecordID
												WHERE a.ConsultationRecordID ='{$currentDiagnostics['ConsultationRecordID']}'
												", $con);
$loboratoryString = <<<LABO
				<tr>
					<td style="text-align: left; border-left: 0 solid #000; border-bottom: 0 solid #000; ">
						Laboratory Test/ Examens de laboratoire
						<br />&nbsp;
						
					</td>
					<td style="text-align: left; width:440px; ">
						&nbsp;
					</td>
					<td style="text-align: left; ">
						&nbsp;
					</td>
					<td style="text-align: left; ">
						&nbsp;
					</td>
					<td style='text-align: left; border-right: 0px solid #000;'>
						&nbsp;
					</td>
				</tr>
LABO;
// echo $loboratoryString;
if(is_array($currentLaboratoryExams)){
	$totalLaboratoryTest = 0; //$currentLaboratoryExams[0]['Amount'];
	$examNameString = "";
	$examQuantityString = "";
	$examUnitCostString = "";
	$examTOtalCostString= "";
	for($i=0; $i<count($currentLaboratoryExams); $i++){
		$totalLaboratoryTest += $currentLaboratoryExams[$i]['Amount'];
		$examNameString .= $currentLaboratoryExams[$i]['examName']."<br />";
		$examQuantityString .= $currentLaboratoryExams[$i]['Quantity']."<br />";
		$examUnitCostString .= $currentLaboratoryExams[$i]['Amount']."<br />";
		$examTOtalCostString.= $currentLaboratoryExams[$i]['Amount']."<br />";
		/*$loboratoryString .= "<tr>
								<td><b>{$currentLaboratoryExams[$i]['examName']}</b></td>
								<td style='text-align:right;'><b>{$currentLaboratoryExams[$i]['Quantity']}</b>&nbsp;</td>
								<td style='text-align:right;'><b>{$currentLaboratoryExams[$i]['Amount']}</b>&nbsp;</td>
								<td style='text-align:right;'><b>{$currentLaboratoryExams[$i]['Amount']}</b>&nbsp;</td>
							</tr>
							";*/
	}
	if($totalAmount > 0){
		$totalAmount += $totalLaboratoryTest;
	} else {
		$totalAmount = $totalLaboratoryTest;
	}
	$loboratoryString = "<tr>
							<td style='text-align: left; border-left: 0 solid #000; border-bottom: 0 solid #000;'>Laboratory Test/ Examens de laboratoire
								<br />&nbsp;
								
							</td>
							<td><b>{$examNameString}</b></td>
							<td style='text-align:right; padding: 5px;'><b>{$examQuantityString}</b></td>
							<td style='text-align:right; padding: 5px;'><b>{$examUnitCostString}</b></td>
							<td style='text-align:right; padding: 5px; border-right: 0px solid #000;'><b>{$examTOtalCostString}</b></td>
						 </tr>";
}
// var_dump($currentLaboratoryExams); echo "<hr/>";
$currentHospitalizationRecords = returnAllData("SELECT 	a.StartDate AS StartDate,
														a.EndDate AS EndDate,
														b.Amount AS Amount,
														c.Name AS Name
														FROM ho_record AS a
														INNER JOIN ho_price AS b
														ON a.HOPriceID = b.HOPriceID
														INNER JOIN ho_type AS c
														ON b.HOTypeID = c.TypeID
														WHERE a.RecordID = '{$_GET['records']}'
														",$con);
// var_dump($currentHospitalizationRecords);
$currentHospitalizationDays = "";
$currentHospitalizationCost = "";
if(is_array($currentHospitalizationRecords)){
	$currentHospitalizationRecords = $currentHospitalizationRecords[0];
	$currentHospitalizationDays = getAge($currentHospitalizationRecords['StartDate'], 1, $currentHospitalizationRecords['EndDate'], true);
	$currentHospitalizationCost = $currentHospitalizationDays * $currentHospitalizationRecords['Amount'];


	if($totalAmount > 0){
		$totalAmount += $currentHospitalizationCost;
	} else {
		$totalAmount = $currentHospitalizationCost;
	}
}

$acts_proceduresString = <<<ACT
				<tr>
					<td style="text-align: left; border-left: 0 solid #000; border-bottom: 0 solid #000; ">
						Procedures & Consumables/ Acts et Consommables
						<br />&nbsp;
						<br />&nbsp;
						<br />&nbsp;
					</td>
					<td style="text-align: left; width:440px; ">
						&nbsp;
					</td>
					<td style="text-align: left; ">
						&nbsp;
					</td>
					<td style="text-align: left; ">
						&nbsp;
					</td>
					<td style="text-align: left; border-right: 0px solid #000; ">
						&nbsp;
					</td>
				</tr>
ACT;

$currentActs = returnAllData("SELECT 	a.Quantity AS Quantity,
										a.Date AS Date,
										b.Amount AS Amount,
										c.Name AS Name
										FROM ac_records AS a
										INNER JOIN ac_price AS b
										ON a.ActPriceID = b.ActPriceID
										INNER JOIN ac_name AS c
										ON b.ActNameID = c.ActNameID
										WHERE a.PatientRecordID = '{$_GET['records']}'
										", $con);

$currentConsumables = returnAllData("SELECT 	a.Quantity AS Quantity,
												a.Date AS Date,
												b.Amount AS Amount,
												c.MedecineName AS Name
												FROM cn_records AS a
												INNER JOIN cn_price AS b
												ON a.MedecinePriceID = b.MedecinePriceID
												INNER JOIN cn_name AS c
												ON b.MedecineNameID = c.MedecineNameID
												WHERE a.PatientRecordID = '{$_GET['records']}'
												", $con);
$actsFound = false;
$actsTotal = NULL;
$actNameString = "";
$actQuantityString = "";
$actUnitCostString = "";
$actTotalCostString= "";
if(is_array($currentActs)){
	$actsFound = true;
	$actsTotal = 0; 
	
	for($i=0; $i<count($currentActs); $i++){
		$actsTotal += $currentActs[$i]['Quantity'] * $currentActs[$i]['Amount'];
		$actTotalCost 		= ($currentActs[$i]['Quantity'] * $currentActs[$i]['Amount']);
		$actNameString 		.= "<b>{$currentActs[$i]['Name']}</b><br />";
		$actQuantityString 	.= "<b>{$currentActs[$i]['Quantity']}</b><br />";
		$actUnitCostString 	.= "<b>{$currentActs[$i]['Amount']}</b><br />";
		$actTotalCostString	.= "<b>{$actTotalCost}</b><br />";
	}
}

if(is_array($currentConsumables)){
	if(!$actsFound){
		$actsTotal = 0; 
	}
	for($i=0; $i<count($currentConsumables); $i++){
		$actsTotal += $currentConsumables[$i]['Quantity'] * $currentConsumables[$i]['Amount'];
		$actTotalCost 		= ($currentConsumables[$i]['Quantity'] * $currentConsumables[$i]['Amount']);
		$actNameString 		.= "<b>{$currentConsumables[$i]['Name']}</b><br />";
		$actQuantityString 	.= "<b>{$currentConsumables[$i]['Quantity']}</b><br />";
		$actUnitCostString 	.= "<b>{$currentConsumables[$i]['Amount']}</b><br />";
		$actTotalCostString	.= "<b>{$actTotalCost}</b><br />";
	}
}

if(is_array($currentConsumables) || is_array($currentActs)){
	$acts_proceduresString = <<<ACT
				<tr>
					<td style="text-align: left; border-left: 0 solid #000; border-bottom: 0 solid #000; ">
						Procedures & Consumables/ Acts et Consommables
						<br />&nbsp;
						
					</td>
					<td style="text-align: left; width:440px; ">
						{$actNameString}&nbsp;
					</td>
					<td style="text-align: right; padding:5px; ">
						{$actQuantityString}&nbsp;
					</td>
					<td style="text-align: right; padding:5px; ">
						{$actUnitCostString}&nbsp;
					</td>
					<td style="text-align: right; padding:5px; border-right: 0px solid #000; ">
						{$actTotalCostString}&nbsp;
					</td>
				</tr>
ACT;
	if($totalAmount > 0){
		$totalAmount += $actsTotal;
	} else {
		$totalAmount = $actsTotal;
	}
}
// var_dump($currentActs);
$medicinesString = <<<MEDICINES
				<tr>
					<td style="text-align: left; border-left: 0 solid #000; border-bottom: 0 solid #000; ">
						Medicines/ Midicaments<br />
						(Form/Forme & Dosage)
						<br />&nbsp;
						<br />&nbsp;
						<br />&nbsp;
					</td>
					<td style="text-align: left; width:440px; ">
						&nbsp;
					</td>
					<td style="text-align: left; ">
						&nbsp;
					</td>
					<td style="text-align: left; ">
						&nbsp;
					</td>
					<td style="text-align: left; border-right: 0px solid #000; ">
						&nbsp;
					</td>
				</tr>
MEDICINES;
$currentMedicines = returnAllData("SELECT 	CONCAT(c.MedecineName, ': ', a.SpecialPrescription) AS MedecineName,
											a.MedecineRecordID AS MedecineRecordID,
											a.Quantity AS Quantity,
											b.Amount AS Amount,
											a.Date AS Date
											FROM md_records AS a
											INNER JOIN md_price AS b
											ON a.MedecinePriceID = b.MedecinePriceID
											INNER JOIN md_name AS c
											ON b.MedecineNameID = c.MedecineNameID
											WHERE a.ConsultationRecordID ='{$currentDiagnostics['ConsultationRecordID']}'
											", $con);
// var_dump($currentMedicinesExams);
$medicinesTotal = "";
if(is_array($currentMedicines)){
	$medicinesTotal 		= $currentMedicines[0]['Amount'] * $currentMedicines[0]['Quantity'];
	$medineNameString 		= "";
	$medineQuantityString 	= "";
	$medineUnitCostString 	= "";
	$medineTotalCostString 	= "";
	for($i=0; $i<count($currentMedicines); $i++){
		$medicinesTotal += $currentMedicines[$i]['Amount']*$currentMedicines[$i]['Quantity'];
		$medicineTotal 			= ($currentMedicines[$i]['Amount']*$currentMedicines[$i]['Quantity']);
		$medineNameString 		.= "<b>{$currentMedicines[$i]['MedecineName']}</b><br />";
		$medineQuantityString 	.= "<b>{$currentMedicines[$i]['Quantity']}</b><br />";
		$medineUnitCostString 	.= "<b>{$currentMedicines[$i]['Amount']}</b><br />";
		$medineTotalCostString 	.= "<b>{$medicineTotal}</b><br />";
		
	}
	$medicinesString = <<<MEDICINES
				<tr>
					<td style="text-align: left; border-left: 0 solid #000; border-bottom: 0 solid #000; ">
						Medicines/ Midicaments<br />
						(Form/Forme & Dosage)
						<br />&nbsp;
						
					</td>
					<td style="text-align: left; width:440px;">
						{$medineNameString}&nbsp;
					</td>
					<td style="text-align: right; padding:5px;">
						{$medineQuantityString}&nbsp;
					</td>
					<td style="text-align: right; padding:5px;">
						{$medineUnitCostString}&nbsp;
					</td>
					<td style="text-align: right; padding:5px; border-right: 0px solid #000; ">
						{$medineTotalCostString}&nbsp;
					</td>
				</tr>
MEDICINES;

	if($totalAmount > 0){
		$totalAmount += $medicinesTotal;
	} else {
		$totalAmount = $medicinesTotal;
	}
}
$tmAmount = returnAllData("SELECT * FROM mu_tm WHERE PatientRecordID='{$_GET['records']}'",$con)[0];
$tmPaid = (int)$tmAmount['TicketPaid'];
$totalAmountInsurance = $totalAmount;
if($tmPaid == 200){
	$totalAmountInsurance -= $tmPaid;
}
$totalAmount = $totalAmount > 0?number_format($totalAmount,2):"";
$totalAmountInsurance = $totalAmountInsurance>0?number_format($totalAmountInsurance, 2):"";
$totalAmountPatient = $tmPaid;
// var_dump($tmAmount);
//$tm = "<th>&nbsp;</th>";
// die();
//select who create the file'
		$created = returnAllData("SELECT sy_users.Name,pa_records.ReceptionistID FROM sy_users,pa_records WHERE sy_users.UserID = pa_records.ReceptionistID && pa_records.PatientRecordID = '{$_GET['records']}'",$con);
		foreach ($created AS $ddddd) {
			# code...
		$agentCreatEFile = $ddddd['Name'];
		}
		$cktemp =  $record['Temperature'];
		if ($cktemp  == 0) {
			# code...
			$cktemp ="";
		}else{
			$cktemp =  $record['Temperature'];
		}
$info = <<<INFO
<html><head><title>CBHI Patients</title></head><body>
<style>
	.withborders td{
		border:1px solid #000;
		vertical-align:top;
	}

	table tr td{
		font-size:12px;
	}
	
	.inner_table td{margin-left:-2px;}
	.inner_table{ border:0px solid #000; margin-left:-3px;}
	._history{ border-collapse:collapse; }
	._history td{vertical-align:top; border-top:1px solid #000; font-size:12px; font-weight:normal; font-family:arial; }
</style>
<table width=100% border=0 style="border-collapse:collapse;">
	<tr>
		<th align=left>
			RWANDA SOCIAL SECURItY BOARD (RSSB)<br />
			Community Based Health Insurance (CBHI)<br />
			Tel: 4044
		</th>
		{$tm}
	</tr>
	<tr>
		<td colspan=2 style="text-align: center; border: 0px solid #000; ">
			HEALTH CARE INVOICE / FACTURE POUR SOINS DE SANTE N<sup><u>0</u></sup>: <b>{$record['DocID']}</b>
		</td>
	<tr>
	<tr>
		<td colspan=2 style="text-align: left;  border: 0px solid #000;">
			&nbsp;
		</td>
	</tr>
	<tr>
		<td colspan=2 style="text-align: left; background-color:#dfdfdf; border-top: 1px solid #000;  border-left: 1px solid #000;  border-right: 1px solid #000; ">
			I. HEALTH FACILITY INFORMATION / INFROMATION SUR LA FORMATION SANITAIRE
		</td>
	</tr>
	<tr>
		<td colspan=2 style="text-align: left;  border-left: 1px solid #000;  border-right: 1px solid #000; padding-bottom:6px; ">
			Health facility name / Nom de la formation sanitaire: <b>{$institution_name}</b>
		</td>
	</tr>
	<tr>
		<td colspan=2 style="text-align: left;  border-left: 1px solid #000;  border-right: 1px solid #000; ">
			District name / Nom du District: <b>{$_DISTRICT}</b>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			ID Number:
		</td>
	</tr>
	<tr>
		<td colspan=2 style="text-align: left; border-bottom: 1px solid #000;  border-left: 1px solid #000;  border-right: 1px solid #000; padding-bottom:10px; ">
			Type of health facility / Type de formation sanitaire:
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			HC/CS
			<img src="../images/box.png" />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			HP/PS
			<img src="../images/box-checked.png" />
		</td>
	</tr>
	<tr>
		<td colspan=2 style="text-align: left;  border: 0px solid #000;">
			&nbsp;
		</td>
	</tr>
	<tr>
		<td colspan=2 style="text-align: left; background-color:#dfdfdf; border-top: 1px solid #000;  border-left: 1px solid #000;  border-right: 1px solid #000; ">
			II. PATIENT INFORMATION / INFORMATION SUR LE PATIENT
		</td>
	</tr>
	<tr>
		<td style="text-align: left;  border-left: 1px solid #000; padding-bottom:6px; ">
			Name Head of the household/Nom du chef de menage: <b>{$patient['FamilyCode']}</b>
		</td>
		<td style='border-right: 1px solid #000;'>
			ID Number: <b>{$file_ID}</b>
		</td>
	</tr>
	<tr>
		<td style="text-align: left;  border-left: 1px solid #000; padding-bottom:6px; ">
			&nbsp;
		</td>
		<td style='border-right: 1px solid #000;'>
			Application Number(if no ID):
		</td>
	</tr>
	<tr>
		<td style="text-align: left;  border-left: 1px solid #000; padding-bottom:6px; ">
			Beneficiary Name/Nom du beneficiaire: <b>{$patient['Name']}</b>
		</td>
		<td style='border-right: 1px solid #000;'>
			ID Number (if exists): <b>{$record['InsuranceCardID']}</b>
		</td>
	</tr>
	<tr>
		<td colspan=2 style="text-align: left;  border-left: 1px solid #000; border-right: 1px solid #000; padding-bottom:6px; width:150px; ">
			Catchment Area/Zone de rayonnement:
			Z {$zone}
			&nbsp;
			HZ {$horszone}
			&nbsp;
			HD {$horsdistrict}
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Telephone Number/Numero de Telephone:<b></b>
		</td>
	</tr>
	<tr>
		<td colspan=2 style="text-align: left;  border-left: 1px solid #000; border-right: 1px solid #000; padding-bottom:6px;">
			Sex/Sexe:
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Female {$genderFemale}
			&nbsp;
			Male {$genderMale}
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;
			Ubudehe Category/Categorie ubudehe:<b>{$record['FamilyCategory']}</b>
		</td>
	</tr>
	<tr>
		<td colspan=2 style="text-align: left;  border-left: 1px solid #000; border-right: 1px solid #000; padding-bottom:6px;">
			Date of Birth: <b>{$patient['DateofBirth']}</b> 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Weigth: <b>{$record['Weight']} kg</b>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Temp: <b>{$cktemp}</b>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Prisonner/Prisonier:
			&nbsp;&nbsp;
			Yes <img src="../images/box.png" />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			No <img src="../images/box-checked.png" />
		</td>
	</tr>
	<tr>
		<td colspan=2 style="text-align: left; border-bottom: 1px solid #000;  border-left: 1px solid #000;  border-right: 1px solid #000; padding-bottom:10px; ">
			Age: <b>{$age}</b>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			District: <b>{$patient_address['DistrictName']}</b>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Sector: <b>{$patient_address['SectorName']}</b>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Cell: <b>{$patient_address['CellName']}</b>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Village: <b>{$patient_address['VillageName']}</b>
		</td>
	</tr>
	<tr>
		<td colspan=2 style="text-align: left;  border: 0px solid #000; height:10px;">
			&nbsp;
		</td>
	</tr>
	<tr>
		<td colspan=2 style="text-align: left; background-color:#dfdfdf; border-top: 1px solid #000;  border-left: 1px solid #000;  border-right: 1px solid #000; ">
			Two Last Visit Details / Detail de deux derniere visite
		</td>
	</tr>
	<tr>
		<td colspan=2 style="text-align: left; border-bottom: 1px solid #000;  border-left: 1px solid #000;  border-right: 1px solid #000; padding-bottom:10px; ">
			{$last}
		</td>
	</tr>
	<tr>
		<td colspan=2 style="text-align: left;  border: 0px solid #000;">
			&nbsp;
		</td>
	</tr>
	<tr>
		<td colspan=2 style="text-align: left; background-color:#dfdfdf; border-top: 1px solid #000;  border-left: 1px solid #000;  border-right: 1px solid #000; ">
			II. DETAILS OF MEDICAL CARE RECEIVED/DETAILS DES SOINS RECUS
		</td>
	</tr>
	<tr>
		<td colspan=2 style="text-align: left; font-size:12px; border-left: 1px solid #000;  border-right: 1px solid #000; padding-bottom:6px; ">
			Type of Medical Visit/Type de visite Medicale: 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Outpatient/Ambulatoire {$outpatient_str}
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Inpatient/Hospitalization {$inpatient_str}
			{$transfer_str}
		</td>
	</tr>
	<tr>
		<td colspan=2 style="text-align: left; font-size:12px; border-left: 1px solid #000;  border-right: 1px solid #000; padding-bottom:6px; ">
			Deasese Episode/Episode de la maladie: 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			New Case/Nouveaux Cas {$newcase_str}
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Old Case/Ancien Cas {$oldcase_str}
		</td>
	</tr>
	<tr>
		<td colspan=2 style="text-align: left; font-size:12px; border-bottom: 1px solid #000;  border-left: 1px solid #000;  border-right: 1px solid #000; padding-bottom:10px; ">
			Purpose of the visit/Motif de la visite: 
			Natural Deasese/Maladie naturelle {$nd_str}
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Occupational Deases/Maladie Professionnelle {$od_str}<br />
			Road Traffic Accident/Accident de la circulation {$rta_str}
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Work Accident/Accident de Travail {$wa_str}
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Other/Autre {$other_str}
		</td>
	</tr>
	<tr>
		<td colspan=2 style="text-align: left; background-color:#dfdfdf; border-top: 1px solid #000;  border-left: 1px solid #000;  border-right: 1px solid #000; ">
			DIAGNOSIS/DIAGNOSTIC
		</td>
	</tr>
	<tr>
		<td colspan=2 style="text-align: left; font-size:12px; border-bottom: 0px solid #000;  border-left: 1px solid #000;  border-right: 1px solid #000;">
			<b>{$currentDiagnostics['currentDiagnostics']}</b><br />&nbsp;
		</td>
	</tr>
	<tr>
		<td colspan=2 style="text-align: left; border-bottom: 1px solid #000;  border-left: 1px solid #000;  border-right: 1px solid #000;">
			<table border=1 style="border-collapse:collapse; font-size:11px; width:100%; margin-left:-3px; margin-right:-3px; margin-bottom:-3px;">
				<tr>
					<td colspan=2 style="text-align: center; background-color:#dfdfdf; border-left: 0 solid #000; width:580px; ">
						Description
					</td>
					<td style="text-align: center; background-color:#dfdfdf; width:120px; ">
						Quantity/Days
						Quantité/Jour
					</td>
					<td style="text-align: center; background-color:#dfdfdf; border: 1px solid #000; width:100px;  ">
						Unit Cost/ Coût Initaire
					</td>
					<td style="text-align: center; background-color:#dfdfdf; border-right: 0px solid #000; width:100px;  ">
						Total Cost/ Coùt Total
					</td>
				</tr>
				<tr>
					<td style="text-align: left; border-left: 0 solid #000; border-bottom: 0 solid #000; ">
						Consultation<br /><b>{$record['DateIn']}<b>&nbsp;
					</td>
					<td style="text-align: left; width:300px; ">
						<b>{$currentDiagnostics['ConsultationCategoryName']}</b>&nbsp;
					</td>
					<td style="text-align: right; ">
						<b>{$currentDiagnostics['Quantity']}</b>&nbsp;
					</td>
					<td style="text-align: right; ">
						<b>{$currentDiagnostics['Amount']}</b>&nbsp;
					</td>
					<td style="text-align: right; border-right: 0px solid #000; ">
						<b>{$currentDiagnostics['Amount']}</b>&nbsp;
					</td>
				</tr>
				{$loboratoryString}
				<tr>
					<td style="text-align: left; border-left: 0 solid #000; border-bottom: 0 solid #000; ">
						Hospitalization
						From/Du: &nbsp;<b>{$currentHospitalizationRecords['StartDate']}</b><br />
						To/Au: &nbsp;<b>{$currentHospitalizationRecords['EndDate']}</b>
					</td>
					<td style="text-align: left; width:440px; ">
						<b>{$currentHospitalizationRecords['Name']}</b>&nbsp;
					</td>
					<td style="text-align: right; ">
						<b>{$currentHospitalizationDays}</b>&nbsp;
					</td>
					<td style="text-align: right; ">
						<b>{$currentHospitalizationRecords['Amount']}</b>&nbsp;
					</td>
					<td style="text-align: right; border-right: 0px solid #000; ">
						<b>{$currentHospitalizationCost}</b>&nbsp;
					</td>
				</tr>
				{$acts_proceduresString}
				{$medicinesString}
				<tr>
					<td style="text-align: left; border-left: 0 solid #000; border-bottom: 1 solid #000; ">
						Ambulance<br />
						Date:
					</td>
					<td style="text-align: left; width:440px; ">
						&nbsp;
					</td>
					<td style="text-align: right; ">
						KM&nbsp;
					</td>
					<td style="text-align: left; ">
						&nbsp;
					</td>
					<td style="text-align: left; border-right: 0px solid #000; ">
						&nbsp;
					</td>
				</tr>
				<tr>
					<td style="text-align: left; border-left: 0 solid #000; border-bottom: 1 solid #000; ">
						Other/Autre(To specify/à specifier)
						
					</td>
					<td style="text-align: left; width:440px; ">
						&nbsp;
					</td>
					<td style="text-align: right; ">
						&nbsp;
					</td>
					<td style="text-align: left; ">
						&nbsp;
					</td>
					<td style="text-align: left; border-right: 0px solid #000; ">
						&nbsp;
					</td>
				</tr>
			</table>
			&nbsp;<br />
			<table border=1 style="border-collapse:collapse; font-size:11px; width:100%; margin-left:-3px; margin-right:-3px; margin-bottom:-3px;">
				<tr>
					<td style="text-align: left;  border-left: 0 solid #000; width:380px; ">
						Total Billed Amount / Montant Total Facturé (100%)
					</td>
					<td style="text-align: right; background-color:#dfdfdf; width:120px; ">
						<b>{$totalAmount} Rwf</b>&nbsp;
					</td>
				</tr>
				<tr>
					<td style="text-align: left;  border-left: 0 solid #000; width:380px; ">
						Patient Contribution / Ticket modélateur (200 Rwf/0 Rwf) 
					</td>
					<td style="text-align: right; background-color:#dfdfdf; width:120px; ">
						<b>{$totalAmountPatient} Rwf</b>&nbsp;
					</td>
				</tr>
				<tr>
					<td style="text-align: left;  border-left: 0 solid #000; width:380px; ">
						Amount to be paid by RSSB-CBHI / Montant à payer par RSSB-CBHI 
					</td>
					<td style="text-align: right; background-color:#dfdfdf; width:120px; ">
						<b>{$totalAmountInsurance} Rwf</b>&nbsp;
					</td>
					<td style='width:300px; border-top: 0px solid #000; border-bottom: 0px solid #000; border-right: 0px solid #000;'>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						Date: <b>{$record['DateIn']}</b>
					</td>
				</tr>
			</table>
			&nbsp;<br />
		</td>
	</tr>
	<tr>
		<td colspan=2 style="text-align: left; border: 0px solid #000;">
			&nbsp;
		</td>
	</tr>
	<tr>
		<td colspan=2 style="text-align: left; border-top: 1px solid #000; font-size:12px; border-left: 1px solid #000;  border-right: 1px solid #000; ">
			Beneficiary name & signature/Nom et Signature du beneficiaire: <b>{$patient['Name']}</b><br />&nbsp;
		</td>
	</tr>
	<tr>
		<td style="width:20%; text-align: left; border-bottom: 1px solid #000; font-size:10px; border-left: 1px solid #000;  border-right: 0px solid #000; padding-bottom:5px;">
			Nurse name & signature/Nom et signature infirmier(ère) traitant <br />
			<b>{$nurseName}</b><br />
			Health facility Stamp/Cacher du CS/PS
		</td>
		<td style="text-align: left; border-bottom: 1px solid #000; font-size:10px; border-left: 0px solid #000;  border-right: 1px solid #000; padding-bottom:5px;">
			Approval of CBHI Verification Agent/Approbation du verificateur CBHI<br />
			<b>{$agentName}</b><br />
			CBHI Stamp/Cachet
		</td>
	</tr>
</table>
<span style="text-align: left;font-size:7.5px; border-left: 0px solid #000;padding-bottom:5px;">Created by:{$agentCreatEFile}</span>
</body>

</html>
INFO;

// echo $info; die;

//require the MPDF Library
require_once "../lib/mpdf57/mpdf.php";

$pdf = new MPDF();

$pdf->Open();

$pdf->AddPage();

$pdf->SetFont("Arial","N",10);

$pdf->WriteHTML($info);
$pdf->setHTMLFooter("<div style='font-size:7px; font-family:arial; font-weight:bold; text-align:right; border-top:1px dashed #dfdfdf; color:#dfdfdf;'>printed using care software | powered by Easy one ltd</div>");
$filename = "./files/".$record['DocID'].".pdf";
//echo $filename;
$pdf->Output(); 
die;
?>
<script type="text/javascript" language=JavaScript>
    function CheckIsIE()
    {
        if (navigator.appName.toUpperCase() == 'MICROSOFT INTERNET EXPLORER') 
            { return true;  }
        else 
            { return false; }
    }
    function PrintThisPage()
    {
         if (CheckIsIE() == true)
         {
            document.content.focus();
            document.content.print();
         }
         else
         {
            window.frames['iframeprint'].focus();
            window.frames['iframeprint'].print();
         }
     }
</script> 
<link href="./print.css" rel="stylesheet" type="text/css" media="print" />
<button value='print' onclick='PrintThisPage()'></button>
<script type="text/javaScript" src='../js/jquery.full.js'></script>
<script>
jQuery(document).ready(function($) {
  function print(url)
  {
      var _this = this,
          iframeId = 'iframeprint',
          $iframe = $('iframe#iframeprint');
		  
      $iframe.attr('src', url);

      $iframe.load(function() {
          callPrint(iframeId);
		  //console.log($iframe);
      });
  }

  //initiates print once content has been loaded into iframe
  function callPrint(iframeId) {
	  //alert("Print trigger_error");
      var PDF = document.getElementById(iframeId);
		//window.frames['iframeprint'].focus();
		//window.frames['iframeprint'].print();
      /* PDF.focus();
	  try{
			
			console.log("Attempt to print");
			PDF.contentWindow.print();
			//
			console.log("End of print attempt");
	  } catch(e){
		  console.log(e);
		  window.print();
	  } */
  }
  //try to call print function now
  print("<?= $filename ?>");
});
</script>

<iframe id="iframeprint" name="iframeprint" width='99%' height='98%'></iframe>

<?php die; ?>
<style type="text/css">
    
        .dontprint{display:none} 
    
</style>
<script type="text/javascript">
    function printIframePdf(){
        window.frames["printf"].focus();
        try {
            window.frames["printf"].print();
        }
        catch(e){
            window.print();
            console.log(e);
        }
    }
    function printObjectPdf() {
        try{            
            document.getElementById('idPdf').Print();
        }
        catch(e){
            printIframePdf();
            console.log(e);
        }
    }

    function idPdf_onreadystatechange() {
        if (idPdf.readyState === 4){
			alert("Ready to print now"); return;
            setTimeout(printObjectPdf, 1000);
		}
    }
</script>
<div class="dontprint" >
    <form><input type="button" onClick="printObjectPdf()" class="btn" value="Print"/></form>
</div>

<iframe id="printf" onreadystatechange='alert("OK");' name="printf" src="<?= $filename ?>" frameborder="0" width="440" height="580" style="width: 99%; height: 98%;display: none;"></iframe>
<object id="idPdf" onreadystatechange="alert('OK');idPdf_onreadystatechange()"
    width="440" height="580" style="width: 99%; height: 98%;" type="application/pdf"
    data="<?= $filename ?>">
    <embed src="<?= $filename ?>" width="440" height="580" style="width: 440px; height: 580px;" type="application/pdf">
    </embed>
    <span>PDF plugin is not available.</span>
</object>