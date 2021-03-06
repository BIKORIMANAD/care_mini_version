<?php
session_start();
//var_dump($_SESSION['report']);
//var_dump($_SESSION['header']);
//var_dump($_SESSION['report_title']);
//echo "<pre>";
//var_dump($_SESSION['report']);
require_once "../lib/db_function.php";
if($_GET['format'] == "excel" && @$_SESSION['report']){
	//now generate the excel file for the report
	$file_name = time().".xlsx";
	//echo $file_name;
		//include phpExcel library in the file
		require_once "../lib2/PHPExcel/IOFactory.php";
		require_once "../lib2/PHPExcel.php";
		//instantiate the PHPExcel object
		$objPHPExcel = new PHPExcel;
		
		//instantiate the writer object
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel, "Excel2007");
		
		$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial');
		$objPHPExcel->getDefaultStyle()->getFont()->setSize(12);
		
		$objPHPExcel->setActiveSheetIndex(0);
		
		$activeSheet = $objPHPExcel->getActiveSheet();
		/* 
		$activeSheet->getColumnDimension('A')->setWidth(22); */
		$activeSheet->getColumnDimension('B')->setAutoSize(true);
		
		$fields = array("A"=>3);
		$fields["B"] = 13;
		$fields["C"] = 12;
		$fields["D"] = 4;
		$fields["E"] = 4;
		$fields["F"] = 4;
		$fields["G"] = 4;
		$fields["H"] = 4;
		$fields["I"] = 4;
		
		foreach($fields AS $f=>$w){
			$activeSheet->getColumnDimension($f)->setWidth($w);
		}
		
		$data = $_SESSION['report'];
		//echo "<pre>";var_dump($data); die;
		//try to write report header now
		$row = 1;
		for($i=0;$i<count($_SESSION['header']);$i++){
			$simple_row = $_SESSION['header'][$i];
			//var_dump($simple_row); echo "<br />";
			$first_column = 'B';
			SpanCells($activeSheet,"B".$row.":D".$row,$align='left');
			SpanCells($activeSheet,"E".$row.":G".$row,$align='left');
			//set the value for B1
			$count = 0;
			foreach($simple_row as $title_=>$value){
				if($count++ == 0){
					$activeSheet->setCellValue($first_column.$row, $title_);
					$first_column = 'E';
					if(preg_match("/^CODE/",$title_))
						$value = $value." ";
					//var_dump(is_integer($value)); echo $value;
					$activeSheet->setCellValue($first_column.$row, $value);
					
				} else{
					$first_column = 'K';
					$activeSheet->setCellValue($first_column.$row, $title_);
					$first_column = 'L';
					SpanCells($activeSheet,"L".$row.":N".$row,$align='left');
					$activeSheet->setCellValue($first_column.$row, $value);
				}
			}
			
				$row++;
		}
		
		//now write the report title
		//echo count($data[0]);
		$last_column = count($data[0]) == 17?"T":(count($data[0]) == 19?"S":(count($data[0]) == 15?"O":"A"));
		$first_column = "A";
		SpanCells($activeSheet,"A".$row.":".$last_column.$row,$align='center');
		$activeSheet->setCellValue($first_column.$row, $_SESSION['report_title']['title']);
		
		
		//start write data
		$start_row = ++$row;
		//echo $start_row;
		//var_dump($data);
		//die();
		$data_count = 1; $auto = 0; $started = 0;
		for($k=0;$k<count($data);$k++){
			//var_dump($data[$k]); echo "<br /><br /><br />";
			$first_column = "A";
			foreach($data[$k] as $v){
				if($k == 2 && $started == 0){
					$first_column = "D";
					$started = 1;
				}
				//echo $first_column.$row."=".$v;
				$activeSheet->getColumnDimension($first_column)->setAutoSize(true);
				$activeSheet->setCellValue(($first_column++).$row, $v);
				//var_dump($v); echo "<br />";
				//echo $first_column;
				if($v === "NO"){
					//echo $v; echo $row;echo "<br />";
					SpanCells($activeSheet,"A".$row.":A".($row + 2),$align='center');
					$activeSheet->setCellValue("A".$row, $v);
					//$first_column = 'L';
				} 
				if($v === "Period"){
					//echo $v; echo $row;echo "<br />";
					SpanCells($activeSheet,"B".$row.":B".($row + 2),$align='center');
					$activeSheet->setCellValue("B".$row, $v);
					//$first_column = 'L';
				} 
				if($v === "HEALTH FACILITY"){
					//echo $v; echo $row;echo "<br />";
					SpanCells($activeSheet,"C".$row.":C".($row + 2),$align='center');
					$activeSheet->setCellValue("C".$row, $v);
					//$first_column = 'L';
				} 
				if($v === "NUMBER OF PATIENTS FREQUENTING HEALTH FACILITIES"){
					//echo $v; echo $row;echo "<br />";
					SpanCells($activeSheet,"D".$row.":J".($row),$align='center');
					$activeSheet->setCellValue("D".$row, $v);
					$first_column = 'K';
				} 
				if($v === "SPECIAL CASES TO BE REPORTED"){
					//echo $v; echo $row;echo "<br />";
					SpanCells($activeSheet,"K".$row.":S".($row),$align='center');
					$activeSheet->setCellValue("K".$row, $v);
					$first_column = 'T';
				} 
				if($v === "ESTIMATED COST OF MEDICAL BENEFITS TO CBHI MEMBERS"){
					//echo $v; echo $row;echo "<br />";
					SpanCells($activeSheet,"T".$row.":AD".($row),$align='center');
					$activeSheet->setCellValue("T".$row, $v);
					//$first_column = 'N';
				} 
				if($v === "Number of Out Patients /Nombre de Patients Ambulants"){
					//echo $v; echo $row;echo "<br />";
					SpanCells($activeSheet,"D".$row.":F".($row),$align='center');
					$activeSheet->setCellValue("D".$row, $v);
					$first_column = 'G';
				}
				
				if($v === "Number of In Patients / Nombre de Patients Hospitalies"){
					//echo $v; echo $row;echo "<br />";
					SpanCells($activeSheet,"G".$row.":I".($row),$align='center');
					$activeSheet->setCellValue("G".$row, $v);
					$first_column = 'J';
					$auto = 1;
				}
				
				if($k == 1 && $auto == 1){
					//echo $v; echo $row;echo "<br />";
					SpanCells($activeSheet,$first_column.$row.":".$first_column.($row + 1),$align='center');
					//$activeSheet->setCellValue("I".$row, $v);
					//$first_column = 'I';
					$auto = 1;
				}
				
				
			}
			$row++;
		}
		
		$styleArray = array(
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN,
					'color' => array('argb' => 'FF000000'),
				),
			),
		);
		$objPHPExcel->getActiveSheet()->getStyle("A".($start_row).":AD".(--$row))->applyFromArray($styleArray);
		
		SpanCells($activeSheet,"B".($row + 3).":F".($row + 3),$align='left');
		$activeSheet->setCellValue("B".($row + 3), "Prepared By: ".returnSingleField("SELECT Name FROM sy_users WHERE UserID='{$_SESSION['user']['UserID']}'","Name",$data=true, $con));
		
		$activeSheet->setTitle(date("Y-m-d",time()));

		// Create a new worksheet, after the default sheet
		$objPHPExcel->createSheet();
			
		//write the file with the desired filename
		$objWriter->save("./prest/{$_GET['in']}_".$file_name);
		//unset($_SESSION['report']);
}
?>
<html>
	<head>
		<title>Prestation</title>
	</head>
	<body>
