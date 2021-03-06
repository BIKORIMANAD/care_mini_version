<?php
session_start(); 
//var_dump($_SESSION); die;

require_once "../lib/db_function.php";
if("rcp" !== returnSingleField($sql="SELECT PostCode from sy_post WHERE PostID='{$_SESSION['user']['PostID']}'",$field="PostCode",$data=true, $con)){
	echo "<script>window.location='../logout.php';</script>";
	return;
}
//var_dump($_POST);die;
$error = "";
if(@$_POST['rcv_patient_btn']){
	//check if the date in is valid
	$_GET['key'] = $_POST['patient_id'];
	$_POST['age'] = preg_match("/^[0-9]{4}$/",$_POST['age'])?$_POST['age']."-01-01":$_POST['age'];
	//var_dump($_POST); die;
	$_POST['age'] = !$_POST['age']?"0000-00-00":$_POST['age'];
	if(preg_match("/^[0-9]{2}$/",$_POST['age'])){
		$_POST['age'] = date("Y",time()) - $_POST['age']."-01-01";
	}
	if(date("Y-m-d",time()) < $_POST['age']){
		$error = "<span class=error-text>Invalid Date</span>";
		
	}  else if(!isDataExist($sql="SELECT in_name.* FROM in_name,in_category,in_price,in_forms WHERE in_name.CategoryID= in_category.InsuranceCategoryID && in_forms.InsuranceNameID = in_name.InsuranceNameID && in_price.InsuranceNameID = in_name.InsuranceNameID && in_name.InsuranceNameID='{$_POST['insurance']}'", $con)){
		$error = "<span class=error-text>Unsupported Insurance </span>";
	} else{
		//var_dump($docid); die;
		//save the district
		$district_id = returnSingleField($sql="SELECT * FROM ad_district WHERE DistrictName='".ucfirst($_POST['district'])."'",$field="DistrictID",$data=true, $con);
		if(!$district_id)
			$district_id = saveAndReturnID("INSERT INTO ad_district SET DistrictName='".ucfirst($_POST['district'])."'", $con);
			
		$sector_id = returnSingleField($sql="SELECT * FROM ad_sector WHERE SectorName='".ucfirst($_POST['sector'])."' && DistrictID='{$district_id}'",$field="SectorID",$data=true, $con);
		if(!$sector_id)
			$sector_id = saveAndReturnID("INSERT INTO ad_sector SET SectorName='".ucfirst($_POST['sector'])."', DistrictID='{$district_id}'", $con);
			
		$cell_id = returnSingleField($sql="SELECT * FROM ad_cell WHERE CellName='".ucfirst($_POST['cell'])."' && SectorID='{$sector_id}'",$field="CellID",$data=true, $con);
		if(!$cell_id)
			$cell_id = saveAndReturnID("INSERT INTO ad_cell SET CellName='".ucfirst($_POST['cell'])."', SectorID='{$sector_id}'", $con);
			
		$village_id = returnSingleField($sql="SELECT * FROM ad_village WHERE VillageName='".ucfirst($_POST['village'])."' && CellID='{$cell_id}'",$field="ViillageID",$data=true, $con);
		if(!$village_id)
			$village_id = saveAndReturnID("INSERT INTO ad_village SET VillageName='".ucfirst($_POST['village'])."', CellID='{$cell_id}'", $con);
			//return;
		//var_dump($village_id); die;
		//echo $_POST['insurance'];
		$ins = returnSingleField($sql="SELECT * FROM in_name WHERE InsuranceNameID='{$_POST['insurance']}'",$field="InsuranceName",$data=true, $con);
		//save patient information
		$card_id = 0;
		//echo $ins; die;
		/* check if the category is there for CBHI */
		if($ins == "CBHI" && !$_POST['fcategory']){
			echo "<span class=error-text>Enter Family Category</span>";
			return;
		}
		//var_dump($_POST['tm']); die;
		if(is_null(@$_POST['tm'])){
			echo "<span class=error-text>TM is Paid or Not</span>";
			return;
		} else if($_POST['tm'] == 200 && !trim($_POST['receipt_number'])){
			echo "<span class=error-text>Enter Receipt Number Please!</span>";
			return;
		}
		//var_dump($_POST); die;
		if(!@$_POST['sex']){
			echo "<span class=error-text>Select Patient Gender</span>";
			return;
		}
		//var_dump($_POST); die;
		if(!@$_POST['service']){
			echo "<span class=error-text>Select Service</span>";
			return;
		}
		
		$save_in_insurance = false;
		if(($ins != "CBHI")&& $ins != "Private" && !$_POST['card_id']){
			echo "<span class=error-text>Enter Insurance Card ID</span>";
			return;
		}elseif(($ins == "CBHI") && (strlen($_POST['card_id']) != 16) && (strlen($_POST['card_id']) != 8) && (strlen($_POST['card_id']) != 0)){
			$a = strlen($_POST['card_id']);
			echo "<span class=error-text>Enter 16 digits instead of </span>";
			echo "<span class=error-text>".$a." for beneficiary </span>";
			return;
		}elseif(($ins == "CBHI") && (strlen($_POST['card_id1']) != 16) && (strlen($_POST['card_id1']) != 8)){
			$a = strlen($_POST['card_id1']);
			echo "<span class=error-text>Enter 16 digits instead of </span>";
			echo "<span class=error-text>".$a." for HouseHolder </span>";
			return;
		}

		// elseif(preg_match("/^[A-Z][a-zA-Z -] + $/", $_POST['name'])===0){
		// 	echo "<span class=error-text>".$_POST['name']." is not a name</span>";
		// }
		elseif( !$card_id = returnSingleField($sql="SELECT * FROM pa_insurance_cards WHERE InsuranceNameID='{$_POST['insurance']}' && InsuranceCardsID='{$_POST['card_id']}' && Status=1",$field="PatientInsuranceCardsID",$data=true, $con)){
			/* to be incommented when the list of all possible patient is loaded otherwise this lock new patient to be recorded in the system */
			/* 
			echo "<span class=error-text>Invalid Insurance Card Found</span>";
			return; */
			//return;
			//try to save this card info if dos not exist before
			$save_in_insurance = true;
		}
		//die;
		//var_dump($_POST); die;
		if(!$_POST['name']){
			echo "<span class=error-text>Enter beneficiary Name</span>";
			return;
		}
		if(!$_POST['father']){
			echo "<span class=error-text>Enter Householder Name</span>";
			return;
		}
		//validate the RSSB RAMA INFORMATION NOW
		if($ins == "RSSB RAMA"){
			//echo "RAMA IS FOUND"; die;
			if(!trim($_POST['father'])){
				echo "<span class=error-text>Enter Affiliate Name</span>";
				return;
			}
			if(!trim($_POST['fcategory'])){
				echo "<span class=error-text>Enter Affectation</span>";
				return;
			}
			if(!trim($_POST['location'])){
				echo "<span class=error-text>Enter Where Affiliate is Affected</span>";
				return;
			}
			//var_dump($_POST);
		} else if($ins == "MMI"){
			//the MMI information is now available
			/* var_dump($ins);
			die; */
		}
		$patient_id = returnSingleField($sql="SELECT * FROM pa_info WHERE PatientID='{$_POST['patient_id']}'",$field="PatientID",$data=true, $con);
		
		if(!$patient_id){
			//return;
			$_POST['name'] = mysql_real_escape_string(trim($_POST['name']));
			$_POST['father'] = mysql_real_escape_string(trim($_POST['father']));
			$father = "";
			if($ins == "MMI"){
				$father = $_POST['father'];
				$_POST['father'] = $_POST['fcategory'];
			}
			//var_dump($_POST);
			if(!$_POST['age']){
				$_POST['age'] = "0000-00-00";
			} 
			if(!preg_match("/^[0-9]{4}/",$_POST['age'])){
				echo "<span class=error-text>Invalid Birth date format{$_POST['age']}</span>";
				return;
			} else{
				//check if the patient exist and return his information to the receptionis
				$sql = "SELECT PatientID FROM pa_info WHERE Name='{$_POST['name']}' && FamilyCode='{$_POST['father']}' && 
						DateofBirth='{$_POST['age']}' && VillageID='{$village_id}'";
				if(!$patient_id = returnSingleField($sql,$field="PatientID",$data=true, $con)){
					$sql = "INSERT INTO pa_info SET Name='{$_POST['name']}', FamilyCode='{$_POST['father']}', VillageID='{$village_id}', 
							DateofBirth='{$_POST['age']}', Sex='{$_POST['sex']}'";
					//echo $sql; die;
					if(!$patient_id = saveAndReturnID($sql, $con)){
						$error = "<span class=error-text><br />Unable to save Patient {$sql}</span>";
						
					}
				}
				//die;
				if($ins == "MMI"){
					//var_dump($_POST);// die;
					if(!$_POST['location']){
						$_POST['location'] = "0000-00-00";
					}
					if(!@$_POST['affsex']){
						$_POST['affsex'] = "";
					}
					if(!preg_match("/^[0-9]{4}/",$_POST['location'])){
						echo "<span class=error-text>Invalid Age Format {$_POST['location']} For Affiliate</span>";
						return;
					}
					//check if all information are about the affiliate are in the system otherwise save them
					$sql_aff = "SELECT PatientID FROM pa_info WHERE Name='{$father}' && FamilyCode='{$_POST['father']}' && 
							DateofBirth='{$_POST['location']}' && VillageID='{$village_id}' && AffiliateName='@1'";
					//echo $sql_aff;// die;
					//echo "HEY!";
					if(!returnSingleField($sql_aff,$field="PatientID",$data=true, $con)){
						$sql_ = "INSERT INTO pa_info SET Name='{$father}', FamilyCode='{$_POST['father']}', VillageID='{$village_id}', 
								DateofBirth='{$_POST['location']}', Sex='{$_POST['affsex']}', AffiliateName='@1'";
						//echo $sql_;
						saveAndReturnID($sql_, $con);
					}
					//die;
				}
					
			}
		}
		if($save_in_insurance){
			saveData("INSERT INTO pa_insurance_cards SET PatientID='{$patient_id}', InsuranceNameID='{$_POST['insurance']}', InsuranceCardsID='{$_POST['card_id']}', Status=1".($ins == "RSSB RAMA"?" ,AffiliateNumber='{$_POST['fcategory']}', AffiliateName='{$_POST['father']}', Affectation='{$_POST['location']}'":"").($ins == "MMI"?", AffiliateName='{$_POST['father']}'":""),$con);
		}
		//var_dump($_POST); die;
		if(@$_POST['update'] && $_POST['patient_id']){
				saveData($sql="UPDATE pa_info SET Name='{$_POST['name']}', 
							DateofBirth='{$_POST['age']}', FamilyCode='{$_POST['father']}', Sex='{$_POST['sex']}', VillageID='{$village_id}' WHERE PatientID='{$patient_id}'", $con);
			//check if is the RSSB RAMA INSURANCE AND UPDATE SOME FILES
			
							
		}
		if($ins == 'RSSB RAMA'){
			//check if the relation field Exist
			require_once"../lib/config.php";
			$db = new DBConnector();
			//var_dump($db);
			if(!$db->checkField($tbl="pa_insurance_cards",$field="Relation")){
				saveData("ALTER TABLE `pa_insurance_cards` ADD `Relation` VARCHAR(255) NOT NULL AFTER `Affectation`",$con);
			}
			/* var_dump($_POST);
			die; */
			//try to keep new information about the insurance cards
			saveData("UPDATE pa_insurance_cards SET AffiliateNumber='{$_POST['fcategory']}', AffiliateName='{$_POST['father']}', Affectation='{$_POST['location']}', `Relation`='{$_POST['rama_affiliate']}' WHERE PatientInsuranceCardsID='{$card_id}'",$con);
		}
		if($patient_id){
			if(!($record = returnSingleField("SELECT PatientRecordID FROM pa_records WHERE Status=0 && DateIn='{$_POST['date']}' && PatientID='{$patient_id}'",$field="PatientRecordID",$data=true, $con))){
				
				//generate the document id now
				$docid = generateDocID($_POST['insurance'], str_replace("-","",$_POST['date']));
				//str_replace()
				
				$sql = "INSERT INTO pa_records SET DocID='{$docid}',
						PatientID='{$patient_id}',
						InsuranceNameID='{$_POST['insurance']}',
						InsuranceCardID='{$_POST['card_id']}',
						NationalID='{$_POST['card_id1']}',
						Weight='{$_POST['weight']}',
						Temperature='{$_POST['temperature']}',
						DateIn='{$_POST['date']}',
						Status=0,
						VillageID='{$village_id}',
						ReceptionistID='{$_SESSION['user']['UserID']}'";
		
				if($ins == "RSSB RAMA"){
					$_POST['fcategory'] = PDB($_POST['fcategory'],true,$con);
					$_POST['location'] = PDB($_POST['location'],true,$con);
					$sql .=  ", FamilyCategory='0'";
					
					if(!returnSingleField("SELECT PatientInsuranceCardsID FROM pa_insurance_cards WHERE Status=1 && PatientID='{$patient_id}'",$field="PatientInsuranceCardsID",$data=true, $con)){
						$sql_for_cards = "INSERT INTO pa_insurance_cards SET 
									PatientID='{$patient_id}',
									InsuranceNameID='{$_POST['insurance']}',
									InsuranceCardsID='{$_POST['card_id']}',
									AffiliateNumber='{$_POST['fcategory']}',
									Affectation='{$_POST['location']}',
									Date='{$_POST['date']}',
									Status=1,
									AffiliateName='{$_POST['father']}'
									";
					//echo $sql_for_cards; die;
					saveData($sql_for_cards,$con);
					}
				} else{
					$sql .=  ", FamilyCategory='{$_POST['fcategory']}'";
				}
				
				
				$record = saveAndReturnID($sql, $con);
				//save the service
				/* var_dump($record);
				echo $sql;
			die; */
				if($_POST['service']){
					saveAndReturnID("INSERT INTO se_records SET PatientRecordID='{$record}', ServiceNameID='{$_POST['service']}', Date='{$_POST['date']}'", $con);
					//check if the service 
					$service = formatResultSet($rslt=returnResultSet($sql="SELECT DISTINCT se_name.* FROM se_name WHERE se_name.ServiceCode='PST'",$con),$multirows=false,$con);
					if($service['ServiceNameID'] == $_POST['service']){
						//now save data related to the pst service
						saveData("INSERT INTO pst_records SET PatientID='{$patient_id}', Frequency='{$_POST['next_frequency']}', DocIDs='{$_POST['document_list']}{$docid}'",$con);
					}
					
				}
				//if($_POST['tm'] > 0){
				//find the correct money to be paid if private
				$tm_private = null;
				/* if($ins == "Private"){
					$tm_private = 940;
				} */
				saveAndReturnID("INSERT INTO mu_tm SET PatientRecordID='{$record}', TicketPaid='".($tm_private != null?$tm_private:($_POST['tm'] == "COMPASSION" || $_POST['tm'] == "DETTES"?200:($_POST['tm'] != 200 && $ins=="CBHI"?0:$_POST['tm'])))."', ReceiptNumber='{$_POST['receipt_number']}'".($_POST['tm'] != 200 && $ins=="CBHI"?", Type='{$_POST['tm']}'":"").", Date='{$_POST['date']}', UserID='{$_SESSION['user']['UserID']}'", $con);
				//}
				$error = "<span class=success><b>New Patient Received <br />Code:{$docid} <br /><a href='../forms/".returnSingleField($sql="SELECT in_forms.* FROM in_name,in_category,in_price,in_forms WHERE in_name.CategoryID= in_category.InsuranceCategoryID && in_forms.InsuranceNameID = in_name.InsuranceNameID && in_price.InsuranceNameID = in_name.InsuranceNameID && in_name.InsuranceNameID='{$_POST['insurance']}'","FormFile",$data=true, $con)."?records=".$record."' id='print_file_now' target='_blank'>Print</a></b></span>";
				$error .= <<<SCRIPT
				<script>
					function click_now(){
						try{
							$('#print_file_now')[0].click();
							$('.clear_cmd').html('');
						} catch(e){
							//console.log("Error!");
						}
					}
					$("#doc_search").focus();
					$("#doc_search").select();
					setTimeout('click_now()',100);
				</script>
SCRIPT;
				//header("Location:);
				//return;
			} else{
				saveData("UPDATE pa_records SET InsuranceCardID='{$_POST['card_id']}' WHERE  Status=0 && DateIn='{$_POST['date']}' && PatientID='{$patient_id}'",$con);
				$error = "<span class=success><b><a id=print_file_now href='../forms/".returnSingleField($sql="SELECT in_forms.* FROM in_name,in_category,in_price,in_forms WHERE in_name.CategoryID= in_category.InsuranceCategoryID && in_forms.InsuranceNameID = in_name.InsuranceNameID && in_price.InsuranceNameID = in_name.InsuranceNameID && in_name.InsuranceNameID='{$_POST['insurance']}'","FormFile",$data=true, $con)."?records=".$record."' target='_blank'>
				New Patient Received<br />Print</a></b></span>";
				$error .= <<<SCRIPT
				<script>
					function click_now(){
						try{
							$('#print_file_now')[0].click();
							$('#reset_form').click();
							$('.clear_cmd').html('');
						} catch(e){
							//console.log("Error!");
						}
					}
					$("#doc_search").focus();
					$("#doc_search").select();
					setTimeout('click_now()',100);
				</script>
SCRIPT;
			}
		}
	}
}

echo $error;
?>