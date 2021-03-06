<?php
session_start();
require_once "../lib/db_function.php";
if("rcp" !== returnSingleField($sql="SELECT PostCode from sy_post WHERE PostID='{$_SESSION['user']['PostID']}'",$field="PostCode",$data=true, $con)){
	echo "<script>window.location='../logout.php';</script>";
	return;
}
set_time_limit(0);
//connect the SIS Additional Library
require_once "../plugins/sis_v1.0.php";
//var_dump($_POST);

include_once 'Sample_Header.php';
// New Word Document
//echo date('H:i:s'), ' Create new PhpWord object', EOL;
$phpWord = new \PhpOffice\PhpWord\PhpWord();

$phpWord->setDefaultFontName("Times New Roman");
$phpWord->setDefaultFontSize("9");
$page_margin = array("marginTop"=>20, 'marginLeft'=>20, 'marginRight'=>20, 'marginBottom'=>20);


$section = $phpWord->addSection($page_margin);

$header = array('size' => 12, 'bold' => true, 'color'=>'FFFFFF');
$header_small = array('size' => 9, 'bold' => true, 'color'=>'000000');
$font_small_8 = array('size' => 8, 'bold' => false, 'color'=>'000000');
$font_small_7 = array('size' => 7, 'bold' => false, 'color'=>'000000');
$font_small_8_bold = array('size' => 8, 'bold' => true, 'color'=>'000000');

$rows = 1; $cols = 2;
$table_width = 91 * 91;
$styleCell = array('valign' => 'center',"alignment"=> \PhpOffice\PhpWord\SimpleType\Jc::CENTER);
$fontStyle = array('bold' => true, 'size'=>14,"align"=>"center");
$simple_cell_style = array('bold' => false, 'size'=>9,"align"=>"left");
$simple_cell_style_bold = array('bold' => true, 'size'=>9,"align"=>"left");

$cellHCentered = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER);
 
$table = $section->addTable();
$table->addRow(1000, array('exactHeight' => true));
$table->addCell(200)->addImage('../images/rwanda.png', array('width'=>59, 'height'=>66));
$table->addCell(9800, $styleCell)->addText('Rapport Mensuel SIS du Centre de Sante/Dispensaire', $fontStyle);

$styleTable = array('borderSize' => 6, 'borderColor' => '006699', 'cellMargin' => 50, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER);
$styleFirstRow = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF', 'color'=>'FFFFFF', 'bgColor' => '000000');
$styleLastRow = array('borderBottomSize' => 6, 'borderBottomColor' => '000000', 'color'=>'FFFFFF', 'bgColor' => '000000');

$phpWord->addTableStyle('ID Table', $styleTable, $styleFirstRow);
$phpWord->addTableStyle('Process Table', $styleTable);

$table = $section->addTable("ID Table");
$table->addRow(300, array('exactHeight' => true));


$cellColSpan = array('gridSpan' => 4, 'valign' => 'center');
$cellHCentered = array('alignment' => 'left');
$cellVCentered = array('valign' => 'center');

$cell1 = $table->addCell(10000, $cellColSpan);
$textrun2 = $cell1->addTextRun($cellHCentered);
$textrun2->addText(htmlspecialchars('I. Identification et Remarques importantes', ENT_COMPAT, 'UTF-8'),$header);

//$table->addCell(10000)->addText(htmlspecialchars("", ENT_COMPAT, 'UTF-8'), $header);
$table->addRow(300,array('exactHeight'=>true));

/* 
$cellColSpan = array('gridSpan' => 4, 'valign' => 'center');
$cellHCentered = array('alignment' => 'left');
$cellVCentered = array('valign' => 'center');
 */
$cell1 = $table->addCell(10000, $cellColSpan);
$textrun2 = $cell1->addTextRun($cellHCentered);
$textrun2->addText(htmlspecialchars('A) Identification', ENT_COMPAT, 'UTF-8'));

$tbl_content = array(
	array(
		'size'=>300,
		'content'=>array(
			array('size'=>5000,'content'=>'1. Nom de la formation sanitaire'),
			array('size'=>2500,'content'=>$organisation),
			array('size'=>1500,'content'=>'5. Ann??e'),
			array('size'=>1000,'content'=>$_POST['year'])
		)
	),
	array(
		'size'=>300,
		'content'=>array(
			array('size'=>3000,'content'=>'2. Population totale de la zone de rayonnement'),
			array('size'=>2500,'content'=>''),
			array('size'=>1500,'content'=>'6. Mois'),
			array('size'=>1000,'content'=>$_POST['month'])
		)
	),
	array(
		'size'=>300,
		'content'=>array(
			array('size'=>3000,'content'=>'3. Province'),
			array('size'=>2500,'content'=>$_PROVINCE),
			array('size'=>1500,'content'=>'7. Secteur'),
			array('size'=>1000,'content'=>$_SECTOR)
		)
	),
	array(
		'size'=>300,
		'content'=>array(
			array('size'=>3000,'content'=>'4. District'),
			array('size'=>2500,'content'=>$_DISTRICT),
			array('size'=>1500,'content'=>'8. Cellule'),
			array('size'=>1000,'content'=>$_CELL)
		)
	)
);

foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		$table->addCell($cell_prop['size'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'));
	}
}

$section->addTextBreak(1);

$table = $section->addTable("Process Table");
/* 
$table->addRow(300, array('exactHeight' => true));
 */
$cellColSpan = array('gridSpan' => 4, 'valign' => 'center');
$cellHCentered = array('alignment' => 'left');
$cellVCentered = array('valign' => 'center');
/* 
$cell1 = $table->addCell(10000, $cellColSpan);
$textrun2 = $cell1->addTextRun($cellHCentered);
$textrun2->addText(htmlspecialchars('I. Identification et Remarques importantes', ENT_COMPAT, 'UTF-8'),$header);
 */
//$table->addCell(10000)->addText(htmlspecialchars("", ENT_COMPAT, 'UTF-8'), $header);
$table->addRow(300,array('exactHeight'=>true));

/* 
$cellColSpan = array('gridSpan' => 4, 'valign' => 'center');
$cellHCentered = array('alignment' => 'left');
$cellVCentered = array('valign' => 'center');
 */
$cell1 = $table->addCell($table_width, $cellColSpan);
$textrun2 = $cell1->addTextRun($cellHCentered);
$textrun2->addText(htmlspecialchars('B) Processus de validation et de transmission du rapport', ENT_COMPAT, 'UTF-8'),$header_small);

$tbl_content = array(
	array(
		'size'=>300,
		'content'=>array(
			array('size'=>($table_width * 0.2),'content'=>'1. Nom du responsable'),
			array('size'=>($table_width * 0.3),'content'=>$organisation_represantative ),
			array('size'=>($table_width * 0.2),'content'=>'5. Date de r??ception'),
			array('size'=>($table_width * 0.3),'content'=>'')
		)
	),
	array(
		'size'=>300,
		'content'=>array(
			array('size'=>($table_width * 0.2),'content'=>'2. Qualification'),
			array('size'=>($table_width * 0.3),'content'=>$organisation_represantative_degree ),
			array('size'=>($table_width * 0.2),'content'=>'6. Nom'),
			array('size'=>($table_width * 0.3),'content'=>'')
		)
	),
	array(
		'size'=>300,
		'content'=>array(
			array('size'=>($table_width * 0.2),'content'=>'3. Date d???envoi'),
			array('size'=>($table_width * 0.3),'content'=>''),
			array('size'=>($table_width * 0.2),'content'=>'7. Signature'),
			array('size'=>($table_width * 0.3),'content'=>'')
		)
	),
	array(
		'size'=>300,
		'content'=>array(
			array('size'=>($table_width * 0.3),'content'=>'4. Signature'),
			array('size'=>($table_width * 0.2),'content'=>''),
			array('size'=>($table_width * 0.3),'content'=>'8. Date d???encodage dans RHMIS'),
			array('size'=>($table_width * 0.2),'content'=>'')
		)
	)
);

foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		$table->addCell($cell_prop['size'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'));
	}
}

$section->addTextBreak(1);

$table = $section->addTable("ID Table");
/* 
$table->addRow(300, array('exactHeight' => true));
 */
$cellColSpan = array('gridSpan' => 4, 'valign' => 'center');
$cellHCentered = array('alignment' => 'left');
$cellVCentered = array('valign' => 'center');
/* 
$cell1 = $table->addCell(10000, $cellColSpan);
$textrun2 = $cell1->addTextRun($cellHCentered);
$textrun2->addText(htmlspecialchars('I. Identification et Remarques importantes', ENT_COMPAT, 'UTF-8'),$header);
 */
//$table->addCell(10000)->addText(htmlspecialchars("", ENT_COMPAT, 'UTF-8'), $header);
$table->addRow(300,array('exactHeight'=>true));

$cellColSpan = array('gridSpan' => 10, 'valign' => 'center');
$cellColSpanInner = array('gridSpan' => 7, 'valign' => 'center');
$cellColSpanInner2 = array('gridSpan' => 2, 'valign' => 'center');
$cellColSpanInner3 = array('gridSpan' => 3, 'valign' => 'center');
$cellColSpanInner4 = array('gridSpan' => 4, 'valign' => 'center');
$cellColSpanInner5 = array('gridSpan' => 5, 'valign' => 'center');
$cellColSpanInner6 = array('gridSpan' => 6, 'valign' => 'center');
$cellColSpanInner7 = array('gridSpan' => 7, 'valign' => 'center');
$cellColSpanInner8 = array('gridSpan' => 8, 'valign' => 'center');
$cellColSpanInner9 = array('gridSpan' => 9, 'valign' => 'center');
$cellColSpanInner10 = array('gridSpan' => 10, 'valign' => 'center');
$cellColSpanInner11 = array('gridSpan' => 11, 'valign' => 'center');
$cellColSpanInner12 = array('gridSpan' => 12, 'valign' => 'center');
$cellColSpanInner13 = array('gridSpan' => 13, 'valign' => 'center');
$cellColSpanInner15 = array('gridSpan' => 15, 'valign' => 'center');
$cellColSpanInner18 = array('gridSpan' => 18, 'valign' => 'center');
$cellColSpanInner21 = array('gridSpan' => 21, 'valign' => 'center');
$nocellColSpanInner = array('gridSpan' => 1, 'valign' => 'center');

$cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center', 'bgColor' => 'FFFFFF');
$cellRowSpanColSpanInner2 = array('vMerge' => 'restart', 'gridSpan'=>2, 'valign' => 'center', 'bgColor' => 'FFFFFF');
$cellRowSpanColSpanInner3 = array('vMerge' => 'restart', 'gridSpan'=>3, 'valign' => 'center', 'bgColor' => 'FFFFFF');
$cellRowContinue = array('vMerge' => 'continue');
$cellRowContinueColSpanInner2 = array('vMerge' => 'continue', 'gridSpan'=>2);
$cellRowContinueColSpanInner3 = array('vMerge' => 'continue', 'gridSpan'=>3);
/* 
$cellHCentered = array('alignment' => 'left');
$cellVCentered = array('valign' => 'center');
 */
$cell1 = $table->addCell($table_width, $cellColSpan);
$textrun2 = $cell1->addTextRun($cellHCentered);
$textrun2->addText(htmlspecialchars('II. Consultations Externes', ENT_COMPAT, 'UTF-8'), $header);


