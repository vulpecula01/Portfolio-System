<?php

$html = '
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<div>
	<h2 style="text-align:center;margin-button:0px;">
		Portfolio<br/>
		ระบบจัดงานวิจัยและแฟ้มประวัติอาจารย์<br/>
	</h2>
	<h3 style="text-align:center;">
		<img style="width:140px;" src="'.site_url("getpic?image=").$person['usr_picpath'].'"/><br/>';
		if ($person['usr_istea'] == '1') {
			$html = $html.'
			'.$person['acr_ename'].' '.$person['usrename'].' <br/>
			'.$person['acr_tname'].' '.$person['usrtname'].' <br/>';
		} else {
			$html = $html.'
			'.$person['tit_ename'].' '.$person['usrename'].' <br/>
			'.$person['tit_tname'].' '.$person['usrtname'].' <br/>';
		}

$html = $html.'</h3>
</div>
<hr/>

<h4>General Information (ข้อมูลทั่วไป)</h4>
<ul style="list-style-type:none">
	<li style="margin-left:-20px;">'.$person['acr_ename'].' '.$person['dep_ename'].' ('.$person['acr_tname'].' สาขาวิชา'.$person['dep_tname'].')</li>
	<li style="margin-left:-20px;">'.$person['dep_ename'].' (ภาควิชา'.$person['dep_tname'].') </li>
	<li style="margin-left:-20px;">Contact (การติดต่อ)
		<ul style="list-style-type:disc">';
///////////////////////////////  TEL ////////////////////////////////////////////
if($tel == NULL){
	$html = $html.'<li>N/A</li>';
}else{
	foreach ($tel as $key) {
		$html = $html.'<li>'.$key['tel'].' : '.$key['tel_number'].'</li>';
	}
}

$html = $html.'</ul>
	</li>
	<li style="margin-left:-20px;">E-mail
		<ul style="list-style-type:disc">';
///////////////////////////////  MAIL ////////////////////////////////////////////
if($mail == NULL){
	$html = $html.'<li>N/A</li>';
}else{
	foreach ($mail as $key) {
		$html = $html.'<li>'.$key['mail_name'].'</li>';
	}
}

$html = $html.'</ul>
	</li>
</ul>

<h4>Education Background (ประวัติการศึกษา)</h4>
<ul>';
///////////////////////////////  EDUCATION BACKGROUNDG ////////////////////////////////////////////
if($bg == NULL){
	$html = $html.'<li>N/A</li>';
}else{
	foreach ($bg as $key) {
		$html = $html.'<li>'.$key['deg_eacronym'].', '.$key['maj_ename'].', '.$key['ins_ename'].', '.$key['cou_ename'].', '.$key['edb_yeargraduate'].'</li>';
	}
}
$html = $html.'</ul>

<h4>Jobs Experience (ประสบการณ์การทํางาน)</h4>
<ul>';
///////////////////////////////  JOB EXPERIENCE ////////////////////////////////////////////
if($job == NULL){
	$html = $html.'<li>N/A</li>';
}else{
	foreach ($job as $key) {
		$html = $html.'<li>'.$key['jox_ename'].' ('.$key['start'].' - '.$key['end'].') </li>';
	}
}
$html = $html.'</ul>

<h4>The Award (รางวัลที่เคยได้รับ)</h4>
<ul>';
///////////////////////////////  AWARD ////////////////////////////////////////////
if($award == NULL){
	$html = $html.'<li>N/A</li>';
}else{
	foreach ($award as $key) {
		$html = $html.'<li>'.$key['awd_ename'].' ('.$key['awd_date'].') '.$key['awd_einsitute'].'</li>';
	}
}

$html = $html.'</ul>

<h4>Research (ผลงานวิจัย)</h4>
<ul style="list-style-type:none">
	<li class="header">Research Project (โครงการวิจัย)</li>
	<ul style="list-style-type:disc">';
// echo "<pre>";
// var_dump($research);
// die();
// echo "</pre>";
	$i = 0;
	foreach ($research as $key) {
		if ($key['type'] == '1') {
			$html = $html.'<li>'.strip_tags($key['reference']).'</li>';
			$i++;
		}
	}
	if ($i == 0) {
		$html = $html.'<li>N/A</li>';
	}