<h2>Available prestation please select one</h2>
			<input type=hidden name=error />
			<?php
				/*Display the Messages*/
				if(isset($errorMsg))
				{
					echo "<span class = 'error'>{$errorMsg}</span><br />";	
				}
				elseif(isset($successMsg))
				{
					echo "<span class = 'success'>{$successMsg}</span><br />";	
				}
				
				/////////////scan dir functions are going to be implemented here!!!
				
				//start scan process
				
				// require_the scan directory file
				require_once "../lib2/Scan/Class_ScanDir.php";
				
				// set the dir path
				$path = "./prest";
				
				// instantiate the class.
				$Dir = new DirScan () ;
				
				// set filter to return only excel formats in the directory
				$Dir->SetFilterExt(array("xls","xlsx")) ;
				
				// enable filter
				$Dir->SetFilterEnable(true);
				
				// list all file extension disabled
				$Dir->SetFileExtListEnable(false);
				
				// enable scan sub directories
				$Dir->SetScanSubDirs(true);
				
				// enable Files Scanning
				$Dir->SetScanFiles(true);
				
				// enable full details
				$Dir->SetFullDetails(true);
				
				// run the scan
				$Dir->ScanDir($path,false);
				
				// display all the file found during scanning
				if(count($Dir->TabFiles) >0){
					$out = "<table border=1 style='border-collapse:collapse; padding:5px;'><tr><th>Type</th><th>Insurance</th><th>File</th><th>Size</th><!--<th>Created on</th>--></tr>"; $count=0;
					foreach ($Dir->TabFiles as $f) {
						$time_part = explode("_",$f['basename'])[1];
						$time = explode(".",$time_part)[0];
						//var_dump($time);
						//if(preg_match("/^".preg_replace("/ /","_",trim($db->select1cell("school_report_db`.`tbl_users","Name",array("ID"=>$_SESSION['u_id']),true)))."/",$f['filename']))
							$out .= "<tr><td>[".$f['extension']."]</td><td>".strtoupper(explode("_",$f['filename'])[0])."</td><td><a style='color:blue; text-decoration:none;' target='_blank' href='./".$f['dirname']."/".$f['filename']."'>Created on ".date("Y-m-d H:i:s",$time)."</a></td><td>".round($f['size']*(1/1024),1)." KB</td><!--<td align=right>".date('Y-m-d h:i:s',$f['datemodify'])."</td>--></tr>";
							//echo "<pre>";//.$f["filename"]."<br>";
							//	   print_r($f);
					}
					$out .= "</table>";
					echo $out;
				}
				//end scan process
			?>
			
</body>