$withBorder = array('valign' => 'top', 'borderSize' => 6, 'borderColor' => '000000');
$withBorderBottomOnly = array('valign' => 'top', 'borderSize'=>0, 'borderBottomSize' => 6, 'borderColor'=>'FFFFFF','borderBottomColor' => '000000');
$noBorder = array('valign' => 'top', 'borderSize' => 0, 'borderColor' => 'FFFFFF');
$tbl_content = array(
	array(
		'size'=>300,
		'content'=>array(
			array(
				'size'=>($table_width * 0.5),
				'content'=>'A) Tableau synth??tique: Consultations externes',
				'format'=>$withBorder,
				'colspan'=>$cellColSpanInner,
				'rowspan'=>null,
				'font'=>$header_small
			),
			array(
				'size'=>($table_width * 0.01),
				'content'=>'',
				'format'=>$noBorder,
				'colspan'=>null,
				'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.4),
				'content'=>'B) Assurance maladies pour nouveaux cas',
				'format'=>$withBorder,
				'colspan'=>$nocellColSpanInner,
				'rowspan'=>null,
				'font'=>$header_small
			),
			array(
				'size'=>($table_width * 0.09),
				'content'=>'Total',
				'format'=>$withBorder,
				'colspan'=>$nocellColSpanInner,
				'rowspan'=>null
			)
		)
	) ,
	array(
		'size'=>300,
		'content'=>array(
			array(
				'size'=>($table_width * 0.2),
				'content'=>'',
				'format'=>$withBorder,
				'colspan'=>$nocellColSpanInner,
				'rowspan'=>$cellRowSpan
			),
			array(
				'size'=>($table_width * 0.1),
				'content'=>'<5 ans',
				'format'=>$withBorder,
				'colspan'=>$cellColSpanInner2,
				'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.1),
				'content'=>'5 - 19 ans',
				'format'=>$withBorder,
				'colspan'=>$cellColSpanInner2,
				'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.1),
				'content'=>'???20 ans',
				'format'=>$withBorder,
				'colspan'=>$cellColSpanInner2,
				'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.01),
				'content'=>'',
				'format'=>$noBorder,
				'colspan'=>null,
				'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.4),
				'content'=>'1. Assur??s  (Mutuelle ou autres assurances)',
				'format'=>$withBorder,
				'colspan'=>null,
				'rowspan'=>$cellRowSpan
			),
			array(
				'size'=>($table_width * 0.09),
				'content'=>$insured_current_patient ,
				'format'=>$withBorder,
				'colspan'=>null,
				'rowspan'=>$cellRowSpan
			)
		)
	),
	array(
		'size'=>300,
		'content'=>array(
			array(
				'size'=>null,
				'rowspan'=>$cellRowContinue,
			),
			array(
				'size'=>($table_width * 0.05),
				'content'=>'M',
				'format'=>$withBorder,
				'colspan'=>null,
				'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.05),
				'content'=>'F',
				'format'=>$withBorder,
				'colspan'=>null,
				'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.05),
				'content'=>'M',
				'format'=>$withBorder,
				'colspan'=>null,
				'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.05),
				'content'=>'F',
				'format'=>$withBorder,
				'colspan'=>null,
				'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.05),
				'content'=>'M',
				'format'=>$withBorder,
				'colspan'=>null,
				'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.05),
				'content'=>'F',
				'format'=>$withBorder,
				'colspan'=>null,
				'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.01),
				'content'=>'',
				'format'=>$noBorder,
				'colspan'=>null,
				'rowspan'=>null
			),
			array(
				'size'=>null,
				'rowspan'=>$cellRowContinue,
			),
			array(
				'size'=>null,
				'rowspan'=>$cellRowContinue,
			)
		)
	) ,
	array(
		'size'=>300,
		'content'=>array(
			array(
				'size'=>($table_width * 0.2),
				'content'=>'1. Nouveaux cas',
				'format'=>$withBorder,
				'colspan'=>$nocellColSpanInner,
				'rowspan'=>$cellRowSpan
			),
			array(
				'size'=>($table_width * 0.05),
				'content'=>$maleLessThan5YearWithConsultation,
				'format'=>$withBorder,
				'colspan'=>null,
				'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.05),
				'content'=>$femaleLessThan5YearWithConsultation,
				'format'=>$withBorder,
				'colspan'=>null,
				'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.05),
				'content'=>$malebetween5and19WithConsultation,
				'format'=>$withBorder,
				'colspan'=>null,
				'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.05),
				'content'=>$femalebetween5and19WithConsultation,
				'format'=>$withBorder,
				'colspan'=>null,
				'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.05),
				'content'=>$maleGreateThan20WithConsultation,
				'format'=>$withBorder,
				'colspan'=>null,
				'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.05),
				'content'=>$femaleGreateThan20WithConsultation,
				'format'=>$withBorder,
				'colspan'=>null,
				'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.01),
				'content'=>'',
				'format'=>$noBorder,
				'colspan'=>null,
				'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.4),
				'content'=>'2. Nouveaux cas non-payant',
				'format'=>$withBorder,
				'colspan'=>null,
				'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.09),
				'content'=>$uninsured_current_patient,
				'format'=>$withBorder,
				'colspan'=>null,
				'rowspan'=>null
			)
		)
	) ,
	array(
		'size'=>300,
		'content'=>array(
			array(
				'size'=>($table_width * 0.2),
				'content'=>'2. Ancien cas',
				'format'=>$withBorder,
				'colspan'=>$nocellColSpanInner,
				'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.05),
				'content'=>$maleLessThan5YearWithoutConsultation,
				'format'=>$withBorder,
				'colspan'=>null,
				'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.05),
				'content'=>$femaleLessThan5YearWithoutConsultation,
				'format'=>$withBorder,
				'colspan'=>null,
				'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.05),
				'content'=>$malebetween5and19WithoutConsultation,
				'format'=>$withBorder,
				'colspan'=>null,
				'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.05),
				'content'=>$femalebetween5and19WithoutConsultation,
				'format'=>$withBorder,
				'colspan'=>null,
				'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.05),
				'content'=>$maleGreateThan20WithoutConsultation,
				'format'=>$withBorder,
				'colspan'=>null,
				'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.05),
				'content'=>$femaleGreateThan20WithoutConsultation,
				'format'=>$withBorder,
				'colspan'=>null,
				'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.01),
				'content'=>'',
				'format'=>$noBorder,
				'colspan'=>null,
				'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.4),
				'content'=>'3. Nombre d???indigents parmi les non payants ',
				'format'=>$withBorder,
				'colspan'=>null,
				'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.09),
				'content'=>$indigent_uninsured_current_patient,
				'format'=>$withBorder,
				'colspan'=>null,
				'rowspan'=>null
			)
		)
	) 
);

foreach($tbl_content as $row_prop){
	//var_dump($row_prop);
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'));
	}
}

$section->addTextBreak(1);

$table = $section->addTable("Process Table");
/* 
$table->addRow(300, array('exactHeight' => true));
 */
$cellColSpan = array('gridSpan' => 4, 'valign' => 'center');
$cellHCentered = array('alignment' => 'left');
$cellVCentered = array('valign' => 'center');

$tbl_content = array(
	array(
		'size'=>300,
		'content'=>array(
			array('size'=>($table_width * 0.4),'content'=>'C) Transferts','font'=>$header_small),
			array('size'=>($table_width * 0.1),'content'=>'Total','font'=>null),
			array('size'=>($table_width * 0.01),'content'=>'','font'=>null,'format'=>$noBorder),
			array('size'=>($table_width * 0.4),'content'=>'D) Origine des Patients Ambulatoires (OPD)','font'=>$header_small),
			array('size'=>($table_width * 0.09),'content'=>'Total','font'=>null)
		)
	), 
	array(
		'size'=>300,
		'content'=>array(
			array('size'=>($table_width * 0.4),'content'=>'1. R??f??r??s ?? l???h??pital','font'=>null),
			array('size'=>($table_width * 0.1),'content'=>$transferts,'font'=>null),
			array('size'=>($table_width * 0.01),'content'=>'','font'=>null,'format'=>$noBorder),
			array('size'=>($table_width * 0.4),'content'=>'1. Nouveaux cas de la zone de Rayonnement (zone)','font'=>null),
			array('size'=>($table_width * 0.09),'content'=>$patient_zone,'font'=>null)
		)
	), 
	array(
		'size'=>300,
		'content'=>array(
			array('size'=>($table_width * 0.4),'content'=>'2. Contres r??f??r??s re??ues','font'=>null),
			array('size'=>($table_width * 0.1),'content'=>'','font'=>null),
			array('size'=>($table_width * 0.01),'content'=>'','font'=>null,'format'=>$noBorder),
			array('size'=>($table_width * 0.4),'content'=>'2. Nouveaux cas (hors zone)','font'=>null),
			array('size'=>($table_width * 0.09),'content'=>$patient_hors_zone,'font'=>null)
		)
	), 
	array(
		'size'=>300,
		'content'=>array(
			array('size'=>($table_width * 0.4),'content'=>'3. Adultes R??f??r?? par CHW','font'=>null),
			array('size'=>($table_width * 0.1),'content'=>'','font'=>null),
			array('size'=>($table_width * 0.01),'content'=>'','font'=>null,'format'=>$noBorder),
			array('size'=>($table_width * 0.4),'content'=>'3. Patients ??trangers (hors pays)','font'=>null),
			array('size'=>($table_width * 0.09),'content'=>'','font'=>null)
		)
	), 
	array(
		'size'=>300,
		'content'=>array(
			array('size'=>($table_width * 0.4),'content'=>'4. Enfants de  < 5 ans R??f??r??s par CHW','font'=>null),
			array('size'=>($table_width * 0.1),'content'=>'','font'=>null),
			array('size'=>($table_width * 0.01),'content'=>'','font'=>null,'format'=>$noBorder),
			array('size'=>($table_width * 0.4),'content'=>'','font'=>null),
			array('size'=>($table_width * 0.09),'content'=>'','font'=>null)
		)
	)
);

foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		$table->addCell($cell_prop['size'],@$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'),$cell_prop['font']);
	}
}
//goto end_try;
$section->addTextBreak(1);
//select all diagnostic in new case of deases
$new_case = returnAllDataInTable($tbl="co_diagnostic",$con, $condition = "WHERE DiagnosticCategoryID='1' && DiagnosticCode = '' ORDER BY DiagnosticID ASC");
//echo "<pre>";
NCMNoPECIME($new_case,$con); //die();
//var_dump($new_case); die;
$tbl_content = array(
					array(
						'size'=>300,
						'content'=>array(
										array('size'=>($table_width * 0.8),'content'=>'E) Nouveaux cas de maladies (Consultation pour enfants < 5 ans voir PECIME)','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner3, 'rowspan'=>null),
										array('size'=>($table_width * 0.1),'content'=>'5 - 19 ans','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null),
										array('size'=>($table_width * 0.1),'content'=>'??? 20 ans','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null)
										)
						)
					);

//var_dump($new_case);
$sex = array("Female"=>"F","Male"=>"M");
$row_size = 300;
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.05),'content'=>'#','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.65),'content'=>'Diagnostique','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.1),'content'=>'ICD-10','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
										)
						);
for($i=0;$i<count($new_case);$i++){
	$tbl_content[] = array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.05),'content'=>($i+1),'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.65),'content'=>$new_case[$i]['DiagnosticName'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.1),'content'=>$new_case[$i]['Code'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['M5_19'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['F5_19'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['M20'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['F20'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
										)
							);
}

$table = $section->addTable("Process Table");
foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'));
	}
}

$section->addTextBreak(1);
//select all diagnostic in new case of deases
$new_case = returnAllDataInTable($tbl="co_diagnostic",$con, $condition = "WHERE DiagnosticCategoryID='2' && DiagnosticCode = '' ORDER BY DiagnosticID ASC");
//var_dump($new_case);
$tbl_content = array(
					array(
						'size'=>300,
						'content'=>array(
										array('size'=>($table_width * 0.8),'content'=>'F) Nouveaux cas de VIH/SIDA/TB et maladies non-transmissibles (pour < 5 ans voir PECIME)','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner3, 'rowspan'=>null),
										array('size'=>($table_width * 0.1),'content'=>'5 - 19 ans','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null),
										array('size'=>($table_width * 0.1),'content'=>'??? 20 ans','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null)
										)
						)
					);

//var_dump($new_case);
$sex = array("Female"=>"F","Male"=>"M");
$row_size = 300;
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.05),'content'=>'#','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.65),'content'=>'Diagnostique','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.1),'content'=>'ICD-10','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
										)
						);
for($i=0;$i<count($new_case);$i++){
	$tbl_content[] = array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.05),'content'=>($i+1),'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.65),'content'=>$new_case[$i]['DiagnosticName'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.1),'content'=>$new_case[$i]['Code'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.05),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.05),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.05),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.05),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
										)
							);
}

$table = $section->addTable("Process Table");
foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'));
	}
}

$cellHCentered = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER);

$section->addTextBreak(1);
//select all diagnostic in new case of deases
$new_case = returnAllDataInTable($tbl="co_diagnostic",$con, $condition = "WHERE DiagnosticCategoryID='3' && DiagnosticCode = '' ORDER BY DiagnosticID ASC");

MOO($new_case,$con);
//var_dump($new_case);
$tbl_content = array(
					array(
						'size'=>300,
						'content'=>array(
										array('size'=>($table_width * 0.6),'content'=>' G) Les Maladies Oculaires et Orales','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner3, 'rowspan'=>null),
										array('size'=>($table_width * 0.4),'content'=>'Nouveaux cas','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner6, 'rowspan'=>null, 'align'=>$cellHCentered)
										)
						)
					);

//var_dump($new_case);
$sex = array("Female"=>"F","Male"=>"M");

$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.05),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.5),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.05),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.13),'content'=>'0 - 19 ans','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.13),'content'=>'20 - 39 ans','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.14),'content'=>'??? 40 ans','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered)
										)
						);
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.05),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.5),'content'=>'Condition M??dicale','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'ICD-10','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.065),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.065),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.065),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.065),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.07),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.07),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered)
										)
						);
for($i=0;$i<count($new_case);$i++){
	$tbl_content[] = array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.05),'content'=>($i+1),'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.45),'content'=>$new_case[$i]['DiagnosticName'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.1),'content'=>$new_case[$i]['Code'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.065),'content'=>$new_case[$i]['M0_19'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.065),'content'=>$new_case[$i]['F0_19'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.065),'content'=>$new_case[$i]['M20_39'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.065),'content'=>$new_case[$i]['F20_39'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.07),'content'=>$new_case[$i]['M40'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.07),'content'=>$new_case[$i]['F40'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
										)
							);
}

$table = $section->addTable("Process Table");
foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
	}
}


$section->addTextBreak(1);
//select all diagnostic in new case of deases
$new_case = returnAllDataInTable($tbl="co_diagnostic",$con, $condition = "WHERE DiagnosticCategoryID='4' && DiagnosticCode = '' ORDER BY DiagnosticID ASC");
PECIME($new_case, $con);
//var_dump($new_case);

$table = $section->addTable("ID Table");
$table->addRow($row_size , array('exactHeight'=>true));
$cell1 = $table->addCell($table_width * 1, $cellColSpanInner5);
$textrun2 = $cell1->addTextRun(array("alignment"=>"left"));
$textrun2->addText(htmlspecialchars('III. Prise en charge int??gr??e des maladies de l???enfance (PECIME < 5 ans) :', ENT_COMPAT, 'UTF-8'), $header);

//var_dump($new_case);
$sex = array("Female"=>"F","Male"=>"M");

$tbl_content = array(
						array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.61),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null),
											array('size'=>($table_width * 0.12),'content'=>'0 - 7 Jours','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.14),'content'=>'8 jours - 2 Mois','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.13),'content'=>'> 2 - 59 Mois','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered)
										)
						)
					);
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.61),'content'=>'A) Enfants trait??s selon le protocole PCIME','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null),
										array('size'=>($table_width * 0.12),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.14),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.13),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered)
										)
						);
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.61),'content'=>'B) Nombre d???enfants < 5 vis??s par les ASC','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null),
										array('size'=>($table_width * 0.12),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.14),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.13),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered)
										)
						);
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.61),'content'=>'C) Les enfants ayant de la fi??vre  ??? 37,5 ??C','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null),
										array('size'=>($table_width * 0.12),'content'=>$enfant0_7jour,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.14),'content'=>$enfant8_2Mois,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.13),'content'=>$enfant2_59Mois,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered)
										)
						);
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 1),'content'=>'Diagnostic','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner5, 'rowspan'=>null)
										)
						);

