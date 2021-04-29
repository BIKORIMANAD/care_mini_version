<?php
session_start();
set_time_limit(0);
//var_dump($_SESSION);
require_once "../lib/db_function.php";
if("mut" !== returnSingleField($sql="SELECT PostCode from sy_post WHERE PostID='{$_SESSION['user']['PostID']}'",$field="PostCode",$data=true, $con)){
	echo "<script>window.location='../logout.php';</script>";
	return;
}
//var_dump($_GET);
if(!@$_GET['key']){
	
	echo "<span class=error-text>Select Insurance</span>";
	return;
}
$select = "";
$post = "";
$posts = explode("_", $_GET['post']);
//var_dump($posts);
$count = count($post);
$current = 1;
$sys = "("; $sys_s = 0;
$ok = false;
foreach($posts as $pst){
	$ps = returnSingleField($sql="SELECT CenterName FROM sy_center WHERE CenterID='{$pst}'",$field="CenterName",$data=true, $con);
	//var_dump($ps);
	if($ps != null){
		$ok = true;
		if($post && $current++ == $count)
			$post .= " And ";
		else
			$post .= " ";
		$post .= $ps;
		if($sys_s++ > 0)
			$sys .= " || ";
		$sys .= "sy_center.CenterName = '{$ps}'";
	}
}
$sys .= ")";
if(!$ok){
	echo "<span class=error>No Post Selected</span>";
	return;
}
//var_dump($_GET);
$sp_condition = "";
if(@$_GET['filter']){
	$sp_condition .= " && (
		pa_records.InsuranceCardID LIKE('%{$_GET['filter']}%') ||
		pa_info.Name LIKE('%{$_GET['filter']}%') ||
		pa_info.FamilyCode LIKE('%{$_GET['filter']}%')
	)";
}
//echo $sys;
if(strlen($_GET['key'])){
	//select all possible information on the comming id
	$patients = formatResultSet($rslt=returnResultSet($sql="SELECT DISTINCT pa_records.NationalID, pa_records.DocID, pa_records.Status, pa_records.PatientRecordID, pa_records.FamilyCategory, pa_records.DateIn, pa_records.InsuranceCardID, pa_info.*, ad_village.*, ad_cell.*, ad_sector.*, ad_district.* FROM pa_records, pa_info, ad_village, ad_cell, ad_sector, ad_district, sy_users, sy_center WHERE pa_info.PatientID = pa_records.PatientID && pa_info.VillageID=ad_village.ViillageID && ad_village.CellID=ad_cell.CellID && ad_cell.SectorID=ad_sector.SectorID && ad_sector.DistrictID=ad_district.DistrictID && pa_records.ReceptionistID = sy_users.UserID && sy_users.CenterID = sy_center.CenterID && {$sys}  && InsuranceNameID='{$_GET['key']}' && DateIn >= '{$_GET['start_date']}' && DateIn <= '{$_GET['end_date']}' {$sp_condition} ORDER BY pa_records.DateIn ASC, pa_records.PatientRecordID ASC",$con),$multirows=true,$con); // && pa_records.Status != 0 

	/*$patients = formatResultSet($rslt=returnResultSet($sql="SELECT DISTINCT pa_records.DocID, pa_records.PatientRecordID, pa_records.FamilyCategory, pa_records.DateIn, pa_records.InsuranceCardID, pa_records.NationalID, pa_info.* FROM se_name, se_records, pa_records, pa_info, ad_village, ad_cell, ad_sector, ad_district, sy_users, sy_center, ac_records WHERE se_name.ServiceCode IN('PST', 'CPN') && pa_records.PatientRecordID = ac_records.PatientRecordID && pa_records.PatientRecordID = se_records.PatientRecordID && se_records.ServiceNameID = se_name.ServiceNameID && pa_info.PatientID = pa_records.PatientID && pa_info.VillageID=ad_village.ViillageID && ad_village.CellID=ad_cell.CellID && ad_cell.SectorID=ad_sector.SectorID && ad_sector.DistrictID=ad_district.DistrictID && pa_records.ReceptionistID = sy_users.UserID && sy_users.CenterID = sy_center.CenterID && pa_records.InsuranceNameID='{$_GET['key']}' && {$sys} && DateIn LIKE('{$_GET['year']}-{$_GET['month']}%') {$sp_condition} ORDER BY pa_records.DateIn ASC, pa_records.PatientRecordID ASC",$con),$multirows=true,$con); // && pa_records.Status != 0 */
?>
<style>
		table#vsbl td, table#vsbl th{font-size:11px; font-family:arial; font-weight:bold; border:1px solid #000;}
		.number_right{ text-align:right; }
	</style>
	<span class=styling></span>
	<?= @$_GET['filter']?"<script>$('#filter_').val('{$_GET['filter']}');</script>":"" ?> <span style='float:right;'><?= @$_GET['filter']?"<a href='#' id=filter_remove style=' color:blue; border:0px solid #eee; font-size:12px; text-decoration:none;' ><img src='../images/filter_remove.png' /> Remove Filter</a>":"" ?><a href='#' id=filter style=' color:blue; border:0px solid #eee; font-size:12px; text-decoration:none;' > <img src='../images/filter.png' /> Filter </a></span>
	
<?php
//echo $sql;
if($patients){
	$file_name = "./prestation_{$post}.xlsx";
	//echo $file_name;
	//include phpExcel library in the file
	require_once "../lib2/PHPExcel/IOFactory.php";
	require_once "../lib2/PHPExcel.php";
	//instantiate the PHPExcel object
	$objPHPExcel = new PHPExcel;
	
	//instantiate the writer object
	$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel, "Excel2007");
	
	$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial');
	$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);
	
	$objPHPExcel->setActiveSheetIndex(0);
	
	$activeSheet = $objPHPExcel->getActiveSheet();
	?>
	<script>
		$("#filter").click(function(e){
			$(".patient_found").load("prest_data.php?key=" + $("#insurance").val() + "&start_date=" + $("#start_date").val() + "&end_date=" + $("#end_date").val() + "&post=" + $("#post").val() + "&filter=" + prompt("Enter Filter Key",'<?= @$_GET['filter'] ?>').replace(/ /g,"%20"));
			return e.preventDefault();
		});
		$("#filter_remove").click(function(e){
			$("#filter_").val("");
			$(".patient_found").load("prest_data.php?key=" + $("#insurance").val() + "&start_date=" + $("#start_date").val() + "&end_date=" + $("#end_date").val() + "&post=" + $("#post").val() + "&filter=" + $("#filter_").val().replace(/ /g,"%20"));
			return e.preventDefault();
		});
		//$("#filter").focus();
		function deleteProfileNow(record_id){
			$.ajax({
				type: "POST",
				url: "./delete_patient_file.php",
				data: "record_id=" + record_id,
				cache: false,
				success: function(result){
					$(".doc_selected").html(result);
					$(".patient_found").load("document_list_cbhi.php?key=" + $("#insurance").val() + "&day=" + $("#day").val() + "&month=" + $("#month").val() + "&year=" + $("#year").val() + "&post=" + $("#post").val() + "&filter=" + $("#filter_").val().replace(/ /g,"%20"));
				}
			});
		}
	</script>
	<b class=visibl>
	<span class=success style='font-weight:bold; font-size:20px;'>
	RSSB CBHI UTILIZATION OF MEDICAL SERVICES<br />
	Post: <?= $post ?><br />
	Period: <?= $_GET['start_date']." - ".$_GET['end_date'] ?><br />
	Number: <?= count($patients) ?> Patient<?= count($patients)>1?"s":"" ?> 
	</span><br />
	<?php
	
	$row = 1;
	$first_column = 'A';
	$activeSheet->setCellValue($first_column ."".$row++,"RSSB-CBHI Prestation Document");
	$activeSheet->setCellValue($first_column ."".$row++,"Post: ".$post);
	$activeSheet->setCellValue($first_column ."".$row++,"Period: ".$_GET['start_date']." - ".$_GET['end_date']);
	$activeSheet->setCellValue($first_column ."".$row++,"Number of Patients: ".count($patients) );

	for($kkk = 0; $kkk < (26 - 9); $kkk++){
		$activeSheet->setCellValue(($first_column++).$row, "");
	}
	$activeSheet->setCellValue(($first_column++).$row, "PATIENTS FREQUENTING HEALTH FACILITIES");
	for($kkk = 1; $kkk <= 15 ; $kkk++){
		$activeSheet->setCellValue(($first_column++).$row, "");
	}
	$activeSheet->setCellValue(($first_column++).$row, "HEALTH CARE SERVICES");
	$first_column = 'A';
	$row++;
	$fheader = array("ID","DATE","NAME OF PATIENTS","PATIENT'S GENDER","PATIENTS","Total Patient","ID Number/Application Number",
	"Age Distribution","Category Distribution","Z(Zone)", "HZ (HORS ZONE)", "HD (HORS DISTRICT)","In Patients","Out Patients",
	"PRISONER","TRANSFER CASE","EMERGENCY CASE","TRANSFER BY AMBULANCE","TRANSFER WITHOUT AMBULANCE","ACCIDENT CASE",
	"X-Ray","CT Scan Case", "MRI Case", "Days of Hospitalization","Medecines Subjected of stock out (to be specified)", "Number of Patients who did not received all drugs prescribed",
	"Laboratory Test not provided (to be sppecified)","Number of patience who did not received all laboratory test prescribed", "X-Ray not provided to be specified","Number of Patient who received x-ray prescribed","CT Scan not provided(to be specified)","Number of patients who did not received CT Scan precribed","MRI not provided(to be specified)", "Number of patients who did not received MRI precribed");
	
	$cell_spans = array(3=>2,4=>2, 7=>3, 8=>4 );
	
	foreach($fheader as $hi=>$hv){
		//$activeSheet->getColumnDimension($first_column)->setAutoSize(true);
		$activeSheet->setCellValue(($first_column++).$row, $hv);
		if(@$cell_spans[$hi]){
			for($tk=2; $tk <= $cell_spans[$hi]; $tk++)
				$first_column++;
		}
	}
	$row++;
	$first_column = 'A';
	// $activeSheet->setCellValue($first_column ."".$row++,"");
	?>
	<?= @$_GET['filter']?"<span class=error-text>".count($patients)." Result".(count($patients)>1?"s":"")." found for ".$_GET['filter']."</span>":"" ?>
	<div style='max-height:350px; margin-top:2px; width:100%; border:0px solid #000; overflow:auto;'>
	
	<br />
	<table class=list id=vsbl border="1" style='width:100%; font-size:30px;'>
		<tr>
			<?php
			foreach($fheader as $hi=>$hv){
				?><th <?= isset($cell_spans[$hi])?"colspan='".$cell_spans[$hi]."'":"rowspan=2" ?>><?= $hv ?></th><?php
			}
			?>
		</tr>
		<tr>
			<?php $activeSheet->setCellValue($first_column++ ."".$row,""); ?>
			<?php $activeSheet->setCellValue($first_column++ ."".$row,""); ?>
			<?php $activeSheet->setCellValue($first_column++ ."".$row,""); ?>
			<th>Male</th>
			<?php $activeSheet->setCellValue($first_column++ ."".$row,"Male"); ?>
			<th>Female</th>
			<?php $activeSheet->setCellValue($first_column++ ."".$row,"Female"); ?>
			<th>New Case</th>
			<?php $activeSheet->setCellValue($first_column++ ."".$row,"New Case"); ?>
			<th>Old Case</th>
			<?php $activeSheet->setCellValue($first_column++ ."".$row,"Old Case"); ?>
			<?php $activeSheet->setCellValue($first_column++ ."".$row,""); ?>
			<?php $activeSheet->setCellValue($first_column++ ."".$row,""); ?>
			<th><5 years </th>
			<?php $activeSheet->setCellValue($first_column++ ."".$row,"<5 years"); ?>
			<th>5-19 years</th>
			<?php $activeSheet->setCellValue($first_column++ ."".$row,"5-19 years"); ?>
			<th>≥20 years</th>
			<?php $activeSheet->setCellValue($first_column++ ."".$row,"≥20 years"); ?>
			<th>Category 1</th>
			<?php $activeSheet->setCellValue($first_column++ ."".$row,"Category 1"); ?>
			<th>Category 2</th>
			<?php $activeSheet->setCellValue($first_column++ ."".$row,"Category 2"); ?>
			<th>Category 3</th>
			<?php $activeSheet->setCellValue($first_column++ ."".$row,"Category 3"); ?>
			<th>Category 4</th>
			<?php $activeSheet->setCellValue($first_column++ ."".$row,"Category 4"); ?>
		</tr>
		<tbody>
		<?php
		$row++;
		$t = array();
		$kk_ = "";
		$data = array();
		//$data[] = array("ID","Code Bebeneficiaire","Nom Beneficiaire","Chef de Famille","Consul.","Test Labo","Price","Medicines","Hosp.","Price","Act","Price","Consum","Price","General Total","TM","Payable Total");
		
		//$data[] = array("","","","","","","","Nature","QTY","UN.P","TOT.P","","","","","","","","","");
		//var_dump($data); die;
		$row_count = 0;
		$kk = "";
		$totalAll = [];

		for($i=0;$i<count($patients);$i++){
			$first_column = 'A';
			$r = $patients[$i];
			$ddd = array();
			$tot = 0;
			$tm_p = returnSingleField("SELECT TicketPaid FROM mu_tm WHERE PatientRecordID='{$patients[$i]['PatientRecordID']}'","TicketPaid",true,$con);
			$tm_i = returnSingleField("SELECT TicketID FROM mu_tm WHERE PatientRecordID='{$patients[$i]['PatientRecordID']}'","TicketID",true,$con);
			$conslt = formatResultSet($rslt=returnResultSet($sql="SELECT DISTINCT co_category.ConsultationCategoryName, co_price.Amount, co_records.ConsultationRecordID FROM co_records, co_price,co_category WHERE co_category.ConsultationCategoryID = co_price.ConsultationCategoryID && co_records.ConsultationPriceID = co_price. ConsultationPriceID && co_records.PatientRecordID='{$r['PatientRecordID']}'",$con),$multirows=true,$con);
			$ho = formatResultSet($rslt=returnResultSet($sql="SELECT DISTINCT ho_price.Amount, ho_record.Days FROM ho_record, ho_price WHERE ho_record.HoPriceID = ho_price. HOPriceID && ho_record.RecordID='{$r['PatientRecordID']}'",$con),$multirows=true,$con);
			// var_dump($ho);
			$hospitIn = count($ho) >0 ?1:"";
			$hospitOut = count($ho) >0 ?"":1;
			$hospitDay = "";
			if(count($ho) > 0){
				// var_dump(["Here"]);
				$hospitDay = $ho[0]['Days'];
				// var_dump($hospitDay);
			}
			
			$nc = $conslt[0]['Amount']==0?"":1;
			$ac = $conslt[0]['Amount']==0?1:"";
			$row_count++;
			$zones = array("Z","HZ","HD");

			$zone = ($zones[(in_array($r['CellID'], $zone_cells))?0:((in_array($r['DistrictID'], $zone_districts))?1:2)]);
			$Z = $zone == "Z"?1:"";
			$HZ = $zone == "HZ"?1:"";
			$HD = $zone == "HD"?1:"";

			$age = getAge($r['DateofBirth'],2, $r['DateIn']);
			$age5 = $age<5?1:"";
			$age519 = $age>=5 && $age <= 19?1:"";
			$age20 = $age>=20?1:"";

			$cat1 = $patients[$i]["FamilyCategory"] == 1?1:"";
			$cat2 = $patients[$i]["FamilyCategory"] == 2?1:"";
			$cat3 = $patients[$i]["FamilyCategory"] == 3?1:"";
			$cat4 = $patients[$i]["FamilyCategory"] == 4?1:"";

			$transfer = ($patients[$i]["Status"]>=2?1:"");
			$transferAmbulance = ($patients[$i]["Status"] ==3?1:"");
			$transferNoAmbulance = ($patients[$i]["Status"] ==2?1:"");

			if(!isset($totalAll[0])){
				$totalAll[0] = ($patients[$i]["Sex"] == "Male"?1:0);
			} else{
				$totalAll[0] += ($patients[$i]["Sex"] == "Male"?1:0);
			}

			if(!isset($totalAll[1])){
				$totalAll[1] = ($patients[$i]["Sex"] == "Female"?1:0);
			} else{
				$totalAll[1] += ($patients[$i]["Sex"] == "Female"?1:0);
			}

			if(!isset($totalAll[2])){
				$totalAll[2] = $nc;
			} else{
				$totalAll[2] += $nc;
			}

			if(!isset($totalAll[3])){
				$totalAll[3] = $ac;
			} else{
				$totalAll[3] += $ac;
			}

			if(!isset($totalAll[4])){
				$totalAll[4] = 1;
				$totalAll[5] = "";
			} else{
				$totalAll[4] += 1;
			}

			if(!isset($totalAll[6])){
				$totalAll[6] = $age5;
			} else{
				$totalAll[6] += $age5;
			}

			if(!isset($totalAll[7])){
				$totalAll[7] = $age519;
			} else{
				$totalAll[7] += $age519;
			}

			if(!isset($totalAll[8])){
				$totalAll[8] = $age20;
			} else{
				$totalAll[8] += $age20;
			}

			if(!isset($totalAll[9])){
				$totalAll[9] = $cat1;
			} else{
				$totalAll[9] += $cat1;
			}

			if(!isset($totalAll[10])){
				$totalAll[10] = $cat2;
			} else{
				$totalAll[10] += $cat2;
			}

			if(!isset($totalAll[11])){
				$totalAll[11] = $cat3;
			} else{
				$totalAll[11] += $cat3;
			}

			if(!isset($totalAll[12])){
				$totalAll[12] = $cat4;
			} else{
				$totalAll[12] += $cat4;
			}

			if(!isset($totalAll[13])){
				$totalAll[13] = $Z;
			} else{
				$totalAll[13] += $Z;
			}

			if(!isset($totalAll[14])){
				$totalAll[14] = $HZ;
			} else{
				$totalAll[14] += $HZ;
			}

			if(!isset($totalAll[15])){
				$totalAll[15] = $HD;
			} else{
				$totalAll[15] += $HD;
			}

			if(!isset($totalAll[16])){
				$totalAll[16] = $hospitIn;
			} else{
				$totalAll[16] += $hospitIn;
			}

			if(!isset($totalAll[17])){
				$totalAll[17] = $hospitOut;
			} else{
				$totalAll[17] += $hospitOut;
			}

			if(!isset($totalAll[18])){
				$totalAll[18] = "";
			}

			if(!isset($totalAll[19])){
				$totalAll[19] = $transfer;
			} else{
				$totalAll[19] += $transfer;
			}

			if(!isset($totalAll[20])){
				$totalAll[20] = "";
			}

			if(!isset($totalAll[21])){
				$totalAll[21] = $transferAmbulance;
			} else{
				$totalAll[21] += $transferAmbulance;
			}

			if(!isset($totalAll[22])){
				$totalAll[22] = $transferNoAmbulance;
			} else{
				$totalAll[22] += $transferNoAmbulance;
			}

			if(!isset($totalAll[23])){
				$totalAll[23] = "";
				$totalAll[24] = "";
				$totalAll[25] = "";
				$totalAll[26] = "";
			}

			if(!isset($totalAll[27])){
				$totalAll[27] = $hospitDay;
			} else{
				$totalAll[27] += $hospitDay;
			}

			if(!isset($totalAll[28])){
				$totalAll[29] = "";
				$totalAll[30] = "";
				$totalAll[31] = "";
				$totalAll[32] = "";
				$totalAll[33] = "";
				$totalAll[34] = "";
				$totalAll[35] = "";
				$totalAll[36] = "";
				$totalAll[37] = "";
				$totalAll[38] = "";
			}

			$kk_ .=  "<tr onclick='$(\".styling\").html(\"<style>#id{$i}{background-color:#e5e5e3;}</style>\");' id='id{$i}'>";
				$kk_ .=  "<td>".($i+1)."</td>";
				$activeSheet->setCellValue(($first_column++).$row, $i+1);
				$kk_ .=  "<td>".($r['DateIn'])."</td>";
				$activeSheet->setCellValue(($first_column++).$row, $patients[$i]["DateIn"]);
				$kk_ .=  "<td>{$patients[$i]["Name"]}</td>";
				$activeSheet->setCellValue(($first_column++).$row, $patients[$i]["Name"]);
				$kk_ .=  "<td>".($patients[$i]["Sex"] == "Male"?1:"")."</td>";
				$activeSheet->setCellValue(($first_column++).$row, ($patients[$i]["Sex"] == "Male"?1:""));
				$kk_ .=  "<td>".($patients[$i]["Sex"] == "Female"?1:"")."</td>";
				$activeSheet->setCellValue(($first_column++).$row, ($patients[$i]["Sex"] == "Female"?1:""));
				$kk_ .=  "<td>{$nc}</td>";
				$activeSheet->setCellValue(($first_column++).$row, $nc);
				$kk_ .=  "<td>{$ac}</td>";
				$activeSheet->setCellValue(($first_column++).$row, $ac);
				$kk_ .=  "<td>1</td>";
				$activeSheet->setCellValue(($first_column++).$row, 1);
				$kk_ .=  "<td>".($r['NationalID'])."</td>";
				$activeSheet->setCellValue(($first_column++).$row, ($r['NationalID'])." ");
				$kk_ .=  "<td>".$age5."</td>";
				$activeSheet->setCellValue(($first_column++).$row, $age5);
				$kk_ .=  "<td>".$age519."</td>";
				$activeSheet->setCellValue(($first_column++).$row, $age519);
				$kk_ .=  "<td>".$age20."</td>";
				$activeSheet->setCellValue(($first_column++).$row, $age20);
				$kk_ .=  "<td>{$cat1}</td>";
				$activeSheet->setCellValue(($first_column++).$row, $cat1);
				$kk_ .=  "<td>{$cat2}</td>";
				$activeSheet->setCellValue(($first_column++).$row, $cat2);
				$kk_ .=  "<td>{$cat3}</td>";
				$activeSheet->setCellValue(($first_column++).$row, $cat3);
				$kk_ .=  "<td>{$cat4}</td>";
				$activeSheet->setCellValue(($first_column++).$row, $cat4);
				$kk_ .=  "<td>".$Z."</td>";
				$activeSheet->setCellValue(($first_column++).$row, $Z);
				$kk_ .=  "<td>".$HZ."</td>";
				$activeSheet->setCellValue(($first_column++).$row, $HZ);
				$kk_ .=  "<td>".$HD."</td>";
				$activeSheet->setCellValue(($first_column++).$row, $HD);
				$kk_ .=  "<td>{$hospitIn}</td>";
				$activeSheet->setCellValue(($first_column++).$row, $hospitIn);
				$kk_ .=  "<td>{$hospitOut}</td>";
				$activeSheet->setCellValue(($first_column++).$row, $hospitOut);
				$kk_ .=  "<td></td>";
				$activeSheet->setCellValue(($first_column++).$row, "");
				$kk_ .=  "<td>".$transfer."</td>";
				$activeSheet->setCellValue(($first_column++).$row, $transfer);
				$kk_ .=  "<td></td>";
				$activeSheet->setCellValue(($first_column++).$row, "");
				$kk_ .=  "<td>".$transferAmbulance."</td>";
				$activeSheet->setCellValue(($first_column++).$row, $transferAmbulance);
				$kk_ .=  "<td>".$transferNoAmbulance."</td>";
				$activeSheet->setCellValue(($first_column++).$row, $transferNoAmbulance);
				$kk_ .=  "<td></td>";
				$activeSheet->setCellValue(($first_column++).$row, "");
				$kk_ .=  "<td></td>";
				$activeSheet->setCellValue(($first_column++).$row, "");
				$kk_ .=  "<td></td>";
				$activeSheet->setCellValue(($first_column++).$row, "");
				$kk_ .=  "<td></td>";
				$activeSheet->setCellValue(($first_column++).$row, "");
				$kk_ .=  "<td>".$hospitDay."</td>";
				$activeSheet->setCellValue(($first_column++).$row, $hospitDay);
				$kk_ .=  "<td></td>";
				$activeSheet->setCellValue(($first_column++).$row, "");
				$kk_ .=  "<td></td>";
				$activeSheet->setCellValue(($first_column++).$row, "");
				$kk_ .=  "<td></td>";
				$activeSheet->setCellValue(($first_column++).$row, "");
				$kk_ .=  "<td></td>";
				$activeSheet->setCellValue(($first_column++).$row, "");
				$kk_ .=  "<td></td>";
				$activeSheet->setCellValue(($first_column++).$row, "");
				$kk_ .=  "<td></td>";
				$activeSheet->setCellValue(($first_column++).$row, "");
				$kk_ .=  "<td></td>";
				$activeSheet->setCellValue(($first_column++).$row, "");
				$kk_ .=  "<td></td>";
				$activeSheet->setCellValue(($first_column++).$row, "");
				$kk_ .=  "<td></td>";
				$activeSheet->setCellValue(($first_column++).$row, "");
				$kk_ .=  "<td></td>";
				$activeSheet->setCellValue(($first_column++).$row, "");
				
			
			
			$kk_ .= "</tr>";
			
			$row++;
			//$data[] = $ddd;
		}
		$first_column = 'A';
		$kk_ .= "<tr>";
			$kk_ .= "<td colspan='3'>Total</td>";
				$activeSheet->setCellValue(($first_column++).$row, "Total");
				$activeSheet->setCellValue(($first_column++).$row, "");
				$activeSheet->setCellValue(($first_column++).$row, "");
			foreach($totalAll AS $t){
				$kk_ .= '<td>'.$t."</td>";
				$activeSheet->setCellValue(($first_column++).$row, $t);
			}
		$kk_ .= "</tr>";
		echo $kk_;
		//var_dump($data);
		$styleArray = array(
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN,
					'color' => array('argb' => 'FF000000'),
				),
			),
		);
		$activeSheet->getStyle("A5:AO".($row))->applyFromArray($styleArray);
		$activeSheet->setTitle("Prestation");
		//unset($objWriter);
		// Create a new worksheet, after the default sheet
		//$objPHPExcel->createSheet();
		//save the file
		$objWriter->save($file_name);
		?>
		</tbody>
	</table>
	</div>
	</b>
	<?php
	if(file_exists($file_name)){
		?>
		<style>
			.img_links{
				height:40px; 
				width:40px; 
				cursor:pointer;
			}
			.img_links:hover{
				/* height:37px;  */
				border-bottom:3px solid red;
			}
		</style>
		<a title = 'Download the Prestation document in Excel' href='./<?= $file_name ?>' onclick=''  target="_blank"><img title="View in EXCEL" src="../images/excel.png" class=img_links width=40px /></a>
		<?php
	}
	
} else{
	echo "<span class=error-text>No Patient in the selected range {$_GET['start_date']} - {$_GET['end_date']} at selected station {$post}</span>";
}
}
?>
<script>
	$(document).ready(function() { 
		$('#excel_file').live('change', function(){ 
			
			$("#upload_out").html('');
			$("#upload_out").html('<img src="../images/loading.gif" alt="Uploadding"/>'); 
			$("#upload_patient").ajaxForm({ 
				target: '#upload_out'
			}).submit(); 
		}); 
	});
</script>
<div id=upload_out></div>