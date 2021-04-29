<?php
/* database connection function */
$con = null;

function connectDB(&$con=null, $db="care_min_v2",$server="127.0.0.1",$username="root",$password=""){
	if($con != null)
		return;
		
	@$con = mysql_connect($server,$username,$password);
	mysql_select_db($db,$con);
	mysql_query("SET NAMES utf-8");
	mysql_set_charset("utf-8",$con);
}
function reconnect(&$con){
	if($con == null)
		connectDB($con);
}

function isDataExist($sql, &$con){
	reconnect($con);
	$result = mysql_query($sql);
	if($result && mysql_num_rows($result)>0)
		return true;
	//echo $sql;
	return false;
	
}

function returnResultSet($sql,&$con){
	if($con == null)
		connectDB($con);
	//echo $sql."<br />";
	if($r = mysql_query($sql)or die(mysql_error()." ".$sql))
		return $r;
	echo mysql_error()." ".$sql;
}

function insertOrReturnID($sql1, $sql2, $field,&$con=null){
	if($con == null)
		connectDB($con);
	$check = returnResultSet($sql2,$con);
	if(mysql_num_rows($check)>0){
		//return the the id
		return formatResultSet($check,$multirows=false,$con)[$field];
	} else{
		return saveAndReturnID($sql1, $con);
	}
}
function returnSingleField($sql,$field,$data=true, &$con=null){
	//echo $sql;
	if($con == null)
		connectDB($con);
	if($r = returnResultSet($sql,$con)){
		//var_dump($r);
		$d = mysql_fetch_assoc($r);
		
		return $data?$d[$field]:$data;
	}
	return null;
	
}

function formatResultSet($rslt,$multirows=true,&$con){
	reconnect($con);
	
	if(mysql_num_rows($rslt)<1)
		return null;
		
	if(!$multirows)
		return mysql_fetch_assoc($rslt);
	
	$rtn = array();
	while($r = mysql_fetch_assoc($rslt))
		$rtn[] = $r;
	
	return $rtn;
}


function returnAllData($sql,&$con){
	reconnect($con);
	$rslt = returnResultSet($sql,$con);
	if(mysql_num_rows($rslt)<1)
		return null;
	//return null;
	return formatResultSet($rslt,$multirows=true,$con);
	
}
function returnAllDataInTable($tbl,&$con, $condition = ""){
	reconnect($con);
	if($tbl == "")
		return null;
	$sql = "SELECT * FROM `{$tbl}` ".$condition;
	$rslt = returnResultSet($sql,$con);
	if(mysql_num_rows($rslt)<1)
		return null;
	
	return formatResultSet($rslt,$multirows=true,$con);
}

function saveAndReturnID($sql, &$con){
	reconnect($con);
	if(mysql_query($sql) && mysql_affected_rows($con) ==1)
		return mysql_insert_id();
	echo mysql_error().$sql;
	return null;
		
}

function saveData($sql, &$con){
	reconnect($con);
	//echo $sql;
	if(mysql_query($sql)or die(mysql_error().$sql) && mysql_affected_rows($con) ==1)
		return true;
	echo $sql;
	return false;
		
}

function PDB($str, $trim=true, &$con){
	reconnect($con);
	return mysql_real_escape_string($trim?trim($str):$str);
}


/**************************************** OTHER FUNCTION **********************/
function ommitStringPart($str,$char_to_display,&$ommitted=false){
	if(strlen($str)>$char_to_display){
		$ommitted = true;
		//echo $str;
		return "".substr($str,0,$char_to_display)."...";
	} else{
		return $str;
	}
	
}

function JoinArrays(&$array1, &$array2, &$array_out){
	if(is_array($array1))
		$array_out = $array1;
	if(is_array($array2)){
		foreach($array2 as $data)
			$array_out[] = $data;
	}
}

function fromDto1D(&$array, &$out){
	foreach($array as $key=>$value){
		if(is_array($value))
			fromDto1D($array[$key], $out);
		else
			$out[] = $value;
	}
}