for($i=0;$i<count($new_case);$i++){
	$tbl_content[] = array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.03),'content'=>($i+1),'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.58),'content'=>$new_case[$i]['DiagnosticName'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.12),'content'=>$new_case[$i]['E0_7'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.14),'content'=>$new_case[$i]['E8_2'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.13),'content'=>$new_case[$i]['E2_59'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
										)
							);
}

$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 1),'content'=>'Autres pathologies :','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner5, 'rowspan'=>null)
									)
						);
$new_case = returnAllDataInTable($tbl="co_diagnostic",$con, $condition = "WHERE DiagnosticCategoryID='5' && DiagnosticCode = '' ORDER BY DiagnosticID ASC");
PECIME($new_case, $con);
for($k=0;$k<count($new_case);$k++){
	$tbl_content[] = array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.03),'content'=>(++$i),'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.58),'content'=>$new_case[$k]['DiagnosticName'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.12),'content'=>$new_case[$k]['E0_7'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.14),'content'=>$new_case[$k]['E8_2'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.13),'content'=>$new_case[$k]['E2_59'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
										)
							);
}

foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),$cell_prop['font'],@$cell_prop['align']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
	}
}

$section->addTextBreak(1);
//select all diagnostic in new case of deases
$new_case = returnAllDataInTable($tbl="co_diagnostic",$con, $condition = "WHERE DiagnosticCategoryID='6' && DiagnosticCode = '' ORDER BY DiagnosticID ASC");
//var_dump($new_case);
SM($new_case, $con);

$table = $section->addTable("ID Table");
$table->addRow($row_size , array('exactHeight'=>true));
$cell1 = $table->addCell($table_width * 1, $cellColSpanInner15);
$textrun2 = $cell1->addTextRun(array("alignment"=>"left"));
$textrun2->addText(htmlspecialchars('IV. Sant?? Mentale', ENT_COMPAT, 'UTF-8'), $header);

//var_dump($new_case);
$sex = array("Female"=>"F","Male"=>"M");

$tbl_content = array(
						array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.03),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.27),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.1),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.25),'content'=>'Nouveaux cas','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner6, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.25),'content'=>'Anciens cas','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner6, 'rowspan'=>null,'align'=>$cellHCentered)
										)
						)
					);
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.03),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.27),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'Age','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.1),'content'=>'0 - 19','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'20 - 39','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'??? 40','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'0 - 19','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'20 - 39','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'??? 40','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered)
										)
						);
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.03),'content'=>'','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.27),'content'=>'Diagnostique','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'ICD-10','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered)
										)
						);
//
for($i=0;$i<count($new_case);$i++){
	$tbl_content[] = array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.03),'content'=>($i+1),'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.27),'content'=>$new_case[$i]['DiagnosticName'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.1),'content'=>$new_case[$i]['Code'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['NM0_19'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['NF0_19'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['NM20_39'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['NF20_39'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['NM40'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['NF40'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['AM0_19'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['AF0_19'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['AM20_39'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['AF20_39'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['AM40'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['AF40'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered)
										)
							);
}
 
foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),$cell_prop['font'],@$cell_prop['align']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
	}
}

$section->addTextBreak(1);
//select all diagnostic in new case of deases
$new_case = returnAllDataInTable($tbl="co_diagnostic",$con, $condition = "WHERE DiagnosticCategoryID='7' && DiagnosticCode = '' ORDER BY DiagnosticID ASC");
//var_dump($new_case);
MC($new_case,$con);

$table = $section->addTable("ID Table");
$table->addRow($row_size , array('exactHeight'=>true));
$cell1 = $table->addCell($table_width * 1, $cellColSpanInner21);
$textrun2 = $cell1->addTextRun(array("alignment"=>"left"));
$textrun2->addText(htmlspecialchars('V. Maladies chroniques', ENT_COMPAT, 'UTF-8'), $header);

//var_dump($new_case);
$sex = array("Female"=>"F","Male"=>"M");

$tbl_content = array(
						array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.03),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.27),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.1),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.25),'content'=>'Nouveaux cas','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner6, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.25),'content'=>'Anciens cas','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner6, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.25),'content'=>'D??c??s','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner6, 'rowspan'=>null,'align'=>$cellHCentered)
										)
						)
					);
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.03),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.27),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'Age','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.1),'content'=>'0 - 19','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'20 - 39','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'??? 40','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'0 - 19','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'20 - 39','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'??? 40','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'0 - 19','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'20 - 39','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'??? 40','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered)
										)
						);
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.03),'content'=>'','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.27),'content'=>'Diagnostique','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'ICD-10','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered)
										)
						);
//
for($i=0;$i<count($new_case);$i++){
	$tbl_content[] = array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.03),'content'=>($i+1),'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.27),'content'=>$new_case[$i]['DiagnosticName'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.1),'content'=>$new_case[$i]['Code'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['NM0_19'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['NF0_19'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['NM20_39'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['NF20_39'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['NM40'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['NF40'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['AM0_19'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['AF0_19'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['AM20_39'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['AF20_39'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['AM40'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['AF40'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['DM0_19'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['DF0_19'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['DM20_39'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['DF20_39'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['DM40'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['DF40'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered)
										)
							);
}
 
foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),$cell_prop['font'],@$cell_prop['align']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
	}
}

/******************************************************************************************/
$section->addTextBreak(1);
//select all diagnostic in new case of deases
$new_case = returnAllDataInTable($tbl="co_diagnostic",$con, $condition = "WHERE DiagnosticCategoryID='8' && DiagnosticCode = '' ORDER BY DiagnosticID ASC");
//var_dump($new_case);
AMCR($new_case, $con);
$table = $section->addTable("ID Table");
$table->addRow($row_size , array('exactHeight'=>true));
$cell1 = $table->addCell($table_width * 1, $cellColSpanInner15);
$textrun2 = $cell1->addTextRun(array("alignment"=>"left"));
$textrun2->addText(htmlspecialchars('VI. Autres Maladies Cardiovasculaires et R??nale', ENT_COMPAT, 'UTF-8'), $header);

//var_dump($new_case);
$sex = array("Female"=>"F","Male"=>"M");

$tbl_content = array(
						array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.03),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.27),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.1),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.3),'content'=>'Nouveaux cas','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner6, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.3),'content'=>'D??c??s','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner6, 'rowspan'=>null,'align'=>$cellHCentered)
										)
						)
					);
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.03),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.27),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'Age','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.1),'content'=>'0 - 19','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'20 - 39','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'??? 40','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'0 - 19','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'20 - 39','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'??? 40','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered)
										)
						);
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.03),'content'=>'','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.27),'content'=>'Medical condition','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'ICD-10','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered)
										)
						);
//
for($i=0;$i<count($new_case);$i++){
	$tbl_content[] = array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.03),'content'=>($i+1),'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.27),'content'=>$new_case[$i]['DiagnosticName'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.1),'content'=>$new_case[$i]['Code'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['NM0_19'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['NF0_19'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['NM20_39'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['NF20_39'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['NM40'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['NF40'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['DM0_19'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['DF0_19'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['DM20_39'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['DF20_39'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['DM40'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['DF40'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered)
										)
							);
}
 
foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),$cell_prop['font'],@$cell_prop['align']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
	}
}


/******************************************************************************************/
$section->addTextBreak(1);
//select all diagnostic in new case of deases
$new_case = returnAllDataInTable($tbl="co_diagnostic",$con, $condition = "WHERE DiagnosticCategoryID='9' ORDER BY DiagnosticID ASC");
//var_dump($new_case);
B($new_case, $con);

$table = $section->addTable("ID Table");
$table->addRow($row_size , array('exactHeight'=>true));
$cell1 = $table->addCell($table_width * 1, $cellColSpanInner15);
$textrun2 = $cell1->addTextRun(array("alignment"=>"left"));
$textrun2->addText(htmlspecialchars('VII. Blessures (Injuries)', ENT_COMPAT, 'UTF-8'), $header);

//var_dump($new_case);
$sex = array("Female"=>"F","Male"=>"M");

$tbl_content = array(
						array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.03),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.27),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.1),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.3),'content'=>'Nouveaux cas','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner6, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.3),'content'=>'D??c??s','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner6, 'rowspan'=>null,'align'=>$cellHCentered)
										)
						)
					);
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.03),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.27),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'Age','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.1),'content'=>'0 - 19','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'20 - 39','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'??? 40','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'0 - 19','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'20 - 39','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'??? 40','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered)
										)
						);
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.03),'content'=>'','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.27),'content'=>'Cause de Blessures','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.1),'content'=>'ICD-10','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered)
										)
						);
//
for($i=0;$i<count($new_case);$i++){
	$tbl_content[] = array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.03),'content'=>($i+1),'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.27),'content'=>$new_case[$i]['DiagnosticName'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.1),'content'=>$new_case[$i]['Code'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['NM0_19'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['NF0_19'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['NM20_39'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['NF20_39'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['NM40'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['NF40'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['DM0_19'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['DF0_19'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['DM20_39'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['DF20_39'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['DM40'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['DF40'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered)
										)
							);
}
 
foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),$cell_prop['font'],@$cell_prop['align']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
	}
}



/******************************************************************************************/
//$section->addTextBreak(3);
$section->addPageBreak();
//select all diagnostic in new case of deases
$new_case = array(
"Maladie Cardiovasculaire",
"Maladie chronique des voies respiratoires",
"Diab??te",
"Insuffisance r??nale",
"Cancer",
"Handicap (Disability)"
);
//var_dump($new_case);

$table = $section->addTable("ID Table");
$table->addRow($row_size , array('exactHeight'=>true));
$cell1 = $table->addCell($table_width * 1, $cellColSpanInner3);
$textrun2 = $cell1->addTextRun(array("alignment"=>"left"));
$textrun2->addText(htmlspecialchars('VIII.	(Checkup) D??pistage de la population', ENT_COMPAT, 'UTF-8'), $header);

//var_dump($new_case);
$sex = array("Female"=>"F","Male"=>"M");

$tbl_content = array(
						array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.03),'content'=>'1','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.87),'content'=>'Nombre total de personnes qui ont consult?? pour l???examen m??dical de checkup annuel pendant la p??riode de rapportage','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.1),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										)
						)
					);
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.03),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.87),'content'=>'Personnes suspect??es comme positives pour checkup qui sont r??f??r??es pour diagnostique approfondi :','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered)
										
										)
						);
//

for($i=0;$i<count($new_case);$i++){
	$tbl_content[] = array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.03),'content'=>($i+2),'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.87),'content'=>$new_case[$i],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.1),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										)
							);
}
 
foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),$cell_prop['font'],@$cell_prop['align']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
	}
}



/******************************************************************************************/
$section->addTextBreak(1);
//$section->addPageBreak();
//select all diagnostic in new case of deases
$new_case = array(
"Les femmes d??pist??es pour le cancer cervical",
"Les femmes test??es VIA positif pendant le d??pistage du cancer du col ut??rin",
"Les femmes test??es VIA positif et trait??es par cryoth??rapie",
"Les femmes test??es VIA positif et envoy??s pour traitement",
"Les femmes d??pist??es pour le cancer du Sein",
"Les femmes r??f??r??es pour le cancer du Sein",
"Biopsies recueillies pour tous les types de cancer"
);
//var_dump($new_case);

$table = $section->addTable("ID Table");
$table->addRow($row_size , array('exactHeight'=>true));
$cell1 = $table->addCell($table_width * 1, $cellColSpanInner3);
$textrun2 = $cell1->addTextRun(array("alignment"=>"left"));
$textrun2->addText(htmlspecialchars('IX. (Screening) D??pistage du Cancer ', ENT_COMPAT, 'UTF-8'), $header);

//var_dump($new_case);
$sex = array("Female"=>"F","Male"=>"M");

$tbl_content = array();
//

for($i=0;$i<count($new_case);$i++){
	$tbl_content[] = array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.03),'content'=>($i+2),'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.87),'content'=>$new_case[$i],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.1),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										)
							);
}
 
foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),$cell_prop['font'],@$cell_prop['align']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
	}
}


/**********************************************************************************/
$section->addTextBreak(1);
$table = $section->addTable("ID Table");

$table->addRow(300,array('exactHeight'=>true));
$cell1 = $table->addCell($table_width, $cellColSpanInner6);
$textrun2 = $cell1->addTextRun(array("alignment"=>"left"));
$textrun2->addText(htmlspecialchars('X.	Hospitalisations', ENT_COMPAT, 'UTF-8'), $header);

