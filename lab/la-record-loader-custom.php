<?php
session_start();
//var_dump($_SESSION);
require_once "../lib/db_function.php";
if("lab" !== returnSingleField($sql="SELECT PostCode from sy_post WHERE PostID='{$_SESSION['user']['PostID']}'",$field="PostCode",$data=true, $con)){
	echo "<script>window.location='../logout.php';</script>";
	return;
}
if(!preg_match('/[0-9]{4}-[0-9]{2}-[0-9]{2}/',$_POST['date1']) || !preg_match('/[0-9]{4}-[0-9]{2}-[0-9]{2}/',$_POST['date2'])){
	echo "<span class=error-text>Invalid Date</span>";
	return;
}
$header = "";
$query = ""; $query_counter = 0; $header_data=array();
$result_summary = array();
foreach($_POST as $examid=>$examname){
	if(is_numeric($examid)){
		//ad this exam in selection query
		if($query_counter++ > 0)
			$query .= " || ";
		$query .= "la_exam.ExamID = '{$examid}'";
		//add the exam in the header to be displayed
		$header .= "<th>{$examname}</th>";
		$header_data[] = $examid;
		$result_summary[$examid] = array();
	}
}
//die;
//select all result corresponding to the selected month and exams
$sql = "SELECT DISTINCT la_records.ResultNumber, la_records.ResultDate, pa_records.DocID, pa_records.DateIn, pa_records.PatientRecordID, pa_info.*, ad_village.VillageName, ad_cell.CellName, ad_sector.SectorName, ad_district.DistrictName FROM la_records, `la_price`, la_exam, co_records, pa_records, pa_info, ad_village, ad_cell, ad_sector, ad_district WHERE la_exam.ExamID = la_price.ExamID && la_price.ExamPriceID = la_records.ExamPriceID && la_records.ResultDate >= '{$_POST['date1']}' && la_records.ResultDate <= '{$_POST['date2']}' && la_records.ConsultationRecordID=co_records.ConsultationRecordID && co_records.PatientRecordID = pa_records.PatientRecordID && pa_records.PatientID = pa_info.PatientID && pa_info.VillageID = ad_village.ViillageID && ad_village.CellID = ad_cell.CellID && ad_cell.SectorID = ad_sector.SectorID && ad_sector.DistrictID = ad_district.DistrictID && ({$query}) ORDER BY la_records.ResultDate ASC, ResultNumber ASC";
//echo $sql; die;
$exam_price_ids = formatResultSet($rslt=returnResultSet($sql,$con),$multirows=true,$con);

?>

<div style='margin-top: 10px;'>
<table class='table tables' border='1' style='width: 100%;text-align: center; font-size:12px;' >
	<thead style='font-weight: bold;'>
		<th>Number</th>
		<th>DocID</th>
		<th>Date</th>
		<th>Name</th>
		<th style='padding:0 10px;'>Age</th>
		<th>Sex</th>
		<th>District</th>
		<th>Sector</th>
		<th>Cell</th>
		<th>Village</th>
		<?= $header ?>
	</thead>
	<tbody>
		<?php
		$s = 0;
		if($exam_price_ids)
		foreach ($exam_price_ids as $get){
		?>
			<tr class='tr-p' >
				<td style='text-align:right;'><?= /* substr( */$get['ResultNumber']/* ,6) */ ?></td>
				<td><?= $get['DocID'] ?></td>
				<td><?= @$get['ResultDate'] ?></td>
				<td><?= $get['Name'] ?></td>
				<td title="DOB: <?= $get['DateofBirth'] ?>"><?= getAge($get['DateofBirth'],1,$get['DateIn']) ?></td>
				<td><?= $get['Sex'] ?></td>
				<td><?= $get['DistrictName'] ?></td>
				<td><?= $get['SectorName'] ?></td>
				<td><?= $get['CellName'] ?></td>
				<td><?= $get['VillageName'] ?></td>
				<?php
				foreach($header_data as $exam_id){
					?>
					<td class='td-r'>
						<?php
						//select the result assigned to the given result
						$sql = "SELECT la_result.ResultName, la_result.Appear FROM la_result, la_result_record, la_records WHERE la_records.ExamRecordID = la_result_record.ExamRecordID && la_result.ResultID = la_result_record.ResultID && la_records.ResultDate = '{$get['ResultDate']}' && la_records.ResultNumber = '{$get['ResultNumber']}' && la_result.ExamID='{$exam_id}'";
						//echo $sql;
						//echo $exam_id.":".$get['ResultNumber'];
						$array = formatResultSet($rslt=returnResultSet($sql,$con),$multirows=true,$con);
						$str = "";
						//var_dump($array);
						if($array){
							foreach($array as $index=>$result){
								if($result['Appear']){
									if(!@$result_summary[$exam_id][trim($result['ResultName'])])
										$result_summary[$exam_id][trim($result['ResultName'])] = 1;
									else
										$result_summary[$exam_id][trim($result['ResultName'])] += 1;
								}
								//remove the appear property on the current result
								unset($array[$index]['Appear']);
							}
						}
						arraytostring($array, $str);
						echo $str;
						
						?>
					</td>
					<?php
				}
				?>
			</tr>
		<?php
		}
		?>
	</tbody>
	<tr>
		<td colspan=10></td>
		<?php
		if(count($result_summary) > 0){
			foreach($result_summary as $xamid=>$result_summary_data){
				echo "<th>";
				foreach($result_summary_data as $rs=>$rn){
					echo "{$rs}:{$rn}<br />";
				}
				echo "</th>";
			}
		}
		?>
	</tr>
</table>
	<?php
		//display the result summary now
		/* if(count($result_summary) > 0){
			echo "<table>";
				foreach($result_summary as $rs=>$rn){
					//var_dump($rs);
					echo "<tr><th>{$rs}</th><th>{$rn}</th></tr>";
				}
			echo "</table>";
		} */
	?>
</div>
<style type="text/css">
	.table{
		table-layout: inherit;
	}
	.tr-p td {
		padding: 5px;
	}
	.td-r,.th-r{
		text-align: left;
		padding-left: 10px;
	}
}
</style>