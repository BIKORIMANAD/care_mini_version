<?php
session_start();
//var_dump($_SESSION);
require_once "../lib/db_function.php";
if("lab" !== returnSingleField($sql="SELECT PostCode from sy_post WHERE PostID='{$_SESSION['user']['PostID']}'",$field="PostCode",$data=true, $con)){
	echo "<script>window.location='../logout.php';</script>";
	return;
}
$centers = formatResultSet($rslt=returnResultSet($sql="SELECT DISTINCT sy_center.* from sy_center ORDER BY Level ASC, CenterName ASC",$con),$multirows=true,$con);

require_once "../lib2/cssmenu/lab_header.html";

?>
  <script type="text/javascript">
  	$(function(){
  		$('#print').hide();
  	});
  </script>
  <style>
	.fld_txt{
		width:80%;
		border:1px solid #00a;
	}
  </style>
  <div id="w">
    <div id="content">
      <h1 style='margin-top:-55px'>Fill Sample Result</h1>
      <b>
	  		<input type=hidden value='0' id='edit_mode' />
	<table class="ds_box" cellpadding="0" cellspacing="0" id="ds_conclass"
	   style="display: none;">
	<tr>
		<td id="ds_calclass"></td>
	</tr></table>
	  <input type=hidden name=insurance value='<?= $insurance[0]['InsuranceNameID'] ?>' id='insurance' />
	  <input type=hidden name=post_ value='_1' id='post' />
	  <table class=list-1><tr><td>Post</td><td>Year</td><td>Month</td><td>Day</td><td><label for='exam'>Exam</label></td></tr>
	  <tr>
	  <td>
	  <?php
		foreach($centers as $c){
			?>
			<label><input type=checkbox <?= $_SESSION['user']['CenterID'] == $c['CenterID']?"checked":"" ?> onclick='if($("#post_<?= strtolower($c['CenterName']) ?>").prop("checked")){$("#post").val($("#post").val() + "_<?= strtolower($c['CenterID']) ?>")} else{ $("#post").val($("#post").val().replace("_<?= strtolower($c['CenterID']) ?>","")) }' id='post_<?= strtolower($c['CenterName']) ?>' value='<?= strtolower($c['CenterID']) ?>'><?= $c['CenterName'] ?></label> 
			<?php
		}
		?>
	  <!--<label><input type=checkbox onclick='if($("#post_").prop("checked")){$("#post").val($("#post").val() + "_2")} else{ $("#post").val($("#post").val().replace("_2","")) }' name='post' id='post_' value='2'></label>--></td>
	  <td>
	  <select name=year class=txtfield1 style='width:70px;' id='year'>
		<?php
		for($y = date("Y",time()); $y>="2015";$y--){
			echo "<option>{$y}</option>";
		}
		?>
	  </select>
	  </td><td>
	  <select name=month class=txtfield1 style='width:140px;' id='month'>
		<?php
		$month = array(1=>"January","Febuary","March","April","May","June","July","August","September","October","November","December");
		for($m = 1; $m <= 12;$m++){
			echo "<option value='".($m<10?"0".$m:$m)."' ".(date("m",time()) == $m?"selected":"").">{$month[$m]}</option>";
		}
		?>
	  </select>
	  </td>
	  <td class=day>
	  <select name=day class=txtfield1 style='width:70px;' id='day'>
		<?php
		for($D = 1; $D<=31;$D++){
			echo "<option value='{$D}' ".(date("d",time()) == $D?"selected":"")."  >{$D}</option>";
		}
		?>
	  </select>
	  </td>
	  <td>
	  	<select id='exam' name='exam' required class='txtfield1' style='width:140px;' >
	  		<option value='' selected ><i>Select Exam....</i></option>
	  		<?php
	  			$sql = "SELECT * FROM `la_exam` ORDER BY `ExamName` ASC";
	  			$query = mysql_query($sql);
	  			while ($get = mysql_fetch_assoc($query)) {
	  				echo "<option value='".$get['ExamID']."' ".($get['ExamName'] == "GE"?"selected":"")." >".$get['ExamName']."</option>";
	  			}
	  		?>
	  	</select>
	  </td>
	  <td>
	  <input type=button class=flatbtn-blu style='padding:0 10px;' id='generate' value='Check' />
	  </td></tr>
	  </table>
	  <table class=list-1><tr><td>
	 <div id="ds" style='min-width:100px'></div></td></tr></table>
	  <span class='update_result'></span>
	  <input type=hidden id='filter_' />
		<span class=error-text-2>Select Date to see Exam Result of Patients</span>
	  <div class="patient_found" style='max-height:430px;'>
		
	  </div>
	  <div class="doc_selected" style='max-height:400px; overflow:auto; border:0px solid grey; max-width:900px;'>
	  
	  </div>
	  <div>
	  	<button id='print' style='padding: 15px;margin-top: 10px;width: 200px;cursor: pointer;'>Print</button>
	  </div>
	  </b>
    </div>
	
  </div>
  <?php
  include_once "../footer.html";
  ?>
  
	<div class="apple_overlay" id="overlay">
	  <!-- the external content is loaded inside this tag -->
	  <div class="contentWrap"></div>
	</div>
  <!-- make all links with the 'rel' attribute open overlays -->