$tbl_content = array(
	array(
		'size'=>300,
		'content'=>array(
			array('size'=>($table_width * 0.3), 'content'=>'A) Pr??sents d??but du mois', 'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null, 'font'=>null
			),
			array(
				'size'=>($table_width * 0.1), 'content'=>'', 'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.01), 'content'=>'', 'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.49), 'content'=>'E) Nombre de lits', 'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan, 'font'=>null
			),
			array(
				'size'=>($table_width * 0.1), 'content'=>'', 'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan, 'font'=>null
			)
		)
	) ,
	array(
		'size'=>300,
		'content'=>array(
			array('size'=>($table_width * 0.4), 'content'=>'B) Entrants du mois', 'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null, 'font'=>null
			),
			array(
				'size'=>($table_width * 0.1), 'content'=>'', 'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.01), 'content'=>'', 'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>null
			),
			array(
				'size'=>null, 'rowspan'=>$cellRowContinue
			),
			array(
				'size'=>null, 'rowspan'=>$cellRowContinue
			)
		)
	) ,
	array(
		'size'=>300,
		'content'=>array(
			array('size'=>($table_width * 0.3), 'content'=>'C) Sortants du mois', 'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null, 'font'=>null
			),
			array(
				'size'=>($table_width * 0.1), 'content'=>'', 'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.01), 'content'=>'', 'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.49), 'content'=>'F) Entrants membres d???une assurance', 'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan, 'font'=>null
			),
			array(
				'size'=>($table_width * 0.1), 'content'=>'', 'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null
			)
		)
	) ,
	array(
		'size'=>500,
		'content'=>array(
			array('size'=>($table_width * 0.05), 'content'=>'Dont', 'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan, 'font'=>null
			),
			array(
				'size'=>($table_width * 0.25), 'content'=>'1. Gu??ris', 'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.1), 'content'=>'', 'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.01), 'content'=>'', 'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.49), 'content'=>'G) Nombre de jours d???hospitalisation potentielle (Lits x jours du mois en cours)', 'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'font'=>null
			),
			array(
				'size'=>($table_width * 0.1), 'content'=>'', 'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null
			)
		)
	) ,
	array(
		'size'=>300,
		'content'=>array(
			array(
				'size'=>null, 'rowspan'=>$cellRowContinue
			),
			array(
				'size'=>($table_width * 0.25), 'content'=>'2. D??c??d??s', 'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.1), 'content'=>'', 'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.01), 'content'=>'', 'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.49), 'content'=>'H) Nombre total jours hospitalisation : Hospitalisation Effective', 'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'font'=>null
			),
			array(
				'size'=>($table_width * 0.1), 'content'=>'', 'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null
			)
		)
	),
	array(
		'size'=>300,
		'content'=> array(
			array(
				'size'=>null, 'rowspan'=>$cellRowContinue
			),
			array(
				'size'=>($table_width * 0.25), 'content'=>'3. Evad??s', 'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.1), 'content'=>'', 'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.01), 'content'=>'', 'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.49), 'content'=>'I)  Nombre de jours hospitalisation des sortants (e)', 'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'font'=>null
			),
			array(
				'size'=>($table_width * 0.1), 'content'=>'', 'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null
			)
		)
	),
	array(
		'size'=>300,
		'content'=>array(
			array(
				'size'=>null, 'rowspan'=>$cellRowContinue
			),
			array(
				'size'=>($table_width * 0.25), 'content'=>'4. R??f??r??s ?? l???h??pital de district', 'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.1), 'content'=>'', 'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.01), 'content'=>'', 'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>null
			)
		) 
	),
	array(
		'size'=>300,
		'content'=>array(
			array(
				'size'=>($table_width * 0.3), 'content'=>'D) Pr??sents fin du mois (D=A+B-C)', 'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null, 'font'=>null
			),
			array(
				'size'=>($table_width * 0.1), 'content'=>'', 'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null
			),
			array(
				'size'=>($table_width * 0.01), 'content'=>'', 'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>null
			)
		)
	)
);

foreach($tbl_content as $row_prop){
	//var_dump($row_prop);
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),$cell_prop['font'],@$cell_prop['align']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
	}
}


/******************************************************************************************/

$section->addTextBreak(1);
//select all diagnostic in new case of deases
$new_case = array();//returnAllDataInTable($tbl="co_diagnostic",$con, $condition = "WHERE DiagnosticCategoryID='3' ORDER BY DiagnosticID ASC");
//var_dump($new_case);
$tbl_content = array(
					array(
						'size'=>300,
						'content'=>array(
										array('size'=>($table_width * 0.4),'content'=>'J) Synth??se par ??ge','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'< 1 an','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.15),'content'=>'1 ?? 4 ans','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.15),'content'=>'5 ?? 19 ans','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.15),'content'=>'??? 20 ans','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null, 'align'=>$cellHCentered)
									)
						)
					);

//var_dump($new_case);
$sex = array("Female"=>"F","Male"=>"M");

$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.05),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.35),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.075),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										)
						);
//try to count hospitality's based on age
$new_case = array();
Hosp($new_case,$con);

$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.05),'content'=>'1','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.35),'content'=>'Hospitalis??s','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.075),'content'=>$new_case['M0_1'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>$new_case['F0_1'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>$new_case['M1_4'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>$new_case['F1_4'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>$new_case['M5_19'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>$new_case['F5_19'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>$new_case['M20'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>$new_case['F20'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										)
						);

$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.05),'content'=>'2','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.35),'content'=>'D??c??s','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.075),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										)
						);


$table = $section->addTable("Process Table");
foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
	}
}



/******************************************************************************************/

$section->addPageBreak();
//select all diagnostic in new case of deases
$new_case = array(
	array("name"=>"Paludisme simple confirm??", "code"=>"B50-B53","SISCode"=>"M1"),
	array("name"=>"Paludisme simple confirm?? avec troubles digestifs mineurs", "code"=>"B50-B53","SISCode"=>"M2"),
	array("name"=>"Pneumonie", "code"=>"J12.9 J15.9","SISCode"=>"R5;R6"),
	array("name"=>"Infection aig??e des voies respiratoires - Autre", "code"=>"J06.9 J22","SISCode"=>"R2;R3;R4"),
	array("name"=>"Rougeole", "code"=>"B05.9","SISCode"=>"I28;I29;I30;I31"),
	array("name"=>"Diarrh??e sanglante (dysenterie)", "code"=>"A09.3","SISCode"=>"I18"),
	array("name"=>"Diarrh??e non sanglante avec d??shydratation", "code"=>"A09.1","SISCode"=>"I14;I15"),
	array("name"=>"Diarrh??e non sanglante sans d??shydratation", "code"=>"A09.2","SISCode"=>"I13"),
	array("name"=>"Cholera (pr??sum??)", "code"=>"A00.9","SISCode"=>""),
	array("name"=>"Intoxication alimentaire", "code"=>"A05","SISCode"=>"I7"),
	array("name"=>"M??ningites (pr??sum??e)", "code"=>"G03.9","SISCode"=>"I26"),
	array("name"=>"Troubles mentaux", "code"=>"FXX.9","SISCode"=>"S1"),
	array("name"=>"Affections des os et articulations (dont fractures)", "code"=>"M86.9","SISCode"=>"E6;E7;E8;E9;E10;E11;E12"),
	array("name"=>"Traumatisme Physique (sans fractures)", "code"=>"T79.9","SISCode"=>"E1"),
	array("name"=>"TB Pulmonaire microscopie positive", "code"=>"A15.0","SISCode"=>""),
	array("name"=>"Maladies opportunistes au VIH/Sida", "code"=>"B24","SISCode"=>""),
	array("name"=>"Affections gyn??cologiques", "code"=>"N94.9","SISCode"=>"G6;G7;G8")
);//returnAllDataInTable($tbl="co_diagnostic",$con, $condition = "WHERE DiagnosticCategoryID='3' ORDER BY DiagnosticID ASC");
//var_dump($new_case);
//try to count why patient are hospitalized
CPHS($new_case,$con);
$tbl_content = array(
					array(
						'size'=>300,
						'content'=>array(
										array('size'=>($table_width * 0.45),'content'=>'K) Causes principales d???hospitalisation ?? la sortie','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner3, 'rowspan'=>$cellRowSpan),
										array('size'=>($table_width * 0.225),'content'=>'Hospitalis??s','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner6, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.225),'content'=>'D??c??s','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner6, 'rowspan'=>null, 'align'=>$cellHCentered),
									)
						)
					);

//var_dump($new_case);
$sex = array("Female"=>"F","Male"=>"M");

$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>null, 'rowspan'=>$cellRowContinue ),
										array('size'=>null, 'rowspan'=>$cellRowContinue ),
										array('size'=>null, 'rowspan'=>$cellRowContinue ),
										array('size'=>($table_width * 0.075),'content'=>'< 5 ans','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>'5 ?? 19 ans','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>'??? 20 ans','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>'< 5 ans','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>'5 ?? 19 ans','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>'??? 20 ans','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null, 'align'=>$cellHCentered)
									)
						);

$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>null, 'rowspan'=>$cellRowContinue ),
										array('size'=>null, 'rowspan'=>$cellRowContinue ),
										array('size'=>null, 'rowspan'=>$cellRowContinue ),
										array('size'=>($table_width * 0.0375),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.0375),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.0375),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.0375),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.0375),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.0375),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.0375),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.0375),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.0375),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.0375),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.0375),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.0375),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered)
									)
						);
//map diagnostic in the table now
$i = 1;
foreach($new_case as $case){
	$tbl_content[] = array(
							"size"=>$row_size * (strlen($case['name']) > 45 ?2:1),
							"content"=>array(
										array('size'=>($table_width * 0.05),'content'=>$i++,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.35),'content'=>$case['name'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.1),'content'=>$case['code'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.0375),'content'=>$case['NM5'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.0375),'content'=>$case['NF5'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.0375),'content'=>$case['NM5_19'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.0375),'content'=>$case['NF5_19'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.0375),'content'=>$case['NM20'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.0375),'content'=>$case['NF20'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.0375),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.0375),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.0375),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.0375),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.0375),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.0375),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
						);
}

//echo "<pre>"; var_dump($tbl_content);
$table = $section->addTable("Process Table");
foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null && @$cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'], $cell_prop['colspan'], $cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
	}
}

/**************************************************************************************/

$section->addPageBreak();
//select all diagnostic in new case of deases
$new_case = array(
	"Survivants de GBV avec des Sympt??mes de Violence Sexuelle",
	"Survivants de GBV avec des Sympt??mes de Violence Physique",
	"Survivants de GBV r??f??r?? ?? l?????chelon sup??rieur",
	"Survivants de GBV r??f??r?? par la police",
	"Survivants de GBV r??f??r?? par les animateurs de sant?? communautaire",
	"Survivants de GBV VIH + 3 mois apr??s exposition",
	"Survivants de GBV avec des s??quelles irr??versibles dues au GBV",
	"GBV D??c??d??s",
	"Survivants de GBV enceintes 4 semaines apr??s exposition",
	"Survivants de GBV qui ont re??u la contraception d???urgence end??ans 72h",
	"Survivants de GBV qui ont re??u la prophylaxie post exposition au VIH end??ans 48 h"
); //returnAllDataInTable($tbl="co_diagnostic",$con, $condition = "WHERE DiagnosticCategoryID='7' ORDER BY DiagnosticID ASC");
//var_dump($new_case);

$table = $section->addTable("ID Table");
$table->addRow($row_size , array('exactHeight'=>true));
$cell1 = $table->addCell($table_width * 1, $cellColSpanInner12);
$textrun2 = $cell1->addTextRun(array("alignment"=>"left"));
$textrun2->addText(htmlspecialchars('XI.	Violence Bas?? Sur Le Genre (GBV)', ENT_COMPAT, 'UTF-8'), $header);

//var_dump($new_case);
$sex = array("Female"=>"F","Male"=>"M");

$tbl_content = array(
						array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.05),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
											array('size'=>($table_width * 0.45),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
											array('size'=>($table_width * 0.1),'content'=>'< 5 ans','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.1),'content'=>'5-9 ans','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.1),'content'=>'10-18 ans','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.1),'content'=>'19-24 ans','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.1),'content'=>'??? 25 ans','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered)
										)
						)
					);
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>null, 'rowspan'=>$cellRowContinue ),
										array('size'=>null, 'rowspan'=>$cellRowContinue ),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'M','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'F','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered)
										)
						);
//
for($i=0;$i<count($new_case);$i++){
	$tbl_content[] = array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.05),'content'=>($i+1),'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.45),'content'=>$new_case[$i],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.05),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.05),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.05),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.05),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.05),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.05),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.05),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.05),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.05),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.05),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
											
										)
							);
}
 
foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),$cell_prop['font'],@$cell_prop['align']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
	}
}

/**************************************************************************************/

$section->addTextBreak(1);
//select all diagnostic in new case of deases
$new_case = array(
	"CPN Nouvelles inscrites",
	"CPN Premi??re visite standard au 1er trimestre",
	"CPN Femmes enceintes ayant fait 4 visites standard",
	"CPN Nombre grossesses ?? risques d??pist??es (inclus grossesse chez les moins de 15 ans)",
	"CPN Grossesses chez les moins de 15 ans",
	"CPN Grossesses ?? risque r??f??r??es",
	"CPN VAT 1",
	"CPN VAT 2 ?? 5",
	"CPN VAT Nouvelles inscrites compl??tement vaccin??es",
	"CPN Nouveaux enregistr??s recevant suppl??ments de Fer et Acide Folique Administr?? (90 Comprim??s)",
	"CPN Moustiquaires Impr??gn??es d'Insecticide distribu??es",
	"CPN D??parasitage effectu?? (mebendazole/albendazole)",
	"CPN Nouveaux enregistr??s d??pistage pour la malnutrition (MUAC)",
	"CPN Nouveaux enregistr??s avec malnutrition d??tect??e (MUAC < 21 cm)",
	"CPN Nouveaux enregistr??s an??mie test??e",
	"CPN nouveaux enregistr??s avec An??mie mod??r??e  7 ?? 9.9 gm/dl",
	"CPN nouveaux enregistr??s avec An??mie S??v??re<7gm/dl",
	"CPN Test??s au VIH ",
	"CPN Test??s VIH positive",
	"CPN Test??s au VIH qui ont re??us leurs r??sultats ",
	"CPN Test??s pour la syphilis ",
	"CPN Test??s positive pour la syphilis"
); //returnAllDataInTable($tbl="co_diagnostic",$con, $condition = "WHERE DiagnosticCategoryID='7' ORDER BY DiagnosticID ASC");
//var_dump($new_case);

