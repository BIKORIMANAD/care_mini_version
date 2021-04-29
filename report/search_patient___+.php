<?php
session_start();
//var_dump($_SESSION);
set_time_limit(0);
require_once "../lib/db_function.php";
if("rcp" !== returnSingleField($sql="SELECT PostCode from sy_post WHERE PostID='{$_SESSION['user']['PostID']}'",$field="PostCode",$data=true, $con)){
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
//echo $sys;
if(strlen($_GET['key'])){
	//select all possible information on the comming id
	$patients = formatResultSet(
					$rslt=returnResultSet(
						$sql="SELECT DISTINCT 
								se_name.ServiceCode, 
								pa_records.PatientRecordID, 
								pa_records.FamilyCategory, 
								pa_records.DateIn, 
								pa_records.InsuranceCardID, 
								pa_info.*, ad_village.*, 
								ad_cell.*, ad_sector.*, 
								ad_district.* 
							  FROM 
								pa_records, 
								se_records, 
								se_name, 
								pa_info, 
								ad_village, 
								ad_cell, 
								ad_sector, 
								ad_district, 
								sy_users, 
								sy_center, 
								co_records 
							  WHERE 
								pa_records.PatientRecordID = se_records.PatientRecordID && 
								se_records.ServiceNameID = se_name.ServiceNameID && 
								(co_records.PatientRecordID = pa_records.PatientRecordID || se_name.ServiceCode = 'PST') && 
								pa_info.PatientID = pa_records.PatientID && 
								pa_info.VillageID=ad_village.ViillageID && 
								ad_village.CellID=ad_cell.CellID && 
								ad_cell.SectorID=ad_sector.SectorID && 
								ad_sector.DistrictID=ad_district.DistrictID && 
								pa_records.ReceptionistID = sy_users.UserID && 
								sy_users.CenterID = sy_center.CenterID && {$sys}  && 
								InsuranceNameID='{$_GET['key']}' && 
								DateIn LIKE('{$_GET['year']}-{$_GET['month']}%') 
							   ORDER BY 
								pa_records.DateIn ASC, 
								pa_records.PatientRecordID ASC",$con),$multirows=true,$con); // && pa_records.Status != 0 

//echo $sql;
if($patients){
	
	?>
	<b class=visibl>
	<style>
		table#vsbl td, table#vsbl th{font-size:11px; font-family:arial; font-weight:bold; border:1px solid #000;}
	</style>
	<span class=styling></span>
	<div style='max-height:90%; padding-top:5px; border:0px solid #000; overflow:auto;'>
	<table class=list id=vsbl border="1" style='width:100%; font-size:30px;'>
		<tr><th>ID</th><th>Date</th><th>Service</th><th>Cat.</th><th>Insurance</th><th>Age</th><th>Sex</th><th>Name</th><th>House Holder</th><th>Family Code</th><th>Cons Cost</th><th>Lab</th><th>Imaging</th><th>Hosp.</th><th>Proc & Mat.</th><th>Consum.</th><th>Drugs.</th><th>Total</th><th>Dett. Fees</th><th>Total to be Paid</th></tr>
		<?php
		$t = array();
		$start_date_ = "2016-11-21"; $reference_date_cat_1_no_tm = "2017-10-14";
		$data = array();
		$data[] = array("Nr","Date","Service","Cat.","Insurance","Age","Sex","Name","House Holder","Family Code","Cons Cost","Lab","Imaging","Hosp","Procedures","Consumables","Drugs","Total","Detterent","Total to be paid");
		for($i=0;$i<count($patients);$i++){
			$r = $patients[$i];
			$ddd = array();
			$remove_tm = ($r['DateIn'] >= $reference_date_cat_1_no_tm)?false:true;
			$check_tm_data = false; $check_tm_data_cat_1 = false;
			if($r['DateIn'] >= $reference_date_cat_1_no_tm && $r['FamilyCategory'] == 1){
				$check_tm_data_cat_1 = true;
			}else{
				$remove_tm =false;
			}
			echo "<tr onclick='$(\".styling\").html(\"<style>#id{$i}{background-color:#e5e5e3;}</style>\");' id='id{$i}'>
				<td>".($i+1)."</td>
				<td>{$r["DateIn"]}</td>
				<td>{$r["ServiceCode"]}</td>
				<td>{$r['FamilyCategory']}</td>
				<td>{$r["InsuranceCardID"]}</td>
				<td>".($patients[$i]["DateofBirth"] == "0000-00-00"?"":$patients[$i]["DateofBirth"])."</td>
				<td>{$patients[$i]["Sex"]}</td>
				<td>{$patients[$i]["Name"]}</td>
				<td>{$patients[$i]["FamilyCode"]}</td>
				<td>".(@explode('/',$r['InsuranceCardID'])[2])."</td>";
				$ddd[] = ($i+1);
				$ddd[] = $r["DateIn"];
				$ddd[] = $r["ServiceCode"];
				$ddd[] = $r['FamilyCategory'];
				$ddd[] = $r["InsuranceCardID"];
				$ddd[] = $r["DateofBirth"];
				$ddd[] = $r["Sex"];
				$ddd[] = $r["Name"];
				$ddd[] = $r["FamilyCode"];
				$ddd[] = (@explode('/',$r['InsuranceCardID'])[2])." ";
				
				//select the laboratory fees related to this request now
				$conslt = formatResultSet($rslt=returnResultSet($sql="SELECT DISTINCT co_price.Amount, co_records.ConsultationRecordID FROM co_records, co_price WHERE co_records.ConsultationPriceID = co_price. ConsultationPriceID && co_records.PatientRecordID='{$r['PatientRecordID']}'",$con),$multirows=true,$con);
				$cons = 0; $lab = 0; $md = 0; $tot = 0; $t_counter = 0;
				if($conslt){
					foreach($conslt as $c){
						$cons += $c['Amount'];
						//select all exam related to this consultion record now
						$lab_exams = formatResultSet($rslt=returnResultSet($sql="SELECT DISTINCT la_price.Amount, la_records.ExamRecordID, la_exam.ExamName FROM la_records, la_price, la_exam WHERE la_exam.ExamID = la_price.ExamID && la_records.ExamPriceID = la_price. ExamPriceID && la_records.ConsultationRecordID='{$c['ConsultationRecordID']}'",$con),$multirows=true,$con);
						if($lab_exams){
							foreach($lab_exams as $l){
								$lab += $l['Amount'];
								if($check_tm_data && !$check_tm_data_cat_1){
									if($l['ExamName'] != 'GE'){
										$remove_tm = false;
										$check_tm_data = false;
									}
								}
							}
						}
						if( !$check_tm_data_cat_1){
							$sql_anti_malaria = "SELECT DISTINCT md_price.Amount, md_records.Quantity, md_name.MedecineName FROM md_records, md_price, md_name WHERE md_name.MedecineNameID = md_price.MedecineNameID && md_records.MedecinePriceID = md_price. MedecinePriceID && (md_name.MedecineName LIKE('coartem%') || md_name.MedecineName LIKE('paracet%') ) && md_records.ConsultationRecordID='{$c['ConsultationRecordID']}'";
							/* send this command to check if the patient has an anti-malaria consumetion and preapare to remove the TM and Anti-malaria price now */
							$check_anti_malaria = formatResultSet($rslt=returnResultSet($sql_anti_malaria,$con),$multirows=true,$con);
							if(count($check_anti_malaria) <= 0 || count($check_anti_malaria) != 2){
								$check_tm_data = false;
								$remove_tm = false;
							}
						}
						/*************** End of part to verify the   */
						//select all drugs related to this consultion record now
						$sql="SELECT DISTINCT md_price.Amount, md_records.Quantity, md_name.MedecineName FROM md_records, md_price, md_name WHERE md_name.MedecineNameID = md_price.MedecineNameID && md_records.MedecinePriceID = md_price. MedecinePriceID && md_records.ConsultationRecordID='{$c['ConsultationRecordID']}'";
						$medecines = formatResultSet($rslt=returnResultSet($sql,$con),$multirows=true,$con);
						if($medecines){
							$remove_amount = 1;
							if($check_tm_data  && !$check_tm_data_cat_1){
								foreach($medecines as $c){
									if( !preg_match('/coartem/',strtolower($c['MedecineName']))){
										if(!preg_match('/paracet/',strtolower($c['MedecineName'])) ){
											$remove_amount = 0;
										}
									}
								}
							}
							
							foreach($medecines as $l){
								if($check_tm_data  && !$check_tm_data_cat_1){
									if(preg_match('/coartem/',strtolower($l['MedecineName']))){
										$l['Amount'] = $remove_amount?0:$l['Amount'];
									} else{
									$remove_tm = false;
									}
								}
								$md += ($l['Amount'] * $l['Quantity']);
								
							}
						}
						
					}
				}
				echo "<td>{$cons}</td>";
				$ddd[] = $cons;
				$tot += $cons;
				if(!@$t[$t_counter])
					$t[$t_counter] = $cons;
				else
					$t[$t_counter] += $cons;
				$t_counter++;
				echo "<td>{$lab}</td>";
				$ddd[] = $lab;
				$tot += $lab;
				if(!@$t[$t_counter])
					$t[$t_counter] = $lab;
				else
					$t[$t_counter] += $lab;
				$t_counter++;
				echo "<td>&nbsp;</td>";
				$ddd[] = "";
				if(!@$t[$t_counter])
					$t[$t_counter] = 0;
				else
					$t[$t_counter] += 0;
				$t_counter++;
				$ho = formatResultSet($rslt=returnResultSet($sql="SELECT DISTINCT ho_price.Amount, ho_record.Days FROM ho_record, ho_price WHERE ho_record.HoPriceID = ho_price. HOPriceID && ho_record.RecordID='{$r['PatientRecordID']}'",$con),$multirows=true,$con);
				$hosp = 0;
				if($ho){
					foreach($ho as $c){
						$hosp += ($c['Amount'] * $c['Days']);
						
					}
				}
				echo "<td>{$hosp}</td>";
				$ddd[] = $hosp;
				$tot += $hosp;
				if(!@$t[$t_counter])
					$t[$t_counter] = $hosp;
				else
					$t[$t_counter] += $hosp;
				$t_counter++;
				//now select acts and print the price in the table
				$act = formatResultSet($rslt=returnResultSet($sql="SELECT DISTINCT ac_price.Amount, ac_records.ActRecordID, ac_records.Quantity FROM ac_records, ac_price WHERE ac_records.ActPriceID = ac_price. ActPriceID && ac_records.PatientRecordID='{$r['PatientRecordID']}'",$con),$multirows=true,$con);
				$acts = 0;
				if($act){
					foreach($act as $c){
						$acts += ($c['Amount'] * $c['Quantity']);
						if($check_tm_data  && !$check_tm_data_cat_1){
							$remove_tm = false;
						}
					}
				}
				echo "<td>{$acts}</td>";
				$ddd[] = $acts;
				$tot += $acts;
				if(!@$t[$t_counter])
					$t[$t_counter] = $acts;
				else
					$t[$t_counter] += $acts;
				$t_counter++;
				//now select consumables and print the price in the table
				$consum = formatResultSet($rslt=returnResultSet($sql="SELECT DISTINCT cn_price.Amount, cn_records.Quantity, cn_name.MedecineName FROM cn_records, cn_price, cn_name WHERE cn_name.MedecineNameID = cn_price.MedecineNameID && cn_records.MedecinePriceID = cn_price. MedecinePriceID && cn_records.PatientRecordID='{$r['PatientRecordID']}'",$con),$multirows=true,$con);
				$consumables = 0;
				if($consum){
					foreach($consum as $c){
						$consumables += ($c['Amount'] * $c['Quantity']);
						if($check_tm_data && !$check_tm_data_cat_1){
							if(strtolower($c['MedecineName']) != 'sachets'){
								$remove_tm = false;
							}
						}
					}
				}
				//if the found consumable is zero dig more on previous tables
				if($consumables == 0 && $r["DateIn"] >= $release_date){
					//var_dump($consumables);
					//$consum = formatResultSet($rslt=returnResultSet($sql="SELECT DISTINCT cn_price.Amount, cn_records.Quantity FROM cn_records, cn_price WHERE cn_records.MedecinePriceID = cn_price. MedecinePriceID && cn_records.PatientRecordID='{$r['PatientRecordID']}'",$con),$multirows=true,$con);
					$consum = formatResultSet($rslt=returnResultSet($sql="SELECT DISTINCT md_price.Amount, cn_records.Quantity, cn_records.ConsumableRecordID, cn_records.Date, md_name.MedecineName FROM cn_records, md_price, md_name WHERE cn_records.MedecinePriceID = md_price. MedecinePriceID && md_price.MedecineNameID = md_name.MedecineNameID && cn_records.PatientRecordID='{$r['PatientRecordID']}'",$con),$multirows=true,$con);
					
					//var_dump($consum);
					$consumables = 0;
					if($consum){
						foreach($consum as $c){
							$consumables += ($c['Amount'] * $c['Quantity']);
							//now try to change the price id for best in consumable table
							//now get the real consumable name from the new table
							$consumable_id = returnSingleField("SELECT MedecineNameID FROM cn_name WHERE MedecineName='{$c['MedecineName']}'","MedecineNameID",true,$con);
							//search the correct pricing according to the registration date
							$consumable_price_id = returnSingleField("SELECT MedecinePriceID FROM cn_price WHERE MedecineNameID='{$consumable_id}' && Date <= '{$c['Date']}' ORDER BY Date DESC LIMIT 0, 1","MedecinePriceID",true,$con);
							if($consumable_price_id)
								saveData("UPDATE cn_records SET MedecinePriceID='{$consumable_price_id}' WHERE ConsumableRecordID='{$c['ConsumableRecordID']}'",$con);
						}
					}
					
					//Re-select new Data for error recovery
					$consum = formatResultSet($rslt=returnResultSet($sql="SELECT DISTINCT cn_price.Amount, cn_records.Quantity, cn_name.MedecineName FROM cn_records, cn_price, cn_name WHERE cn_name.MedecineNameID = cn_price.MedecineNameID && cn_records.MedecinePriceID = cn_price. MedecinePriceID && cn_records.PatientRecordID='{$r['PatientRecordID']}'",$con),$multirows=true,$con);
					$consumables = 0;
					if($consum){
						foreach($consum as $c){
							$consumables += ($c['Amount'] * $c['Quantity']);
							if($check_tm_data && !$check_tm_data_cat_1){
								if(strtolower($c['MedecineName']) != 'sachets'){
									$remove_tm = false;
								}
							}
						}
					}
				}
				echo "<td>{$consumables}</td>";
				$ddd[] = $consumables;
				$tot += $consumables;
				if(!@$t[$t_counter])
					$t[$t_counter] = $consumables;
				else
					$t[$t_counter] += $consumables;
				$t_counter++;
				echo "<td>{$md}</td>";
				$ddd[] = $md;
				$tot += $md;
				if(!@$t[$t_counter])
					$t[$t_counter] = $md;
				else
					$t[$t_counter] += $md;
				$t_counter++;
				echo "<td>{$tot}</td>";
				$ddd[] = $tot;
				if(!@$t[$t_counter])
					$t[$t_counter] = $tot;
				else
					$t[$t_counter] += $tot;
				$t_counter++;
				//var_dump($check_tm_data_cat_1);
				$tm = formatResultSet($rslt=returnResultSet($sql="SELECT DISTINCT mu_tm.TicketPaid, mu_tm.Type FROM mu_tm WHERE mu_tm.PatientRecordID='{$r['PatientRecordID']}'",$con),$multirows=false,$con);
				/* Check if the type tm operation was PANSEMENT and remove additional change made to it */
				if($check_tm_data_cat_1){
					saveData($sql = "UPDATE mu_tm SET TicketPaid=0 WHERE PatientRecordID='{$r['PatientRecordID']}'", $con);
				} else if($tm['Type'] == "PANSEMENT" || ($remove_tm && $tm['TicketPaid'] != 0) ){
					//echo "Now Remove TM"
					saveData("UPDATE mu_tm SET TicketPaid=0 WHERE mu_tm.PatientRecordID='{$r['PatientRecordID']}' && Type != 'INDIGENT'", $con);
				} else if(!$remove_tm && $tm['TicketPaid'] == 0 && $r['ServiceCode'] != 'PST'){
					//echo "Now Remove TM second Operation";
					saveData("UPDATE mu_tm SET TicketPaid=200 WHERE mu_tm.PatientRecordID='{$r['PatientRecordID']}' && Type != 'INDIGENT'", $con);
				} else if ($check_tm_data == false && $tm['TicketPaid'] == 0 && $r['ServiceCode'] != 'PST'){
					saveData($sql = "UPDATE mu_tm SET TicketPaid=200 WHERE PatientRecordID='{$r['PatientRecordID']}' && Type != 'INDIGENT'", $con);
				}
				$tm = formatResultSet($rslt=returnResultSet($sql="SELECT DISTINCT mu_tm.TicketPaid FROM mu_tm WHERE mu_tm.PatientRecordID='{$r['PatientRecordID']}'",$con),$multirows=false,$con);
				
				echo "<td>{$tm['TicketPaid']}</td>";
				$ddd[] = $tm['TicketPaid'];
				if(!@$t[$t_counter])
					$t[$t_counter] = $tm['TicketPaid'];
				else
					$t[$t_counter] += $tm['TicketPaid'];
				$t_counter++;
				$tp_tot = $tot - $tm['TicketPaid'];
				echo "<td>".round($tp_tot,0)."</td>";
				$ddd[] = $tp_tot;
				if(!@$t[$t_counter])
					$t[$t_counter] = $tp_tot;
				else
					$t[$t_counter] += $tp_tot;
				$t_counter++;
			echo "</tr>";
			$data[] = $ddd;
		}
		?>
		<tr><th colspan=10>Total</th>
		<?php 
		$ddd = array();
		$ddd[] = "";
		$ddd[] = "";
		$ddd[] = "";
		$ddd[] = "";
		$ddd[] = "";
		$ddd[] = "";
		$ddd[] = "";
		$ddd[] = "SUB TOTAL";
		$ddd[] = "";
		$ddd[] = "";
		foreach($t as $tt){
			echo "<th>".round($tt,1)."</th>";
			$ddd[] = $tt;
		}
		$data[] = $ddd;
			?>
		</tr>
	</table>
	</div></b>
	<?php
	if(count($data)>0){
		$_SESSION['report'] = $data;
		$_SESSION['header'] = array(
									array("PROVINCE / MVK"=>"SUD"),
									array("ADMINISTRATIVE DISTRICT"=>"RUHANGO", "Period"=>$_GET['month']."/".$_GET['year']),
									array("ADMINISTRATIVE SECTION"=>"RUHANGO"),
									array("HEALTH FACILITY"=>"KIZIBERE HEALTH CENTER"),
									array("CODE / HEALTH FACILITY"=>"40211013"),
								);
		$_SESSION['report_title'] = array("title"=>"S U M M A R Y  OF V O U C H E R S  F O R  R W A N D A S O C I A L S E C U R I T Y B O A D (R S S B) / CBHI");
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
		<a href='./print_report.php?format=pdf' target="_blank"><img title='View in PDF' src="../images/b_pdfdoc.png" class=img_links width=30px /></a>
		<a href='./print_report.php?format=excel&in=cbhi' target="_blank"><img title="View in EXCEL" src="../images/excel.png" class=img_links width=40px /></a>
		<?php
	}
	//echo "<pre>";var_dump($data);
/* } else{
	
	echo "<span class=error-text>No Match Found</span>";
}
 */
} else{
	echo "<span class=error-text>No Patient in the selected month {$_GET['month']}/{$_GET['year']} at selected station {$post}</span>";
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
<div id=upload_out></div><!--
<form action="upload_patient.php" id=upload_patient enctype='multipart/form-data' method=post>
	<input type=hidden value='<?= $_GET['key'] ?>' name=insurance_id />
	<input type=file name=patient_list class=txtfield1 id=excel_file style='width:300px;' />
</form>-->