<script>

$(document).ready(function(){
	$("#exam").change(function(e){
		var year = $("#year");
		var month = $("#month");
		var day = $("#day");
		var exam = $("#exam");
		//$('#print').fadeIn();
		if (exam.val() != "") {
			var dt = year.val()+'-'+month.val()+'-'+day.val();
			exam = exam.val();
			//$(".doc_selected").html(exam +"<br/>"+dt);

			$.post(
				"./patient_result_list.php",
				{
					ExamID : exam,
					ResultDate : dt 
				},
				function(data){
					$(".error-text").fadeOut(000);
					$(".doc_selected").html(data);
				}
			);
		}
		else $(".error-text").text("Please Select Exam.");

	});
	
	$("#year").change(function(e){
		var year = $("#year");
		var month = $("#month");
		var day = $("#day");
		var exam = $("#exam");
		//$('#print').fadeIn();
		$(".day").load("./load_day.php?year=" + year.val() + "&month=" + month.val())
		if (exam.val() != "") {
			var dt = year.val()+'-'+month.val()+'-'+day.val();
			exam = exam.val();
			//$(".doc_selected").html(exam +"<br/>"+dt);

			$.post(
				"./patient_result_list.php",
				{
					ExamID : exam,
					ResultDate : dt 
				},
				function(data){
					$(".error-text").fadeOut(000);
					$(".doc_selected").html(data);
				}
			);
		}
		else $(".error-text").text("Please Select Exam.");

	});
	
	$("#month").change(function(e){
		var year = $("#year");
		var month = $("#month");
		var day = $("#day");
		var exam = $("#exam");
		//$('#print').fadeIn();
		$(".day").load("./load_day.php?year=" + year.val() + "&month=" + month.val())
		if (exam.val() != "") {
			var dt = year.val()+'-'+month.val()+'-'+day.val();
			exam = exam.val();
			//$(".doc_selected").html(exam +"<br/>"+dt);

			$.post(
				"./patient_result_list.php",
				{
					ExamID : exam,
					ResultDate : dt 
				},
				function(data){
					$(".error-text").fadeOut(000);
					$(".doc_selected").html(data);
				}
			);
		}
		else $(".error-text").text("Please Select Exam.");

	});
	
	$("#day").change(function(e){
		var year = $("#year");
		var month = $("#month");
		var day = $("#day");
		var exam = $("#exam");
		//$('#print').fadeIn();
		if (exam.val() != "") {
			var dt = year.val()+'-'+month.val()+'-'+day.val();
			exam = exam.val();
			//$(".doc_selected").html(exam +"<br/>"+dt);

			$.post(
				"./patient_result_list.php",
				{
					ExamID : exam,
					ResultDate : dt 
				},
				function(data){
					$(".error-text").fadeOut(000);
					$(".doc_selected").html(data);
				}
			);
		}
		else $(".error-text").text("Please Select Exam.");

	});
	
	$("#generate").click(function(e){
		var year = $("#year");
		var month = $("#month");
		var day = $("#day");
		var exam = $("#exam");
		//$('#print').fadeIn();
		if (exam.val() != "") {
			var dt = year.val()+'-'+month.val()+'-'+day.val();
			exam = exam.val();
			//$(".doc_selected").html(exam +"<br/>"+dt);
			$(".doc_selected").html("<img src='../images/loading.gif' />");
			$.post(
				"./patient_result_list.php",
				{
					ExamID : exam,
					ResultDate : dt 
				},
				function(data){
					$(".error-text").fadeOut(000);
					$(".doc_selected").html(data);
				}
			);
		}
		else $(".error-text").text("Please Select Exam.");

	});
	
	$("#print").click(function(){
		//window.html($(".table")).print();
		var divContent = $(".doc_selected").html();
		var printWindow = window.open('','','');
		printWindow.document.write("<html><body>");
		printWindow.document.write(divContent);
		printWindow.document.write("</body></html>");
		printWindow.document.close();
		printWindow.print();
	});	
	
	setTimeout(
		function(e){
			$("#generate").click();
		}, 1000
	);
});

</script>
</body>
</html>