$html = $html.'</ul> 
	<li class="header">Journal (วารสาร)</li>
	<ul style="list-style-type:disc">
		<li class="header">National (ระดับชาติ)</li>
		<ul>';
		$i = 0;
			foreach ($research as $key) {
				if ($key['type'] == '2' && $key['rlv'] == 'National') {
					$html = $html.'<li>'.strip_tags($key['reference']).'</li>';
					$i++;
				}
			}
			if ($i == 0) {
				$html = $html.'<li>N/A</li>';
			}
$html = $html.'</ul>
		<li class="header">International (ระดับนานาชาติ)</li>
		<ul>';
		$i = 0;
			foreach ($research as $key) {
				if ($key['type'] == '2' && $key['rlv'] == 'International') {
					$html = $html.'<li>'.strip_tags($key['reference']).'</li>';
					$i++;
				}
			}
			if ($i == 0) {
				$html = $html.'<li>N/A</li>';
			}
$html = $html.'</ul>
	</ul>
	<li class="header">Proceeding (เอกสารการประชุมวิชาการ)</li>
		<ul style="list-style-type:disc">
		<li class="header">National (ระดับชาติ)</li>
		<ul>';
		$i = 0;
			foreach ($research as $key) {
				if ($key['type'] == '3' && $key['rlv'] == 'National') {
					$html = $html.'<li>'.strip_tags($key['reference']).'</li>';
					$i++;
				}
			}
			if ($i == 0) {
				$html = $html.'<li>N/A</li>';
			}
$html = $html.'</ul>
		<li class="header">International (ระดับนานาชาติ)</li>
		<ul>';
		$i = 0;
			foreach ($research as $key) {
				if ($key['type'] == '3' && $key['rlv'] == 'International') {
					$html = $html.'<li>'.strip_tags($key['reference']).'</li>';
					$i++;
				}
			}
			if ($i == 0) {
				$html = $html.'<li>N/A</li>';
			}
$html = $html.'</ul>
	</ul>
</ul>

<h4>Topics of interest (หัวข้อที่สนใจ)</h4>
<ul>';
///////////////////////////////  TOPIC ////////////////////////////////////////////
if($itr_topic == NULL){
	$html = $html.'<li>N/A</li>';
}else{
	foreach ($itr_topic as $key) {
		$html = $html.'<li>'.$key['int_ename'].'</li>';
	}
}
$html = $html.'</ul>

<h4>Areas of Expertise and Interest (สาขาที่เชี่ยวชาญและสนใจ)</h4>
<ul>';
///////////////////////////////  AREA of Expertise and Interes ////////////////////////
if($itr_maj == NULL){
	$html = $html.'<li>N/A</li>';
}else{
	foreach ($itr_maj as $key) {
		$html = $html.'<li>'.$key['int_ename'].'</li>';
	}
}
$html = $html.'</ul>';



$html = $html.'</ul>

<h4>Letter of Instruction (หนังสือคำสั่ง)</h4>
<ul>';
///////////////////////////////  AREA of Expertise and Interes ////////////////////////
if($let == NULL){
	$html = $html.'<li>N/A</li>';  
}else{

	foreach ($let as $row) {
		$html = $html.'<li>'."Correspondence No.".$row['let_id'].', '.$row['let_name'].'</li>';
		
	}
}
$html = $html.'</ul>
<h4>Activity (กิจกรรม)</h4>
<ul>';
if($award == NULL){
	$html = $html.'<li>N/A</li>';
}else{
	foreach ($activity as $key) {
		$html = $html.'<li>'.$key['at_name'].' ('.$key['at_ename'].') '.$key['at_date'].'</li>';
	}
}
$html = $html.'</ul>';





// echo $html;
// die();


//==============================================================
//==============================================================
//==============================================================

$this->load->library('mpdf60/mpdf');
$mpdf = new mPdf('th', 'A4', '0', 'THSaraban');
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($html);
$mpdf->Output();
exit;

//==============================================================
//==============================================================
//==============================================================


?>