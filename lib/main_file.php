<?php
$database_name = "care_min_v2";
$zone_cells = array(4,3);
$zone_districts = array(1);
$app_name = "Care Mini";
$build = "3";

$project_title = "Care Version 2 | build ".$build;
$version = "Version 2";
$project_name = "CARE INFORMATION SYSTEM";

$release_date = "2017-04-01";
$Start_Year = "2015";
$institution_name = "KIZIBERE";
$app_name = "Care Mini";
$app_level = "Health Centre";
$developer = "<span style='font-size:10px; font-family:sans-serif;'>Powered By Easy One Ltd</span>";
$designer = strtoupper("Sovu Health Center");
$designer_name = strtoupper("Sovu Health Center");
$types = array("md"=>"Medicines","cn"=>"Consumable", "ac"=>"Acts", "la"=>"Exams");
$types_data = array("md"=>"MedecineName","cn"=>"MedecineName", "ac"=>"Name", "la"=>"ResultName");
$types_data_c = array("md"=>"MedecineNameID","cn"=>"MedecineNameID", "ac"=>"ActNameID","la"=>"ResultID");
$signs = array(">=;<="=>"Between", ">"=>"Greater Than", ">="=>"Greater Than or Equal", "<"=>"Less Than", "<="=>"Less Than or Equal", "="=>"Equal");

/***********************Variable to auto keyword ************/
$tables = array(
				"md"=>array("tb"=>"md_name","fld_v"=>"MedecineName","fld_c"=>"MedecineNameID"),
				"la"=>array("tb"=>"la_result","fld_v"=>"ResultName","fld_c"=>"ResultID","spt"=>", `la_exam`","spf"=>", `ExamName`","spc"=>"")
				);
/***********************Variable to auto keyword ************/



$quaters = array(
				"01"=>"Q1",
				"02"=>"Q1",
				"03"=>"Q1",
				"04"=>"Q2",
				"05"=>"Q2",
				"06"=>"Q2",
				"07"=>"Q3",
				"08"=>"Q3",
				"09"=>"Q3",
				"10"=>"Q4",
				"11"=>"Q4",
				"12"=>"Q4"
				);
$force_field_update = false;
$PROVINCE = ":SOUTH"; $_PROVINCE = "Sud";
$DISTRICT = ":RUHANGO"; $_DISTRICT = "RUHANGO";
$SECTOR = ":MBUYE"; $_SECTOR = "MBUYE";
$CELL = ":RUHANGO"; $_CELL = "RUHANGO";

$month = array(1=>"January","February","March","April","May","June","July","August","September","October","November","December");

$organisation_abbr = "KIZIBERE HC";
$organisation = "KIZIBERE Health Centre";
$organisation_abbrege = "RUHANGO HC";
$organisation_represantative = "";
$organisation_represantative_degree = "";
$organisation_address = "RUHANGO";
$organisation_code = "";
/***** USABLE CONSTANT ********/
define("FACTURE",0);
define("FICHE",100);

?>