$table = $section->addTable("ID Table");
$table->addRow($row_size , array('exactHeight'=>true));
$cell1 = $table->addCell($table_width * 1, $cellColSpanInner3);
$textrun2 = $cell1->addTextRun(array("alignment"=>"left"));
$textrun2->addText(htmlspecialchars('XII.	Consultations Pr??natales (CPN)', ENT_COMPAT, 'UTF-8'), $header);

//var_dump($new_case);
$sex = array("Female"=>"F","Male"=>"M");

$tbl_content = array(
					);
					
for($i=0;$i<count($new_case);$i++){
	$tbl_content[] = array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.05),'content'=>($i+1),'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.8),'content'=>$new_case[$i],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
										)
							);
}
 
foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),$cell_prop['font'],@$cell_prop['align']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
	}
}


/**************************************************************************************/

$section->addTextBreak(1);
//select all diagnostic in new case of deases
$new_case = 
array(
	array("name"=>"Avortements (sympt??mes sugg??rant un avortement induit)","code"=>"O04.9","SISCode"=>""),
	array("name"=>"Avortements Spontan??s","code"=>"O03","SISCode"=>""),
	array("name"=>"Grossesse ectopique","code"=>"O00.9","SISCode"=>""),
	array("name"=>"Menace d???accouchement pr??matur??","code"=>"O47.9","SISCode"=>"G2"),
	array("name"=>"H??morragie pr??natale (APH)","code"=>"O46.9","SISCode"=>""),
	array("name"=>"H??morragie Post-natale (PPH) *","code"=>"O72.1","SISCode"=>""),
	array("name"=>"Infection puerp??rale (apr??s naissance)","code"=>"O85","SISCode"=>""),
	array("name"=>"Travail prolong?? (ou dystocie m??canique)","code"=>"O66.9","SISCode"=>""),
	array("name"=>"Eclampsie / Pr?? Eclampsie S??v??re","code"=>"O15.9 O14.1","SISCode"=>""),
	array("name"=>"Rupture Ut??rine","code"=>"S37.6","SISCode"=>""),
	array("name"=>"D??chirure du p??rin??e (3eme Degr??)","code"=>"O70.2","SISCode"=>""),
	array("name"=>"Fistule (vesico vaginale or rectale)","code"=>"N82.0 K60.4","SISCode"=>""),
	array("name"=>"An??mie S??v??re (<7gm/dl)","code"=>"O99.0","SISCode"=>"G5"),
	array("name"=>"Paludisme simple pendant grossesse","code"=>"O98.6","SISCode"=>"M4"),
	array("name"=>"Paludisme avec troubles digestifs mineurs pendant grossesse","code"=>"O98.6.1","SISCode"=>"M5"),
	array("name"=>"Maladies Opportunistes ?? l???infection ?? VIH/sida","code"=>"O98.7","SISCode"=>""),
	array("name"=>"Autres complications obst??triques","code"=>"O75.4","SISCode"=>"G6"),
	array("name"=>"Nombre total de d??c??s Maternels audit??s au niveau de la Communaut??","code"=>"","SISCode"=>"")
);//returnAllDataInTable($tbl="co_diagnostic",$con, $condition = "WHERE DiagnosticCategoryID='7' ORDER BY DiagnosticID ASC");
//var_dump($new_case);
SIS_CO($new_case,$con);
$table = $section->addTable("ID Table");
$table->addRow($row_size , array('exactHeight'=>true));
$cell1 = $table->addCell($table_width * 1, $cellColSpanInner9);
$textrun2 = $cell1->addTextRun(array("alignment"=>"left"));
$textrun2->addText(htmlspecialchars('XIII.	Complications Obst??triques', ENT_COMPAT, 'UTF-8'), $header);

//var_dump($new_case);
$sex = array("Female"=>"F","Male"=>"M");

$tbl_content = array(
						array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.03),'content'=>'A','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
											array('size'=>($table_width * 0.57),'content'=>'Cas et D??c??s','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
											array('size'=>($table_width * 0.1),'content'=>'','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.1),'content'=>'Consultation Ext. NC','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.1),'content'=>'Hospitalis??s','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.1),'content'=>'D??c??s','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered)
										)
						)
					);
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>null, 'rowspan'=>$cellRowContinue ),
										array('size'=>null, 'rowspan'=>$cellRowContinue ),
										array('size'=>($table_width * 0.1),'content'=>'ICD-10','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'< 20 ans','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'??? 20 ans','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'< 20 ans','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'??? 20 ans','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'< 20 ans','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.05),'content'=>'??? 20 ans','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered)
									)
						);
//
for($i=0;$i<count($new_case);$i++){
	$tbl_content[] = array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.03),'content'=>($i+1),'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.57),'content'=>$new_case[$i]['name'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.1),'content'=>$new_case[$i]['code'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['C0_20'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['C20'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['H0_20'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['H20'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['D0_20'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.05),'content'=>$new_case[$i]['D20'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
											
										)
							);
}

$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.03),'content'=>'B','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.82),'content'=>'Interventions soins Obst??tricaux d???urgence (de base) :','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner6, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'Nombre','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered)
										
									)
						);
$new_case = array(
	"Antibiotiques intraveineuses",
	"Anti-hypertensives intraveineuses",
	"Extraction Manuelle du placenta",
	"Aspiration Manuelle (Soins Post-Avortement)",
	"Accouchement par ventouse",
	"Cas de (pr??)??clampsie qui ont re??u le sulfate de magn??sium"
);

for($i=0;$i<count($new_case);$i++){
	$tbl_content[] = array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.03),'content'=>($i+1),'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.82),'content'=>$new_case[$i],'font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner6, 'rowspan'=>null),
											array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered)
										)
							);
}

$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.03),'content'=>'C','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.82),'content'=>'Femmes plac??es sous observation pour 72 heures et plus','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner6, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered)
										
									)
						);
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.03),'content'=>'D','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.82),'content'=>'Femmes r??f??r??es d???urgence ?? l?????chelon sup??rieur','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner6, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered)
										
									)
						);
foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),$cell_prop['font'],@$cell_prop['align']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
	}
}


/**************************************************************************************/

$section->addTextBreak(1);
//select all diagnostic in new case of deases
$new_case = array(
	array("name"=>"Accouchement, total",'value'=>$accouchement_total),
	array("name"=>"Nombre de Femmes accompagn??es/r??f??r??es par ASC au CS pour l???accouchement",'value'=>""),
	array("name"=>"Accouchement, eutocique",'value'=>$accouchement_eutocique),
	array("name"=>"Accouchement, dystocique",'value'=>$accouchement_dystocique),
	array("name"=>"Traumatisme de l???enfant ?? la naissance",'value'=>""),
	array("name"=>"Fente Labio-palatine",'value'=>""),
	array("name"=>"Accouchement, femmes de 16 - 19 ans",'value'=>$accouchement_16_19),
	array("name"=>"Accouchement, femmes de 15 ans ou moins",'value'=>$accouchement_0_15),
	array("name"=>"Accouchement, femmes de 35 ans et plus",'value'=>$accouchement_35),
	array("name"=>"Accouchement, grossesses g??mellaires (Jumeaux, triplets, etc.)",'value'=>""),
	array("name"=>"Femmes r??f??r??es ?? l???h??pital pendant le travail",'value'=>$accouchement_apres_transfert),
	array("name"=>"D??c??s maternel pendant l???accouchement (=l'ensemble des d??c??s dans le tableau ci-dessus VIII.A)",'value'=>""),
	array("name"=>"Naissance vivantes",'value'=>""),
	array("name"=>"Nouveau n?? de poids < 2,5 kg (n?? vivant, non pas pr??matur??)",'value'=>""),
	array("name"=>"Nouveau n?? pr??matur?? de poids < 2,5 kg (vivant, 22-37 semaines) ",'value'=>""),
	array("name"=>"Mort n??s mac??r??s (>22 semaines ou >500 grammes)",'value'=>""),
	array("name"=>"Mort n??s frais (>22 semaines ou >500 grammes)",'value'=>""),
	array("name"=>"D??c??s des nouveaux n??s vivant dans 30 minutes (n??s dans cette FOSA)",'value'=>""),
	array("name"=>"Allaitement maternel du nouveau n?? end??ans la premi??re heure apr??s naissance",'value'=>""),
	array("name"=>"Nouveaux n??s avec absence de cri ?? la naissance qui sont r??anim??s",'value'=>""),
	array("name"=>"Nouveaux n??s r??anim?? avec succ??s (cri ?? 5 minutes)",'value'=>""),
	array("name"=>"Nouveau-n??s contr??l??s pour les signes de danger en service post-partum dans les 24 heures (si la m??re est hospitalis??e)",'value'=>""),
	array("name"=>"Nouveau-n??s contr??l??s pour les signes de danger avant la sortie du service post-partum (si la m??re est hospitalis??e)",'value'=>""),
	array("name"=>"Nouveau n?? r??f??r?? ?? l?????chelon sup??rieur",'value'=>"")
); //returnAllDataInTable($tbl="co_diagnostic",$con, $condition = "WHERE DiagnosticCategoryID='7' ORDER BY DiagnosticID ASC");
//var_dump($new_case);

$table = $section->addTable("ID Table");
$table->addRow($row_size , array('exactHeight'=>true));
$cell1 = $table->addCell($table_width * 1, $cellColSpanInner3);
$textrun2 = $cell1->addTextRun(array("alignment"=>"left"));
$textrun2->addText(htmlspecialchars('XIV.	Accouchement et naissances au Centre de Sant??/Dispensaire', ENT_COMPAT, 'UTF-8'), $header);

//var_dump($new_case);
$sex = array("Female"=>"F","Male"=>"M");

$tbl_content = array(
					);
					
for($i=0;$i<count($new_case);$i++){
	$tbl_content[] = array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.05),'content'=>($i+1),'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.85),'content'=>$new_case[$i]['name'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.1),'content'=>$new_case[$i]['value'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
										)
							);
}
 
foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),$cell_prop['font'],@$cell_prop['align']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
	}
}



/**************************************************************************************/

$section->addTextBreak(1);
//select all diagnostic in new case of deases
$new_case = array(
	"PNC nouveaux enregistrements",
	"Visite PNC standard 1 end??ans 3 jours apr??s naissance",
	"Visite PNC standard 2 entre 4 - 9 jours apr??s naissance ",
	"Visite PNC standard 3 entre 10 jours et 6 mois apr??s naissance",
	"PNC femmes ayant re??u vitamine A  ",
	"PNC nouveaux femmes enregistr??es d??pist??es pour malnutrition avec MUAC ",
	"PNC nouveaux femmes enregistr??es avec malnutrition (MUAC < 21 cm) ",
	"PNC r??f??r??e pour complications (m??re ou enfant)",
	"Enfants ?? faible poids ?? la naissance sortis de Kangaroo Mother Care et suivis au CS"
); //returnAllDataInTable($tbl="co_diagnostic",$con, $condition = "WHERE DiagnosticCategoryID='7' ORDER BY DiagnosticID ASC");
//var_dump($new_case);

$table = $section->addTable("ID Table");
$table->addRow($row_size , array('exactHeight'=>true));
$cell1 = $table->addCell($table_width * 0.8, $cellColSpanInner2);
$textrun2 = $cell1->addTextRun(array("alignment"=>"left"));
$textrun2->addText(htmlspecialchars('XV.	Consultations Post natales (PNC)', ENT_COMPAT, 'UTF-8'), $header);

$cell1 = $table->addCell($table_width * 0.1);
$textrun2 = $cell1->addTextRun($cellHCentered);
$textrun2->addText(htmlspecialchars('M??re', ENT_COMPAT, 'UTF-8'), $header);

$cell1 = $table->addCell($table_width * 0.1);
$textrun2 = $cell1->addTextRun($cellHCentered);
$textrun2->addText(htmlspecialchars('B??b??', ENT_COMPAT, 'UTF-8'), $header);

//var_dump($new_case);
$sex = array("Female"=>"F","Male"=>"M");

$tbl_content = array(
					);
					
for($i=0;$i<count($new_case);$i++){
	$tbl_content[] = array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.05),'content'=>($i+1),'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.75),'content'=>$new_case[$i],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.1),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.1),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
										)
							);
}
 
foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),$cell_prop['font'],@$cell_prop['align']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
	}
}


/**************************************************************************************/

$section->addTextBreak(1);
//select all diagnostic in new case of deases
$new_case = array(
	array("name"=>"Asphyxie (d??tresse respiratoire)","code"=>"P21.9"),
	array("name"=>"Hypothermie","code"=>"P80.9"),
	array("name"=>"Pr??maturit?? (22 ?? 37 semaines)","code"=>"P07.3"),
	array("name"=>"Malformation cong??nitales","code"=>"Q89.9"),
	array("name"=>"Infection respiratoire","code"=>"P28.8"),
	array("name"=>"M??ningite","code"=>"P36.9"),
	array("name"=>"Infection de la peau","code"=>"P39.4"),
	array("name"=>"Infection des voies urinaires","code"=>"P39.3"),
	array("name"=>"T??tanos N??onatal","code"=>"A33"),
	array("name"=>"Autre Infection N??onatale","code"=>"P39.9"),
	array("name"=>"Autre cause de pathologie n??onatale non cit??e ci-haut","code"=>""),
	array("name"=>"Total nouveaux n??s admis (n??s dans cette FOSA)/mort","code"=>""),
	array("name"=>"Total nouveaux n??s admis (n??s hors de cette FOSA)/mort","code"=>"")
);//returnAllDataInTable($tbl="co_diagnostic",$con, $condition = "WHERE DiagnosticCategoryID='7' ORDER BY DiagnosticID ASC");
//var_dump($new_case);