function arraytostring(&$array, &$str, $position = 0, $sep = "; "){
	static $separate;
	//var_dump($sep); echo "<hr />";
	if(is_array($array)){
		foreach($array as $key=>$value){
			if(!is_array($value)){
				$str .= ($separate?$sep:"").$value;
				$separate = true;
			} else{
				//convert the dimension and call the array to string again
				$new_array = array();
				fromDto1D($value, $new_array);
				arraytostring($new_array, $str, $position, $sep);
			}
		}
	}
	//now replace any abnormal characters
	$str = preg_replace(array("/^;/"),array(""),$str);
}

/********
function
@name dayCategory
@param date_value yyyy-mm-dd
@return	1. normal day	2. week-end		3. jour fierier		0. undefined
*********/
function dayCategory($date){
	//var_dump($date);
	$week_end = array("Sat"=>"CPC Nuit/WE","Sun"=>"CPC Nuit/WE");
	$day = array("Mon"=>"CPC Jour","Tue"=>"CPC Jour","Wed"=>"CPC Jour","Thu"=>"CPC Jour","Fri"=>"CPC Jour");
	if(!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/',$date))
		return 0;
	$sec = mktime(0,0,0,explode("-",$date)[1],explode("-",$date)[2],explode("-",$date)[0]);
	$d = date("D",$sec);
	if(@$week_end[$d])
		return $week_end[$d];
	/* ferier ici */
	if(returnSingleField("SELECT Date FROM sy_conge WHERE Date='{$date}'","Date",true,$con))
		return "CPC Jour Ferier";
	/* ferier ici */
	if(@$day[$d])
		return $day[$d];
	return 0;
}
/****
@name ConsType
@param 

*/
/**
* @name getAge
* @param date
* @param $notation
* 
*/
function getAge($date,$notation=1, $current_date=''){
	if($date == "0000-00-00")
		return "";
	if($current_date == "")
		$current_date = date("Y-m-d",time());
	$expended = explode("-",$date);
	$expended_current = explode("-",$current_date);
	
	$year = $expended[0];
	$month = $expended[1];
	$day = $expended[2];
	$brth = mktime(0,0,0,$month,$day,$year);
	$current_year = $expended_current[0];
	$current_month = $expended_current[1];
	$current_day = $expended_current[2];
	$crnt = mktime(0,0,0,$current_month,$current_day,$current_year);
	$seconds_of_a_year 	= 60*60*24*365;
	$seconds_of_a_month = 60*60*24*30;
	$seconds_of_a_week 	= 60*60*24*7;
	$seconds_of_a_day 	= 60*60*24;
	//echo date("Y-m-d",$crnt);
	//echo date("Y-m-d",$brth);
	
	$pa_seconds = $crnt - $brth;
	//echo $pa_seconds,"/".$seconds_of_a_day."=";
	//echo $date;
	if($notation == 15){
		if($pa_seconds <= $seconds_of_a_week)
			return 1;
		else if($pa_seconds <= ($seconds_of_a_month*2))
			return 2;
		else if($pa_seconds <= ($seconds_of_a_month*59))
			return 3;
		
		return (int)($pa_seconds/$seconds_of_a_week);
	}
	//pa_year
	$pa_year = (int)($pa_seconds/$seconds_of_a_year);
	//var_dump($pa_year," ",$pa_seconds," ",$seconds_of_a_year); 
	if($pa_year >= 5 || $notation == 2)
		return $pa_year.($notation==1?" yrs":"");
	
	//var_dump($pa_seconds);
	$pa_seconds %= $seconds_of_a_year;
	$pa_month = (int)($pa_seconds/$seconds_of_a_month);
	//var_dump($pa_seconds, $seconds_of_a_month);
	$pa_seconds %= $seconds_of_a_month;
	if($notation == 2){
		//only year an month in decimal notation
		return $pa_year.($pa_month>0?".".$pa_month:"");
	}
	if($pa_year>=1)
		return ($pa_year>0?$pa_year.($notation==1?" yr":","):"").($pa_month>0?" ".$pa_month." mn":"");
	
	$pa_weeks = (int)($pa_seconds/$seconds_of_a_week);
	$pa_seconds %= $seconds_of_a_week;
	$pa_days = (int)($pa_seconds/$seconds_of_a_day);
	if($notation == 2){
		//only year an month in decimal notation
		return $pa_year.($pa_month>0?".".$pa_month:"");
	}
	return ($pa_year>0?$pa_year." yr":"").($pa_month>0?" ".$pa_month." mn":"")
			.($pa_weeks>0?" ".$pa_weeks." wk":"")
			.($pa_days>0?" ".$pa_days." dy":"");
	
	$found_year = 0;
	//compare all found information return the corresponding calculated year
	if(($current_year - $year) > 1 && ($current_year - $year) > 5){
		//now the full year is found
		return ($current_year - $year)." yr".(($current_year - $year)>1?"s":"");
	}
	if($current_month >= $month){
		return ($current_year - $year)." yr".(($current_year - $year)>1?"s ":" "). (($current_month - $month) > 0?($current_month - $month)." m":"");
	}
}

function generateDocID($type,$date = ""){
	//echo $date;
	if($date == "")
		$date = date("Ymd",time());
	$max = returnSingleField($sql="SELECT MAX(`LastID`) as DocID FROM sy_ids, pa_records, in_name, in_category WHERE pa_records.InsuranceNameID = in_name.InsuranceNameID && in_name.CategoryID = in_category.InsuranceCategoryID  && in_category.InsuranceCategoryID = sy_ids.InsuranceCategoryID && pa_records.InsuranceNameID='{$type}' && sy_ids.Day = '{$date}'","DocID",$data=true, $con);
	//echo $sql;
	//return;
	//var_dump($type);
	//var_dump($max);
	
	if($max == null)
		$max = 0;//$date.returnSingleField($sql="SELECT InsuranceCode FROM in_category WHERE InsuranceCategoryID='".returnSingleField($sql="SELECT CategoryID FROM in_name WHERE InsuranceNameID='{$type}'","CategoryID",$data=true, $con)."'","InsuranceCode",$data=true, $con);
	//var_dump($max);
	//$max .= "1";
	$prefix = $date.returnSingleField($sql="SELECT InsuranceCode FROM in_category WHERE InsuranceCategoryID='".returnSingleField($sql="SELECT CategoryID FROM in_name WHERE InsuranceNameID='{$type}'","CategoryID",$data=true, $con)."'","InsuranceCode",$data=true, $con);//substr($max,0,9);
	$int_max = substr($max,9);
	//var_dump($int_max);
	if(!$int_max)
		$int_max = 0;
	++$max;
	saveData("INSERT INTO sy_ids SET InsuranceCategoryID='".returnSingleField($sql="SELECT CategoryID FROM in_name WHERE InsuranceNameID='{$type}'","CategoryID",$data=true, $con)."', LastID='{$max}', Day={$date}",$con);
	//echo $prefix.$max;
	return $prefix.($max);
}

/*****************************************************/
function GetFile($filename,$ext,$case="strtolower"){
	$ex = explode(".",$_FILES[$filename]['name']);
	$e = $ex[count($ex)-1];
	if(in_array($case($e),$ext))
		return true;
	else
		return false;
}

function Enc($str){
	return md5(sha1(md5(sha1($str))));
}

function co($data,$loc,&$con){
	$data[0] = PDB($data[0],true,$con);
	//search for item_id
	$co_id = returnSingleField("SELECT ConsultationCategoryID FROM co_category WHERE ConsultationCategoryName='{$data[0]}'","ConsultationCategoryID",true,$con);
	if(!$co_id)
		$co_id = saveAndReturnID("INSERT INTO co_category SET ConsultationCategoryName='{$data[0]}'", $con);
	//set all price
	foreach($loc as $lo=>$i){
		//updaate all existing 
		if(!returnSingleField("SELECT ConsultationPriceID FROM co_price WHERE ConsultationCategoryID='{$co_id}' && InsuranceCategoryID='{$lo}' && Amount='{$data[$i]}'","ConsultationPriceID",true,$con)){
			saveData("UPDATE co_price SET Status=0 WHERE ConsultationCategoryID='{$co_id}' && InsuranceCategoryID='{$lo}'",$con);
			saveData("INSERT INTO co_price SET ConsultationCategoryID='{$co_id}', InsuranceCategoryID='{$lo}', Amount='{$data[$i]}', Date=NOW(), Status=1",$con);
		}
	}
}

function ho($data,$loc,&$con){
	$data[0] = PDB($data[0],true,$con);
	//search for item_id
	$co_id = returnSingleField("SELECT TypeID FROM ho_type WHERE Name='{$data[0]}'","TypeID",true,$con);
	if(!$co_id)
		$co_id = saveAndReturnID("INSERT INTO ho_type SET Name='{$data[0]}'", $con);
	//set all price
	foreach($loc as $lo=>$i){
		//updaate all existing 
		if(!returnSingleField("SELECT HoPriceID FROM ho_price WHERE HoTypeID='{$co_id}' && InsuranceCategoryID='{$lo}' && Amount='{$data[$i]}'","HoPriceID",true,$con)){
			saveData("UPDATE ho_price SET Status=0 WHERE HoTypeID='{$co_id}' && InsuranceCategoryID='{$lo}'",$con);
			saveData("INSERT INTO ho_price SET HoTypeID='{$co_id}', InsuranceCategoryID='{$lo}', Amount='{$data[$i]}', Date=NOW(), Status=1",$con);
		}
	}
}



function saveMD($data,$loc,&$con){
	$data[0] = PDB($data[0],true,$con);
	//search for item_id
	//var_dump($data); die;
	$co_id = returnSingleField("SELECT MedecineNameID FROM md_name WHERE CategoryCode='{$data[6]}'","MedecineNameID",true,$con);
	if(!$co_id)
		$co_id = saveAndReturnID("INSERT INTO md_name SET MedecineName='{$data[0]}', CategoryCode='{$data[6]}', MedecineCategorID='{$loc}', Emballage='{$data[5]}'", $con);
	else{
		saveData("UPDATE md_name SET MedecineName='{$data[0]}', MedecineCategorID='{$loc}', Emballage='{$data[5]}' WHERE MedecineNameID='{$co_id}'",$con);
	}
	//return;
	//updaate all existing 
	$amount = round($data[2] + ($data[2]*0.2),1);
	if(!returnSingleField("SELECT MedecinePriceID FROM md_price WHERE MedecineNameID='{$co_id}' && BuyingPrice='{$data[2]}' && Date='{$data[7]}' ","MedecinePriceID",true,$con)){
		saveData("UPDATE md_price SET Status=0 WHERE MedecineNameID='{$co_id}'",$con);
		saveData($s = "INSERT INTO md_price SET MedecineNameID='{$co_id}', BuyingPrice='{$data[2]}', Amount='{$amount}', Date='{$data[7]}', Status=1, Emballage='{$data[5]}'",$con);
		//echo $s."<br />";
	}
}
function saveCN($data,$loc,&$con){
	$data[0] = PDB($data[0],true,$con);
	//search for item_id
	//var_dump($data); die;
	$co_id = returnSingleField("SELECT MedecineNameID FROM cn_name WHERE MedecineName='{$data[0]}'","MedecineNameID",true,$con);
	if(!$co_id)
		$co_id = saveAndReturnID("INSERT INTO cn_name SET MedecineName='{$data[0]}'", $con);
	else{
		saveData("UPDATE cn_name SET MedecineName='{$data[0]}' WHERE MedecineNameID='{$co_id}'",$con);
	}
	//return;
	//updaate all existing 
	$amount = round($data[2] + ($data[2]*0.2),1);
	if(!returnSingleField("SELECT MedecinePriceID FROM cn_price WHERE MedecineNameID='{$co_id}' && BuyingPrice='{$data[2]}' && Date='{$data[6]}' ","MedecinePriceID",true,$con)){
		saveData("UPDATE cn_price SET Status=0 WHERE MedecineNameID='{$co_id}'",$con);
		saveData($s = "INSERT INTO cn_price SET MedecineNameID='{$co_id}', BuyingPrice='{$data[2]}', Amount='{$amount}', Date='{$data[6]}', Status=1, Emballage='{$data[5]}'",$con);
		//echo $s."<br />";
	}
}

function saveDG($data,$catid,$con){
	//var_dump($data); return;
	$data[1] = PDB($data[1],true,$con);
	$data[2] = PDB($data[2],true,$con);
	$data[3] = PDB($data[3],true,$con);
	//search for item_id
	$co_id = returnSingleField("SELECT DiagnosticID FROM co_diagnostic WHERE DiagnosticCode='{$data[1]}'","DiagnosticID",true,$con);
	if(!$co_id)
		$co_id = saveAndReturnID("INSERT INTO co_diagnostic SET DiagnosticName='{$data[2]}', `English`='{$data[3]}', Code='{$data[4]}', DiagnosticCategoryID='{$catid}', DiagnosticCode='{$data[1]}'", $con);
}


function co_edit($data,&$con){
	//var_dump($data);
	if($data['record_id']){
		//save new record to co_records
		saveData("UPDATE co_records SET ConsultationPriceID='{$data['consultation']}' WHERE ConsultationRecordID='{$data['record_id']}' && PatientRecordID='{$data['patient_record_id']}'",$con);
	}
}

function md_edit($data,&$con){
	//var_dump($data); die;
	if($data['record_id']){
		//save new record to co_records
		saveData("UPDATE md_records SET Quantity='{$data['quantity']}' WHERE MedecineRecordID='{$data['record_id']}'",$con);
	}
}

function md_delete($data,&$con){
	//var_dump($data); die;
	if($data['record_id']){
		//save new record to co_records
		saveData("DELETE FROM md_records WHERE MedecineRecordID='{$data['record_id']}'",$con);
	}
}

function ex_delete($data,&$con){
	//var_dump($data); die;
	if($data['record_id']){
		//save new record to co_records
		//var_dump($data);
		saveData("DELETE FROM la_result_record WHERE ExamRecordID ='{$data['record_id']}'",$con);
		
		saveData("DELETE FROM la_records WHERE ExamRecordID ='{$data['record_id']}'",$con);
	}
}

function ac_delete($data,&$con){
	//var_dump($data); die;
	if($data['record_id']){
		//save new record to co_records
		saveData("DELETE FROM ac_records WHERE ActRecordID ='{$data['record_id']}'",$con);
	}
}

function cn_delete($data,&$con){
	//var_dump($data); die;
	if($data['record_id']){
		//save new record to co_records
		saveData("DELETE FROM cn_records WHERE ConsumableRecordID ='{$data['record_id']}'",$con);
	}
}

function cn_edit($data,&$con){
	//var_dump($data); die;
	if($data['record_id']){
		//save new record to co_records
		saveData("UPDATE cn_records SET Quantity='{$data['quantity']}' WHERE ConsumableRecordID='{$data['record_id']}'",$con);
	}
}

function tm_edit($data,&$con){
	//var_dump($data); die;
	if($data['record_id']){
		//save new record to co_records
		saveData("UPDATE mu_tm SET TicketPaid='{$data['amount']}' WHERE TicketID='{$data['record_id']}'",$con);
	}
}


function la($data,$loc,&$con){
	$data[0] = PDB($data[0],true,$con);
	//search for item_id
	$co_id = returnSingleField("SELECT ExamID FROM la_exam WHERE ExamName='{$data[0]}'","ExamID",true,$con);
	if(!$co_id)
		$co_id = saveAndReturnID("INSERT INTO la_exam SET ExamName='{$data[0]}', ExamCode='', ResultType=0", $con);
	//set all price
	foreach($loc as $lo=>$i){
		//updaate all existing 
		if(!returnSingleField("SELECT ExamPriceID FROM la_price WHERE ExamID='{$co_id}' && InsuranceTypeID='{$lo}' && Amount='{$data[$i]}'","ExamPriceID",true,$con)){
			saveData("UPDATE la_price SET Status=0 WHERE ExamID='{$co_id}' && InsuranceTypeID='{$lo}'",$con);
			saveData("INSERT INTO la_price SET ExamID='{$co_id}', InsuranceTypeID='{$lo}', Amount='{$data[$i]}', Date=NOW(), Status=1",$con);
		}
	}
}

function ac($data,$loc,&$con){
	$data[0] = PDB($data[0],true,$con);
	//search for item_id
	$co_id = returnSingleField("SELECT ActNameID FROM ac_name WHERE Name='{$data[0]}'","ActNameID",true,$con);
	if(!$co_id)
		$co_id = saveAndReturnID("INSERT INTO ac_name SET Name='{$data[0]}'", $con);
	//set all price
	foreach($loc as $lo=>$i){
		//updaate all existing 
		if(!returnSingleField("SELECT ActPriceID FROM ac_price WHERE ActNameID='{$co_id}' && InsuranceCategoryID='{$lo}' && Amount='{$data[$i]}'","ActPriceID",true,$con)){
			saveData("UPDATE ac_price SET Status=0 WHERE ActNameID='{$co_id}' && InsuranceCategoryID='{$lo}'",$con);
			saveData("INSERT INTO ac_price SET ActNameID='{$co_id}', InsuranceCategoryID='{$lo}', Amount='{$data[$i]}', Date=NOW(), Status=1",$con);
		}
	}
}

function am($data,$loc,&$con){
	return null;
	$data[0] = PDB($data[0],true,$con);
	//search for item_id
	$co_id = returnSingleField("SELECT ActNameID FROM ac_name WHERE Name='{$data[0]}'","ActNameID",true,$con);
	if(!$co_id)
		$co_id = saveAndReturnID("INSERT INTO ac_name SET Name='{$data[0]}'", $con);
	//set all price
	foreach($loc as $lo=>$i){
		//updaate all existing 
		if(!returnSingleField("SELECT ActPriceID FROM ac_price WHERE ActNameID='{$co_id}' && InsuranceCategoryID='{$lo}' && Amount='{$data[$i]}'","ActPriceID",true,$con)){
			saveData("UPDATE ac_price SET Status=0 WHERE ActNameID='{$co_id}' && InsuranceCategoryID='{$lo}'",$con);
			saveData("INSERT INTO ac_price SET ActNameID='{$co_id}', InsuranceCategoryID='{$lo}', Amount='{$data[$i]}', Date=NOW(), Status=1",$con);
		}
	}
}
function max_value(&$data){
	if(is_array($data) && is_numeric($data[0])){
		$max = $data[0];
		//var_dump($data);echo "<br />";
		foreach($data as $d)
			if($d>$max)
				$max = $d;
		
		return $max;
	} else{
		return null;
	}
}


function restoreTable(&$new_values, &$changes, &$address, &$reference){
	/* //var_dump($new_values);echo "<hr />";
	echo $reference['ActiveTable'];
	//var_dump($changes);echo "<hr />";
	var_dump($address);echo "<hr />";
	//var_dump($reference);
	echo "<hr /><hr />";
	return; */
	$primary_key_field = $reference['PrimaryKey'];
	$active_table = $reference['ActiveTable'];
	//var_dump($reference, $address);
	//loop all information and save new data in the database
	$query = ""; $query_condition = ""; $field_counter = 0;
	$last_address_field = "";
	foreach($address as $field=>$location){
		if($field_counter++ > 0){
			if($primary_key_field != $last_address_field)
				$query .= ", ";
			if($field_counter > 2)
				$query_condition .= " && ";
		} else
			$changes[$active_table][$field][$new_values[$location]] = PDB($new_values[$location],true, $con); //keep the same value of the first expected column to Primary Key of the table
		//check if the field has any other reference
		//var_dump($primary_key_field);
		if(@$reference[$field] && is_array($reference[$field]) && $changes[$reference[$field]['table']][($reference[$field]['Field'])][$new_values[$location]] ){
			if($primary_key_field != $field)
				$query .= "`{$field}`='".PDB($changes[$reference[$field]['table']][($reference[$field]['Field'])][$new_values[$location]],true,$con)."'";
			if($field_counter > 1)
				$query_condition .= "`{$field}`='".PDB($changes[$reference[$field]['table']][($reference[$field]['Field'])][$new_values[$location]],true,$con)."'";
		} else {
			if($primary_key_field != $field)
				$query .= "`{$field}`='".PDB($new_values[$location],true,$con)."'";
			if($field_counter > 1)
				$query_condition .= "`{$field}`='".PDB($new_values[$location],true,$con)."'";
		}
		$last_address_field = $field;
	}
	
	//echo $query_condition;
	//check if the row exist before after all formatting
	if(!$primary_key = returnSingleField($sql = "SELECT `{$primary_key_field}` FROM `{$active_table}`".($query_condition?" WHERE ".$query_condition:""),$primary_key_field,true,$con)){
		//echo $sql; echo "<br />";
		$primary_key = saveAndReturnID($sql = "INSERT INTO `{$active_table}` SET {$query}",$con);
		//echo $sql; echo "<hr />";
	}
	//echo $primary_key;
	//now set new replacement value in the change variable now
	$changes[$active_table][$primary_key_field][$new_values[$address[$primary_key_field]]] = $primary_key;
}
function RoundUp($value, $check=5){
	return ($value + (($value%$check)?($check - ($value%$check)):0) );
}
function MaxNumber(&$data){
	if(is_array($data)){
		$out = array();
		fromDto1D($data, $out);
		$max = $out[0];
		foreach($out as $number)
			if($max < ((int)$number))
				$max = ((int)$number);
		return $max;
	} else if(is_numeric($data))
		return $data;
	else 
		return null;
}
function IncrementString($sql, $field, $static,&$con){
	reconnect($con);
	$data = formatResultSet($rst=returnResultSet($sql, $con), true,$con);
	$filtered = array();
	foreach($data as $d)
		$filtered[] = str_replace($static,"",$d[$field]);
	
	$last = MaxNumber($filtered);
	
	return $static.(++$last);
	
}

function getDbTableList(&$tbl_list, &$con){
	reconnect($con);
	$rst = returnResultSet("SHOW TABLES", $con);
	$data = formatResultSet($rst, true,$con);
	//convert the array in single dimension array
	fromDto1D($data,$tbl_list);
	///var_dump($data);
}

/************************* PHP EXCEL FUNCTION *********************************/
function SpanCells($activeSheet,$range,$align='left'){
		if(!is_array($range)){
			$activeSheet->mergeCells($range);
			if($align != 'left'){
				$cells = explode(":",$range);
				if($align == 'center')
					$activeSheet->getStyle($cells[0])->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				elseif($align == 'right')
					$activeSheet->getStyle($cells[0])->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
			}
		} else{
			foreach($range as $cells){
				$activeSheet->mergeCells($cells['from'].":".$cells['to']);
				if($cells['align'] == 'right')
					$activeSheet->getStyle($cells['from'])->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
				else if($cells['align'] == 'center')
					$activeSheet->getStyle($cells['from'])->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			}
		}
	}
	
	
/************************* PHP EXCEL FUNCTION *********************************/

/**************************************** OTHER FUNCTION **********************/
ini_set('default_charset','utf-8');
date_default_timezone_set('Africa/Kigali');

/**************************************** USABLE VARIABLE *********************/
$institution_name = "KIZIBERE";
$institution_code = "40211013";
$cbhi_name = "RUHANGO";
$location = "RUHANGO";
/**************************************** USABLE VARIABLE *********************/

/**************************************** MAIN FILE CONTETS LOADED HERE *******/
require_once @$path."main_file.php";
/**************************************** MAIN FILE CONTETS LOADED HERE *******/

//connect db by default
connectDB($con);
?>