$table = $section->addTable("ID Table");
$table->addRow($row_size , array('exactHeight'=>true));
$cell1 = $table->addCell($table_width * 1, $cellColSpanInner11);
$textrun2 = $cell1->addTextRun(array("alignment"=>"left"));
$textrun2->addText(htmlspecialchars('XVI.	Causes d???hospitalisation et de d??c??s en n??onatologie', ENT_COMPAT, 'UTF-8'), $header);

//var_dump($new_case);
$sex = array("Female"=>"F","Male"=>"M");

$tbl_content = array(
						array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.03666),'content'=>'','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.3634),'content'=>'','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.13333),'content'=>'','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.26666),'content'=>'Admis pour hospitalisation','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner4, 'rowspan'=>null,'align'=>$cellHCentered),
											array('size'=>($table_width * 0.26666),'content'=>'D??c??s','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner4, 'rowspan'=>null,'align'=>$cellHCentered)
										)
						)
					);
$tbl_content[] = array(
						'size'=>($row_size*3),
						'content'=>array(
										array('size'=>($table_width * 0.03666),'content'=>'','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
										array('size'=>($table_width * 0.363394),'content'=>'','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
										array('size'=>($table_width * 0.13333),'content'=>'ICD-10','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.13333),'content'=>'0 - 7 jours','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.13333),'content'=>'8 - 28 jours','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.13333),'content'=>'0 - 7 jours (sauf d??c??s ?? la naissance)','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.13333),'content'=>'8 - 28 jours','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered)
									)
					);
$tbl_content[] = array(
						'size'=>($row_size),
						'content'=>array(
										array('size'=>null, 'rowspan'=>$cellRowContinue ),
										array('size'=>null, 'rowspan'=>$cellRowContinue ),
										array('size'=>null, 'rowspan'=>$cellRowContinue ),
										array('size'=>($table_width * 0.06666),'content'=>'M','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.06666),'content'=>'F','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.06666),'content'=>'M','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.06666),'content'=>'F','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.06666),'content'=>'M','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.06666),'content'=>'F','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.06666),'content'=>'M','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.06666),'content'=>'F','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered)
									)
					);
//
for($i=0;$i<count($new_case);$i++){
	$tbl_content[] = array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.03666),'content'=>($i+1),'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.363394),'content'=>$new_case[$i]['name'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.13333),'content'=>$new_case[$i]['code'],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.06666),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.06666),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.06666),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.06666),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.06666),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.06666),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.06666),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.06666),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
											
										)
							);
}

foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),$cell_prop['font'],@$cell_prop['align']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
	}
}


/**************************************************************************************/

$section->addTextBreak(1);
//select all diagnostic in new case of deases
$new_case = array(
	"BCG",
	"Polio-Zero (P0)",
	"Polio-1 (OPV1)",
	"Polio-2 (OPV2)",
	"Polio-3 (OPV3)",
	"DTP-HepB-Hib1",
	"DTP-HepB-Hib2",
	"DTP-HepB-Hib3",
	"Pneumocoque 1",
	"Pneumocoque 2",
	"Pneumocoque 3",
	"Rotavirus 1",
	"Rotavirus 2",
	"Rotavirus 3",
	"Rougeole et Rub??ole (RR)",
	"Moustiquaires impr??gn??es d???insecticide distribu??es"
); //returnAllDataInTable($tbl="co_diagnostic",$con, $condition = "WHERE DiagnosticCategoryID='7' ORDER BY DiagnosticID ASC");
//var_dump($new_case);

$table = $section->addTable("ID Table");
$table->addRow($row_size , array('exactHeight'=>true));
$cell1 = $table->addCell($table_width * 1, $cellColSpanInner4);
$textrun2 = $cell1->addTextRun(array("alignment"=>"left"));
$textrun2->addText(htmlspecialchars('XVII.	Vaccinations', ENT_COMPAT, 'UTF-8'), $header);
//var_dump($new_case);
$sex = array("Female"=>"F","Male"=>"M");

$tbl_content = array(
					array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.03),'content'=>'','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.57),'content'=>'Vaccins distribu??s','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.2),'content'=>'0 - 11 Mois','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.2),'content'=>'??? 1 an','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered)
									)
					)
				);
					
for($i=0;$i<count($new_case);$i++){
	$tbl_content[] = array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.03),'content'=>($i+1),'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.57),'content'=>$new_case[$i],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.2),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.2),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
										)
							);
}

$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.03),'content'=>'','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array("bgColor"=>"D5D5D5")),
										array('size'=>($table_width * 0.57),'content'=>"Vaccins pour les autres groupes d'??ge :",'font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array("bgColor"=>"D5D5D5"),'align'=>$cellHCentered),
										array('size'=>($table_width * 0.2),'content'=>'12 ans','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array("bgColor"=>"D5D5D5"),'align'=>$cellHCentered),
										array('size'=>($table_width * 0.2),'content'=>'','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array("bgColor"=>"D5D5D5"),'align'=>$cellHCentered)
									)
				);
				
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.03),'content'=>(++$i),'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.57),'content'=>"HPV 1",'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.2),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.2),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array("bgColor"=>"D5D5D5"),'align'=>$cellHCentered)
									)
				);
				
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.03),'content'=>(++$i),'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.57),'content'=>"HPV 2",'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.2),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.2),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array("bgColor"=>"D5D5D5"),'align'=>$cellHCentered)
									)
				);
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.03),'content'=>(++$i),'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.57),'content'=>"HPV 3",'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.2),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.2),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array("bgColor"=>"D5D5D5"),'align'=>$cellHCentered)
									)
				);
				
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.03),'content'=>'','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array("bgColor"=>"D5D5D5")),
										array('size'=>($table_width * 0.57),'content'=>"",'font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array("bgColor"=>"D5D5D5"),'align'=>$cellHCentered),
										array('size'=>($table_width * 0.2),'content'=>'15 mois','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array("bgColor"=>"D5D5D5"),'align'=>$cellHCentered),
										array('size'=>($table_width * 0.2),'content'=>'??? 16 mois','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array("bgColor"=>"D5D5D5"),'align'=>$cellHCentered)
									)
				);
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.03),'content'=>(++$i),'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.57),'content'=>"Vaccination contre la rougeole",'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.2),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.2),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
				);
foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),$cell_prop['font'],@$cell_prop['align']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
	}
}

/**************************************************************************************/

$section->addTextBreak(1);
//select all diagnostic in new case of deases
$new_case = array(
	"D??pistage de la malnutrition (Total)",
	"Malnutris (Total) :",
	"2.1 Malnutrition aig??e s??v??re (sans complications)",
	"2.2 Malnutrition aig??e s??v??re (avec complications)",
	"2.3 Malnutrition aig??e mod??r??e (sans complications)",
	"2.4 Malnutrition aig??e mod??r??e (avec complications)",
	"2.5 Insuffisance pond??rale mod??r??e",
	"2.6 Malnutrition chronique s??v??re (sturting)",
	"2.7 Malnutrition chronique mod??r??e (sturting)",
	"R??f??r?? au programme de la malnutrition (ambulatoire)"
); //returnAllDataInTable($tbl="co_diagnostic",$con, $condition = "WHERE DiagnosticCategoryID='7' ORDER BY DiagnosticID ASC");
//var_dump($new_case);

$table = $section->addTable("ID Table");
$table->addRow($row_size , array('exactHeight'=>true));
$cell1 = $table->addCell($table_width * 1, $cellColSpanInner9);
$textrun2 = $cell1->addTextRun(array("alignment"=>"left"));
$textrun2->addText(htmlspecialchars('XVIII.	D??pistage des maladies nutritionnelles en ambulatoire (tous services)', ENT_COMPAT, 'UTF-8'), $header);
//var_dump($new_case);
$sex = array("Female"=>"F","Male"=>"M");

$tbl_content = array(
					array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.33336),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
										array('size'=>($table_width * 0.24999),'content'=>'EPI ??? Vaccination','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner3, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.24999),'content'=>'IMCI - PCME','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner3, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.08333),'content'=>'> 5 ??? 14 ans','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.08333),'content'=>'??? 15 ans','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan,'align'=>$cellHCentered)
									)
					)
				);
$tbl_content[] = array(
					'size'=>($row_size* 1.8),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.08333),'content'=>'0 - 6 j','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
									array('size'=>($table_width * 0.08333),'content'=>'7 j - 2 mois','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
									array('size'=>($table_width * 0.08333),'content'=>'> 2 - 59 mois','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
									array('size'=>($table_width * 0.08333),'content'=>'0 - 6 j','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
									array('size'=>($table_width * 0.08333),'content'=>'7 j - 2 mois','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
									array('size'=>($table_width * 0.08333),'content'=>'> 2 - 59 mois','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue )
									
								)
				);
					
for($i=0;$i<count($new_case);$i++){
	$tbl_content[] = array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.33336),'content'=>$new_case[$i],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
										)
							);
}

foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),$cell_prop['font'],@$cell_prop['align']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
	}
}

/**************************************************************************************/

$section->addTextBreak(1);
//select all diagnostic in new case of deases
$new_case = array(
	"D??pistage de la malnutrition (Total)",
	"Malnutris (Total) :",
	"2.1 Malnutrition aig??e s??v??re (sans complications)",
	"2.2 Malnutrition aig??e s??v??re (avec complications)",
	"2.3 Malnutrition aig??e mod??r??e (sans complications)",
	"2.4 Malnutrition aig??e mod??r??e (avec complications)",
	"2.5 Insuffisance pond??rale mod??r??e",
	"2.6 Malnutrition chronique s??v??re (sturting)",
	"2.7 Malnutrition chronique mod??r??e (sturting)",
	"R??f??r?? au programme de la malnutrition (ambulatoire)"
); //returnAllDataInTable($tbl="co_diagnostic",$con, $condition = "WHERE DiagnosticCategoryID='7' ORDER BY DiagnosticID ASC");
//var_dump($new_case);

$table = $section->addTable("ID Table");
$table->addRow($row_size , array('exactHeight'=>true));
$cell1 = $table->addCell($table_width * 1, $cellColSpanInner13);
$textrun2 = $cell1->addTextRun(array("alignment"=>"left"));
$textrun2->addText(htmlspecialchars('XIX. R??habilitation ambulatoires des malnutris', ENT_COMPAT, 'UTF-8'), $header);
//var_dump($new_case);
$sex = array("Female"=>"F","Male"=>"M");

$tbl_content = array(
					array(
						'size'=>($row_size * 1.1),
						'content'=>array(
										array('size'=>($table_width * 0.33336),'content'=>'','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpanColSpanInner3),
										array('size'=>($table_width * 0.24999),'content'=>'Malnutrition aigue','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner4, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.01),'content'=>'','font'=>$header_small,'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.08333),'content'=>'Malnutrition chronique (Stunting)','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpanColSpanInner2,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.01),'content'=>'','font'=>$header_small,'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.08333),'content'=>'Malnutris femmes enceintes','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.08333),'content'=>'Malnutris femmes allaitantes','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan,'align'=>$cellHCentered)
									)
					)
				);
$tbl_content[] = array(
					'size'=>($row_size*1.1),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinueColSpanInner3 ),
									array('size'=>($table_width * 0.08333),'content'=>'mod??r??e','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
									array('size'=>($table_width * 0.08333),'content'=>'s??v??re','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
									array('size'=>($table_width * 0.01),'content'=>'','font'=>null,'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
									array('size'=>null, 'rowspan'=>$cellRowContinueColSpanInner2 ),
									array('size'=>($table_width * 0.01),'content'=>'','font'=>null,'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue )
								)
				);
				
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinueColSpanInner3 ),
									array('size'=>($table_width * 0.08333),'content'=>'< 5 ans','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
									array('size'=>($table_width * 0.08333),'content'=>'??? 5 ans','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
									array('size'=>($table_width * 0.08333),'content'=>'< 5 ans','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
									array('size'=>($table_width * 0.08333),'content'=>'??? 5 ans','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
									array('size'=>($table_width * 0.01),'content'=>'','font'=>null,'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
									array('size'=>($table_width * 0.08333),'content'=>'< 5 ans','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
									array('size'=>($table_width * 0.08333),'content'=>'??? 5 ans','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
									array('size'=>($table_width * 0.01),'content'=>'','font'=>null,'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue )
								)
				);
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>($table_width * 0.03666),'content'=>'1','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'Pr??sent au d??but du mois','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.001),'content'=>'','font'=>null,'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.001),'content'=>'','font'=>null,'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									
								)
				);
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>($table_width * 0.03666),'content'=>'2','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
									array('size'=>($table_width * 0.08333),'content'=>'Admissions','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
									array('size'=>($table_width * 0.08333),'content'=>'2.1 Nouveaux cas','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.001),'content'=>'','font'=>null,'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.001),'content'=>'','font'=>null,'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									
								)
				);
$tbl_content[] = array(
					'size'=>($row_size*1.4),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.08333),'content'=>'2.2 Rechute/Reprise apr??s abandon','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.001),'content'=>'','font'=>null,'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.001),'content'=>'','font'=>null,'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									
								)
				);
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>($table_width * 0.03666),'content'=>'3','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
									array('size'=>($table_width * 0.08333),'content'=>'Sortant du mois dont:','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
									array('size'=>($table_width * 0.08333),'content'=>'3.1 Gu??ris','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.001),'content'=>'','font'=>null,'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.001),'content'=>'','font'=>null,'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									
								)
				);
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.08333),'content'=>'3.2 R??f??r??s','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.001),'content'=>'','font'=>null,'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.001),'content'=>'','font'=>null,'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									
								)
				);
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.08333),'content'=>'3.3 Abandonn??s','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.001),'content'=>'','font'=>null,'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.001),'content'=>'','font'=>null,'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									
								)
				);
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.08333),'content'=>'3.4 D??c??s','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.001),'content'=>'','font'=>null,'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.001),'content'=>'','font'=>null,'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									
								)
				);
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>($table_width * 0.03666),'content'=>'4','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'Pr??sent ?? la fin du mois','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.001),'content'=>'','font'=>null,'format'=>$withBorderBottomOnly, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.001),'content'=>'','font'=>null,'format'=>$withBorderBottomOnly, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.08333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									
								)
				);
				
foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),$cell_prop['font'],@$cell_prop['align']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
	}
}

/**************************************************************************************/

$section->addTextBreak(1);
//select all diagnostic in new case of deases
$new_case = array(
	"D??pistage de la malnutrition (Total)",
	"Malnutris (Total) :",
	"2.1 Malnutrition aig??e s??v??re (sans complications)",
	"2.2 Malnutrition aig??e s??v??re (avec complications)",
	"2.3 Malnutrition aig??e mod??r??e (sans complications)",
	"2.4 Malnutrition aig??e mod??r??e (avec complications)",
	"2.5 Insuffisance pond??rale mod??r??e",
	"2.6 Malnutrition chronique s??v??re (sturting)",
	"2.7 Malnutrition chronique mod??r??e (sturting)",
	"R??f??r?? au programme de la malnutrition (ambulatoire)"
); //returnAllDataInTable($tbl="co_diagnostic",$con, $condition = "WHERE DiagnosticCategoryID='7' ORDER BY DiagnosticID ASC");
//var_dump($new_case);

$table = $section->addTable("ID Table");
$table->addRow($row_size , array('exactHeight'=>true));
$cell1 = $table->addCell($table_width * 1, $cellColSpanInner8);
$textrun2 = $cell1->addTextRun(array("alignment"=>"left"));
$textrun2->addText(htmlspecialchars('XX.	Planning familial', ENT_COMPAT, 'UTF-8'), $header);
//var_dump($new_case);
$sex = array("Female"=>"F","Male"=>"M");

$tbl_content = array(
					array(
						'size'=>($row_size),
						'content'=>array(
										array('size'=>($table_width * 0.03333),'content'=>'','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.34999),'content'=>'M??thodes','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.13333),'content'=>'Nouveaux utilisateurs','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.13333),'content'=>'Arr??ts de PF','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.13333),'content'=>'Utilisateurs en fin de mois','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.13333),'content'=>'Quantit?? distribu??e','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.13333),'content'=>'Stock ?? la fin du mois','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.13333),'content'=>'Nbre de jours de rupture de stock','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null,'align'=>$cellHCentered)
									)
					)
				);
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>($table_width * 0.03333),'content'=>'1','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.34999),'content'=>'Contraceptifs oraux, progestatif','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>($table_width * 0.03333),'content'=>'2','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.34999),'content'=>'Contraceptifs oraux, combin??e','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
				
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>($table_width * 0.03333),'content'=>'3','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.34999),'content'=>'Injectables (Depo-Provera)','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>($table_width * 0.03333),'content'=>'4','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.34999),'content'=>'Injectables (Norristerat)','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
				
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>($table_width * 0.03333),'content'=>'5','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.34999),'content'=>'Implants','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
				
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>($table_width * 0.03333),'content'=>'6','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.34999),'content'=>'DIU','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
				
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>($table_width * 0.03333),'content'=>'7','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.34999),'content'=>'Pr??servatifs masculins','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
				
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>($table_width * 0.03333),'content'=>'8','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.34999),'content'=>'Pr??servatifs f??minins','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
				
$tbl_content[] = array(
					'size'=>($row_size * 1.8),
					'content'=>array(
									array('size'=>($table_width * 0.03333),'content'=>'9','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.34999),'content'=>'Autres m??thodes de barri??re (gel, diaphragme)','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
				
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>($table_width * 0.03333),'content'=>'10','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.34999),'content'=>'MJF (Collier)','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>($table_width * 0.03333),'content'=>'11','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.34999),'content'=>'Auto-observation ','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array("bgColor"=>"D5D5D5")),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array("bgColor"=>"D5D5D5")),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array("bgColor"=>"D5D5D5"))
								)
				);
				
$tbl_content[] = array(
					'size'=>($row_size * 2),
					'content'=>array(
									array('size'=>($table_width * 0.03333),'content'=>'12','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.34999),'content'=>'Nombre de femmes nouvelles utilisatrices r??f??r??es par ASC pour les m??thodes de PF','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array("bgColor"=>"D5D5D5")),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array("bgColor"=>"D5D5D5")),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array("bgColor"=>"D5D5D5")),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array("bgColor"=>"D5D5D5")),
									array('size'=>($table_width * 0.13333),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array("bgColor"=>"D5D5D5"))
								)
				);
				
foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),$cell_prop['font'],@$cell_prop['align']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
	}
}

/**************************************************************************************/

$section->addPageBreak();
//select all diagnostic in new case of deases
$new_case = array(
); //returnAllDataInTable($tbl="co_diagnostic",$con, $condition = "WHERE DiagnosticCategoryID='7' ORDER BY DiagnosticID ASC");
//var_dump($new_case);

$table = $section->addTable("ID Table");
$table->addRow($row_size , array('exactHeight'=>true));
$cell1 = $table->addCell($table_width * 1, $cellColSpanInner6);
$textrun2 = $cell1->addTextRun(array("alignment"=>"left"));
$textrun2->addText(htmlspecialchars('XXI.	Laboratoire', ENT_COMPAT, 'UTF-8'), $header);
//var_dump($new_case);
$sex = array("Female"=>"F","Male"=>"M");
//die;
$tbl_content = array(
					array(
						'size'=>($row_size),
						'content'=>array(
										array('size'=>($table_width * 0.55),'content'=>'','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner3, 'rowspan'=>null),
										array('size'=>($table_width * 0.3),'content'=>'R??sultats','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null,'align'=>$cellHCentered),
										array('size'=>($table_width * 0.15),'content'=>'Total','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan,'align'=>$cellHCentered),
									)
					)
				);
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>($table_width * 0.55),'content'=>'Examens','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner3, 'rowspan'=>null, 'align'=>$cellHCentered),
									array('size'=>($table_width * 0.15),'content'=>'Positifs','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>'N??gatifs','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>null, 'rowspan'=>$cellRowContinue )
								)
				);
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>($table_width * 0.55),'content'=>'1. G.E  (Examens de sang)','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner3, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>$ge_negative,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$ge_total,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>($table_width * 0.03),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
									array('size'=>($table_width * 0.07),'content'=>'Dont','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
									array('size'=>($table_width * 0.45),'content'=>'1.1 Plasmodium','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$ge_plasmodium,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5'))
								)
				);
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.45),'content'=>'1.2 Microfilaire','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$ge_microfilaire,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5'))
								)
				);
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.45),'content'=>'1.3 Borellia','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$ge_borellia,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5'))
								)
				);
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.45),'content'=>'1.4 Trypanosome','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$ge_trypanosome,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5'))
								)
				);
				
				
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>($table_width * 0.55),'content'=>'2. Test rapide du paludisme','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner3, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$tdr_positive,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$tdr_negative,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$tdr_total,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
				
				
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>($table_width * 0.55),'content'=>'3. Examens de selles (nombre d?????chantillons analys??s)','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner3, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>$selles_negative,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$selles_total,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>($table_width * 0.03),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
									array('size'=>($table_width * 0.07),'content'=>'Dont','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
									array('size'=>($table_width * 0.45),'content'=>'3.1 Entamoeba histolytica','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$selles_entamoeba_hist,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5'))
								)
				);
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.45),'content'=>'3.2 Giardia','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$selles_giardia,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5'))
								)
				);
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.45),'content'=>'3.3 Ascaris','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$selles_ascaris,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5'))
								)
				);
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.45),'content'=>'3.4 Ankylostome','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$selles_ankylostome,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5'))
								)
				);
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.45),'content'=>'3.5 Schistosome','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$selles_schistosome,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5'))
								)
				);
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.45),'content'=>'3.6 Trichuris','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$selles_trichuris,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5'))
								)
				);
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.45),'content'=>'3.7 T??nia','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$selles_tenia,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5'))
								)
				);
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.45),'content'=>'3.8 Autres parasites','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$selles_others,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5'))
								)
				);
				
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>($table_width * 1),'content'=>'4. Urine','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner6, 'rowspan'=>null)
								)
				);
				
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>($table_width * 0.03),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
									array('size'=>($table_width * 0.07),'content'=>'Dont','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
									array('size'=>($table_width * 0.45),'content'=>'4.2 Sucre','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$glycosurie_positive,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$glycosurie_negative,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$glycosurie_total,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
				
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.45),'content'=>'4.3 Albumine','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$albumine_positive,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$albumine_negative,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$albumine_total,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
				
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.45),'content'=>'4.3 Test de grossesse','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$grossesse_positive,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$grossesse_negative,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$grossesse_total,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
				
				
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>($table_width * 1),'content'=>'5. Crachats (Nombre de patients)','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner6, 'rowspan'=>null)
								)
				);
				
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>($table_width * 0.03),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
									array('size'=>($table_width * 0.07),'content'=>'Dont','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
									array('size'=>($table_width * 0.45),'content'=>'5.2 Diagnostique BK par  microscopie','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$crachat_positive,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$crachat_negative,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$crachat_total,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
				
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.45),'content'=>'5.2 Contr??le BK pour les patients positifs','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
				
				
				
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>($table_width * 1),'content'=>'6. Sang','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner6, 'rowspan'=>null)
								)
				);
				
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>($table_width * 0.03),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
									array('size'=>($table_width * 0.07),'content'=>'Dont','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpan),
									array('size'=>($table_width * 0.45),'content'=>'6.1. RPR ','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$rpr_positive,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$rpr_negative,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$rpr_total,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
				
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.45),'content'=>'6.2. R??sultat final VIH (SRV)','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$hiv_positive,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$hiv_negative,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>$hiv_total,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
				
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.45),'content'=>'6.3. H??moglobine','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>$hb_total,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
				
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.45),'content'=>'6.4. VS','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>$vs_total,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
				
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.45),'content'=>'6.5. NFS','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>$nfs_total,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
				
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.45),'content'=>'6.6. ALAT (GPT)','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>$gpt_total,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
				
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.45),'content'=>'6.8. Glyc??mie','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>$glycemie_total,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
				
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.45),'content'=>'6.9. Amylase','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>$amylase_total,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
				
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.45),'content'=>'6.10. CD4','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>$cd4_total,'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
				
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>null, 'rowspan'=>$cellRowContinue ),
									array('size'=>($table_width * 0.45),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
				
$tbl_content[] = array(
					'size'=>($row_size),
					'content'=>array(
									array('size'=>($table_width * 0.45),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>$cellColSpanInner3, 'rowspan'=>null),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>array('bgColor'=>'D5D5D5')),
									array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
								)
				);
				
foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),$cell_prop['font'],@$cell_prop['align']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
	}
}



/**************************************************************************************/

$section->addTextBreak(1);
//select all diagnostic in new case of deases
$new_case = array(
	"Albendazole ??? comprim?? 400mg",
	"Mebendazole ??? sirop 100mg/5ml",
	"Mebendazole ??? comprim?? 500mg",
	"Praziquantel ??? comprim?? 200mg",
	"Sels de r??hydratation orale (paquets)",
	"Vitamine A (100000 ui)",
	"Vitamine A (200000 ui)",
	"Zinc tab 10mg ",
	"Amoxicilline ??? comprim?? 250 mg",
	"Amoxicilline ??? sirop 125mg/5ml",
	"Coartem_Art??m??ther  + Lumefanthrine tab 20 mg + 120mg  (6x1)",
	"Coartem _Art??m??ther + Lumefanthrine tab 20 mg + 120mg  (6x2)",
	"Coartem _Art??m??ther + Lumefanthrine tab 20 mg + 120mg  (6x3)",
	"Coartem _Art??m??ther + Lumefanthrine tab 20 mg + 120mg  (6x4)",
	"Sulfate deferet acide folique tab 200mg/0.25mg ",
	"Art??m??ther flacon 20 mg/ml",
	"Artesunate flacon 60mg/ml",
	"Test rapide du paludisme (RDT)",
	"Quinine flacon 300 mg/ml",
	"Quinine tab 300 mg",
	"Ciprofloxacine tab 250mg",
	"Metronidazolevial 500mg/ml",
	"Cotrimoxazole tab 400 mg + 80 mg",
	"Morphine 10 mg/ml injection",
	"Morphine 30 mg tablet",
	"Morphine hcl 10mg tablet",
	"Lait th??rapeutique F100, sachet 456 mg",
	"Lait th??rapeutique F75, sachet 410 mg",
	"Plumpynut, sachet 920 mg",
	"Corn Soya Mix (CSM), kilo"
); //returnAllDataInTable($tbl="co_diagnostic",$con, $condition = "WHERE DiagnosticCategoryID='7' ORDER BY DiagnosticID ASC");
//var_dump($new_case);

$table = $section->addTable("ID Table");
$table->addRow($row_size , array('exactHeight'=>true));
$cell1 = $table->addCell($table_width * 1, $cellColSpanInner7);
$textrun2 = $cell1->addTextRun(array("alignment"=>"left"));
$textrun2->addText(htmlspecialchars('XXII. Gestion de la pharmacie', ENT_COMPAT, 'UTF-8'), $header);

//var_dump($new_case);
$sex = array("Female"=>"F","Male"=>"M");

$tbl_content = array(
					array(
							'size'=>($row_size * 2.5),
							'content'=>array(
											array('size'=>($table_width * 0.025),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.6),'content'=>'M??dicaments traceurs','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
											array('size'=>($table_width * 0.075),'content'=>'Quantit?? Re??ue','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
											array('size'=>($table_width * 0.075),'content'=>'Quantit?? distribu??e','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
											array('size'=>($table_width * 0.075),'content'=>'P??remption / Perte','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
											array('size'=>($table_width * 0.075),'content'=>'Stock ?? la fin du mois','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
											array('size'=>($table_width * 0.075),'content'=>'Jours de rupture de stock','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered)
										)
						)
					);
					
for($i=0;$i<count($new_case);$i++){
	$tbl_content[] = array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.025),'content'=>($i+1),'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.6),'content'=>$new_case[$i],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.075),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
											array('size'=>($table_width * 0.075),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
											array('size'=>($table_width * 0.075),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
											array('size'=>($table_width * 0.075),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
											array('size'=>($table_width * 0.075),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered)
										)
							);
}
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.025),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.6),'content'=>'M??dicaments offerts a la Communaut??','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.075),'content'=>'','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>'','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>'','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>'','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
										array('size'=>($table_width * 0.075),'content'=>'','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered)
									)
				);
					
$new_case = array(
	"Sels de r??hydratation orale (paquets)",
	"Zinc tab 10 mg",
	"Amoxicilline tab 125  mg",
	"ACT (Primo Red)",
	"ACT (Primo Yellow)",
	"Test de Diagnostique Rapide pour Malaria (TDR)",
	"Misoprostol",
	"Gants"
);
for($i=0;$i<count($new_case);$i++){
	$tbl_content[] = array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.025),'content'=>($i+1),'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.6),'content'=>$new_case[$i],'font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
											array('size'=>($table_width * 0.075),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
											array('size'=>($table_width * 0.075),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
											array('size'=>($table_width * 0.075),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
											array('size'=>($table_width * 0.075),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
											array('size'=>($table_width * 0.075),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered)
										)
							);
}
foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),$cell_prop['font'],@$cell_prop['align']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
	}
}


/**************************************************************************************/

$section->addTextBreak(1);
//select all diagnostic in new case of deases
$new_case = array(
	"Albendazole ??? comprim?? 400mg",
	"Mebendazole ??? sirop 100mg/5ml",
	"Mebendazole ??? comprim?? 500mg",
	"Praziquantel ??? comprim?? 200mg",
	"Sels de r??hydratation orale (paquets)",
	"Vitamine A (100000 ui)",
	"Vitamine A (200000 ui)",
	"Zinc tab 10mg ",
	"Amoxicilline ??? comprim?? 250 mg",
	"Amoxicilline ??? sirop 125mg/5ml",
	"Coartem_Art??m??ther  + Lumefanthrine tab 20 mg + 120mg  (6x1)",
	"Coartem _Art??m??ther + Lumefanthrine tab 20 mg + 120mg  (6x2)",
	"Coartem _Art??m??ther + Lumefanthrine tab 20 mg + 120mg  (6x3)",
	"Coartem _Art??m??ther + Lumefanthrine tab 20 mg + 120mg  (6x4)",
	"Sulfate deferet acide folique tab 200mg/0.25mg ",
	"Art??m??ther flacon 20 mg/ml",
	"Artesunate flacon 60mg/ml",
	"Test rapide du paludisme (RDT)",
	"Quinine flacon 300 mg/ml",
	"Quinine tab 300 mg",
	"Ciprofloxacine tab 250mg",
	"Metronidazolevial 500mg/ml",
	"Cotrimoxazole tab 400 mg + 80 mg",
	"Morphine 10 mg/ml injection",
	"Morphine 30 mg tablet",
	"Morphine hcl 10mg tablet",
	"Lait th??rapeutique F100, sachet 456 mg",
	"Lait th??rapeutique F75, sachet 410 mg",
	"Plumpynut, sachet 920 mg",
	"Corn Soya Mix (CSM), kilo"
); //returnAllDataInTable($tbl="co_diagnostic",$con, $condition = "WHERE DiagnosticCategoryID='7' ORDER BY DiagnosticID ASC");
//var_dump($new_case);

$table = $section->addTable("ID Table");
$table->addRow($row_size , array('exactHeight'=>true));
$cell1 = $table->addCell($table_width * 1, $cellColSpanInner4);
$textrun2 = $cell1->addTextRun(array("alignment"=>"left"));
$textrun2->addText(htmlspecialchars('XXIII.	des moustiquaires impr??gn??es', ENT_COMPAT, 'UTF-8'), $header);

//var_dump($new_case);
$sex = array("Female"=>"F","Male"=>"M");

$tbl_content = array(
					array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.5),'content'=>'Canal de distribution','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
											array('size'=>($table_width * 0.15),'content'=>'Quantit?? re??ue','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
											array('size'=>($table_width * 0.15),'content'=>'Quantit?? distribu??e','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
											array('size'=>($table_width * 0.2),'content'=>'Stock ?? la fin du mois','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered)
										)
						)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.5),'content'=>'LLINs distribu??es pendant la CPN','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.2),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.5),'content'=>'LLINs distribu??es pendant la Vaccination','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.2),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.5),'content'=>'LLINs distribu??es pendant la Campagne','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.2),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),$cell_prop['font'],@$cell_prop['align']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
	}
}

/**************************************************************************************/

$section->addTextBreak(1);
//select all diagnostic in new case of deases
$new_case = array(
); //returnAllDataInTable($tbl="co_diagnostic",$con, $condition = "WHERE DiagnosticCategoryID='7' ORDER BY DiagnosticID ASC");
//var_dump($new_case);

$table = $section->addTable("ID Table");
$table->addRow($row_size , array('exactHeight'=>true));
$cell1 = $table->addCell($table_width * 1, $cellColSpanInner4);
$textrun2 = $cell1->addTextRun(array("alignment"=>"left"));
$textrun2->addText(htmlspecialchars('XXIV. Tr??sorerie (Finances)', ENT_COMPAT, 'UTF-8'), $header);

//var_dump($new_case);
$sex = array("Female"=>"F","Male"=>"M");

$tbl_content = array(
					array(
							'size'=>$row_size,
							'content'=>array(
											array('size'=>($table_width * 0.5),'content'=>'A) Recettes /Entr??es (de toutes sources, y compris mutuelle)','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null, 'align'=>$cellHCentered),
											array('size'=>($table_width * 0.5),'content'=>'B) D??penses /Sorties','font'=>$header_small,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null, 'align'=>$cellHCentered)
										)
						)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.4),'content'=>'Libell??','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.1),'content'=>'Montant total','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.4),'content'=>'Libell??','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.1),'content'=>'Montant total','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.35),'content'=>'1. Soins pr??ventifs','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.35),'content'=>'1. Achat de m??dicaments, mat??riel m??dical','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.35),'content'=>'2. Soins Curative (y compris les hospitalisations)','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.35),'content'=>'2. Salaires, s??curit?? sociale, taxes prof. Personnel pay??s','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.35),'content'=>'3. Accouchements','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.35),'content'=>'3. Primes du personnel','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.35),'content'=>'4. Laboratoire','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.35),'content'=>'4. Frais de missions','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.35),'content'=>'5. Vente m??dicaments/ petit mat??riel  m??dical','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.35),'content'=>'5. Fournitures bureau / imprim??s / carnets','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.35),'content'=>'6. Petite chirurgie','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.35),'content'=>'6. Entretien & maintenance ??quipement m??dical','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.35),'content'=>'7. Documents m??dico-l??gaux','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.35),'content'=>'7. Entretien & maintenance ??quipement non m??dical','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.35),'content'=>'8. Vente d???imprim??s/carnets','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.35),'content'=>'8. Entretien & maintenance des moyens de transport','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.35),'content'=>'9. Transport des patients','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.35),'content'=>'9. Entretien & r??habilitation infrastructures','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.35),'content'=>'10. Financement bas?? sur la performance','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.35),'content'=>'10. Mat??riel d???entretien, produits nettoyage','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.35),'content'=>'11. Autres Subsides de l???Etat','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.35),'content'=>'11. Carburant, lubrifiants','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.35),'content'=>'12. Autres Contributions des partenaires','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.35),'content'=>'12. Eau, ??lectricit??','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.35),'content'=>'13. Int??r??ts bancaires','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.35),'content'=>'13. Communication (T??l??phone, Internet???)','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.35),'content'=>'14. Autres recettes','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.35),'content'=>'14. Formations','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.35),'content'=>'Total des Recettes (A)','font'=>$font_small_8_bold,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.35),'content'=>'15. Frais li??s aux indigents','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.35),'content'=>'','font'=>$font_small_8,'format'=>$noBorder, 'colspan'=>null, 'rowspan'=>$cellRowSpanColSpanInner2),
										array('size'=>($table_width * 0.35),'content'=>'16. Achat ??quipement m??dical','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>null,'rowspan'=>$cellRowContinueColSpanInner2),
										array('size'=>($table_width * 0.35),'content'=>'17. Achat ??quipement non m??dical','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>null,'rowspan'=>$cellRowContinueColSpanInner2),
										array('size'=>($table_width * 0.35),'content'=>'18. Achat moyen de transport','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>null,'rowspan'=>$cellRowContinueColSpanInner2),
										array('size'=>($table_width * 0.35),'content'=>'19. Autres d??penses ','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>null,'rowspan'=>$cellRowContinueColSpanInner2),
										array('size'=>($table_width * 0.35),'content'=>'Total des D??penses (B)','font'=>$font_small_8_bold,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),$cell_prop['font'],@$cell_prop['align']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
	}
}

/**************************************************************************************/

$section->addTextBreak(1);
//select all diagnostic in new case of deases
$new_case = array(
); //returnAllDataInTable($tbl="co_diagnostic",$con, $condition = "WHERE DiagnosticCategoryID='7' ORDER BY DiagnosticID ASC");
//var_dump($new_case);

$table = $section->addTable("Process Table");
/* $table->addRow($row_size , array('exactHeight'=>true));
$cell1 = $table->addCell($table_width * 1, $cellColSpanInner4);
$textrun2 = $cell1->addTextRun(array("alignment"=>"left"));
$textrun2->addText(htmlspecialchars('XXIV. Tr??sorerie (Finances)', ENT_COMPAT, 'UTF-8'), $header);
 */
//var_dump($new_case);
$sex = array("Female"=>"F","Male"=>"M");

$tbl_content = array(
					array(
							'size'=>($row_size * 2.8),
							'content'=>array(
											array('size'=>($table_width * 0.35),'content'=>'C. Recettes Mutuelle ','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
											array('size'=>($table_width * 0.15),'content'=>'Montant total','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
											array('size'=>($table_width * 0.35),'content'=>'D. Recettes des autres assurances maladies (RAMA / MMI / FARG/ Assurances priv??es)','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered),
											array('size'=>($table_width * 0.15),'content'=>'Montant total','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null, 'align'=>$cellHCentered)
										)
						)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.35),'content'=>'14.1 Tickets mod??rateurs','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.35),'content'=>'15.1 Tickets mod??rateurs','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>$header_small,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.35),'content'=>'14.2 Paiement des soins','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.35),'content'=>'15.2 Paiement des soins','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.35),'content'=>'14.3 Paiement des m??dicaments','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.35),'content'=>'16.3 Paiement des m??dicaments','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.35),'content'=>'E) Cr??ances','font'=>$font_small_8_bold,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null),
										array('size'=>($table_width * 0.35),'content'=>'F) D??ttes','font'=>$font_small_8_bold,'format'=>$withBorder, 'colspan'=>$cellColSpanInner2, 'rowspan'=>null)
									)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.35),'content'=>'Libell??','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'Montant','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.35),'content'=>'Libell??','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'Montant','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.35),'content'=>'1. Cr??ances au d??but du mois (e)','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.35),'content'=>'1. Dettes au d??but du mois (i)','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.35),'content'=>'2. (+)Ensemble des cr??ances du mois (f)','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.35),'content'=>'2. (+) Ensemble des dettes du mois (j)','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.35),'content'=>'3. (-)Remboursement du mois (g)','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.35),'content'=>'3. (-) Remboursement du mois (k)','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
$tbl_content[] = array(
						'size'=>$row_size,
						'content'=>array(
										array('size'=>($table_width * 0.35),'content'=>'4. Cr??ances fin de mois de mois (H) = (e+f)-(g)','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.35),'content'=>'4. Dettes fin de mois (L)  = (i+ j) -(k)','font'=>$font_small_8,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null),
										array('size'=>($table_width * 0.15),'content'=>'','font'=>null,'format'=>$withBorder, 'colspan'=>null, 'rowspan'=>null)
									)
					);
					
$tbl_content[] = array(
						'size'=>($row_size*1.6),
						'content'=>array(
										array('size'=>($table_width * 0.35),'content'=>"Ensemble des cr??ances : tout ce que l'on doit ?? la FOSA  en argent, en bien (ex : m??dicaments..) ou en service (ex : consultations???)". EOL ." Ensemble des dettes : tout ce que la FOSA doit en argent  en bien (ex : m??dicaments..) ou service (consultations???)",'font'=>$font_small_7,'format'=>$withBorder, 'colspan'=>$cellColSpanInner4, 'rowspan'=>null)
										
									)
					);
				
					
foreach($tbl_content as $row_prop){
	$table->addRow($row_prop['size'],array('exactHeight'=>true));
	foreach($row_prop['content'] as $cell_prop){
		if($cell_prop['rowspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['rowspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
		else if($cell_prop['colspan'] != null)
			$table->addCell($cell_prop['size'],$cell_prop['colspan'],@$cell_prop['format'])->addText(htmlspecialchars(@$cell_prop['content'],ENT_COMPAT,'UTF-8'),$cell_prop['font'],@$cell_prop['align']);
		else
			$table->addCell($cell_prop['size'],$cell_prop['format'])->addText(htmlspecialchars($cell_prop['content'],ENT_COMPAT,'UTF-8'),@$cell_prop['font'],@$cell_prop['align']);
	}
}
/*  */
end_try:
// Save file
echo write($phpWord, basename(__FILE__, '.php'), $writers);
if (!CLI) {
    include_once 'Sample_Footer.php';
}
