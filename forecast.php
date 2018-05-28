<?php
echo generate();

function generate()//ข้าราชการระดับปฏิบัติงาน
{
	$usr_id = 34;
	$pos_id = 1;
	$usr_dateforwork = 2547;
	$currentdate = 2561;
	$sum = $currentdate-$usr_dateforwork;
	$sign_date = 2550;
	$positiondate = $currentdate-$sign_date;
	$usr_takeposition = 2550;
	$duty = $currentdate-$yearofposition;
	$count_dec[1] = 1 ;
	$count_dec[2] = 1 ;
	$count_dec[3] = 0 ;
	$count_dec[4] = 0 ;
	$salary = 300;
	if($pos_id == 1){//เช็คตำแหน่ง
		if($count_dec[1] == 1){//เช็คเครื่องอะไรแล้ว
		
				if($count_dec[2] == 1){
						if($count_dec[3] == 1){
							if($count_dec[4] == 1){
									return "ได้รับเครื่องราชสูงสุดแล้ว";
							}else{ 
								if($salary >= 10190 && $duty >= 10){
									return "คาดว่าจะได้รับ จ.ช.";
								}
							}
						}else {
							if($salary >= 10190){
								return "คาดว่าจะได้รับ จ.ม.";
							}
						}
				}else {
					if($salary < 10190 && $duty >= 10){
						return "คาดว่าจะได้รับ บ.ช.";
					}
				}
		}else{
			if($sum >= 5){
				return "คาดว่าจะได้รับ บ.ม.";
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

function generate2()//ข้าราชการระดับชำนาญงาน
{
	$usr_id = 34;
	$pos_id = 3;
	$usr_dateforwork = 2547;
	$currentdate = 2561;
	$sum = $currentdate-$usr_dateforwork;
	$sign_date = 2550;
	$positiondate = $currentdate-$sign_date;
	$yearofposition = 2550;
	$duty = $currentdate-$yearofposition;
	$count_dec[5] = 1 ;
	$count_dec[6] = 0 ;
	
	$salary = 120000;
	if($pos_id == 3){//เช็คตำแหน่ง
		if($count_dec[5] == 1){//เช็คเครื่องอะไรแล้ว
		
				if($count_dec[6] == 1){
						return "ได้รับเครื่องราชสูงสุดแล้ว";
				}else {
					if($duty >= 5){
						return "คาดว่าจะได้รับ ต.ช.";
					}
				}
		}else{
			if($sum >= 5){
				return "คาดว่าจะได้รับ ต.ม.";
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}
function generate3()//ข้าราชการระดับอาวุโส
{
	$usr_id = 34;
	$pos_id = 4;
	$usr_dateforwork = 2547;
	$currentdate = 2561;
	$sum = $currentdate-$usr_dateforwork;
	$sign_date = 2559;
	$positiondate = $currentdate-$sign_date;
	$yearofposition = 2550;
	$duty = $currentdate-$yearofposition;
	$count_dec[7] = 1 ;
	$count_dec[8] = 0 ;
	
	$salary = 120000;
	if($pos_id == 4){//เช็คตำแหน่ง
		if($count_dec[7] == 1){//เช็คเครื่องอะไรแล้ว
		
				if($count_dec[8] == 1){
						return "ได้รับเครื่องราชสูงสุดแล้ว";
				}else {
					if($duty >= 5){
						return "คาดว่าจะได้รับ ท.ช.";
					}
				}
		}else{
			if($sum >= 5){
				return "คาดว่าจะได้รับ ต.ม.";
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

function generate4()//ข้าราชการระดับปฏิบัติการ
{
	$usr_id = 34;
	$pos_id = 5;
	$usr_dateforwork = 2550;
	$currentdate = 2561;
	$sum = $currentdate-$usr_dateforwork;
	$sign_date = 2559;
	$positiondate = $currentdate-$sign_date;
	$yearofposition = 2550;
	$duty = $currentdate-$yearofposition;
	$count_dec[5] = 0 ;
	
	
	$salary = 120000;
	if($pos_id == 5){//เช็คตำแหน่ง
		if($count_dec[5] == 1){//เช็คเครื่องอะไรแล้ว
				"ได้รับเครื่องราชสูงสุดแล้ว";
		}else{
			if($sum >= 5){
				return "คาดว่าจะได้รับ ต.ม.";
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

function generate5()//ข้าราชการระดับชำนาญการ
{
	$usr_id = 34;
	$pos_id = 6;
	$usr_dateforwork = 2547;
	$currentdate = 2561;
	$sum = $currentdate-$usr_dateforwork;
	$sign_date = 2550;
	$positiondate = $currentdate-$sign_date;
	$yearofposition = 2550;
	$duty = $currentdate-$yearofposition;
	$count_dec[6] = 1 ;
	$count_dec[7] = 0 ;
	$count_dec[8] = 0 ;
	
	$salary = 20000;
	if($pos_id == 6){//เช็คตำแหน่ง
		if($count_dec[6] == 1){//เช็คเครื่องอะไรแล้ว
		
				if($count_dec[7] == 1){
						if($count_dec[8] == 1){
								return "ได้รับเครื่องราชสูงสุดแล้ว";
						}else {
							if($salary >= 53080){
								return "คาดว่าจะได้รับ ท.ช";
							}
						}
				}else {
					if($salary >= 22140){
						return "คาดว่าจะได้รับ ท.ม.";
					}
				}
		}else{
			if($sum >= 5){
				return "คาดว่าจะได้รับ ต.ช.";
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

function generate6()//ข้าราชการระดับเชียญชาญพิเศษ
{
	$usr_id = 34;
	$pos_id = 7;
	$usr_dateforwork = 2547;
	$currentdate = 2561;
	$sum = $currentdate-$usr_dateforwork;
	$sign_date = 2559;
	$positiondate = $currentdate-$sign_date;
	$yearofposition = 2550;
	$duty = $currentdate-$yearofposition;
	$count_dec[8] = 1 ;
	$count_dec[9] = 0 ;
	
	$salary = 120000;
	if($pos_id == 7){//เช็คตำแหน่ง
		if($count_dec[8] == 1){//เช็คเครื่องอะไรแล้ว
		
				if($count_dec[9] == 1){
						return "ได้รับเครื่องราชสูงสุดแล้ว";
				}else {
					if($positiondate >= 5 && $salary >= 53080){
						return "คาดว่าจะได้รับ ป.ม.";
					}
				}
		}else{
			if($sum >= 5){
				return "คาดว่าจะได้รับ ท.ช.";
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

function generate7()//ข้าราชการระดับเชี่ยวชาญ
{
	$usr_id = 34;
	$pos_id = 8;
	$usr_dateforwork = 2547;
	$currentdate = 2561;
	$sum = $currentdate-$usr_dateforwork;
	$sign_date = 2550;
	$positiondate = $currentdate-$sign_date;
	$yearofposition = 2550;
	$duty = $currentdate-$yearofposition;
	$count_dec[8] = 1 ;
	$count_dec[9] = 1 ;
	$count_dec[10] = 0 ;
	$count_dec[11] = 0 ;
	$salary = 120000;
	if($pos_id == 8){//เช็คตำแหน่ง
		if($count_dec[8] == 1){//เช็คเครื่องอะไรแล้ว
		
				if($count_dec[9] == 1){
						if($count_dec[10] == 1){
							if($count_dec[11] == 1){
									return "ได้รับเครื่องราชสูงสุดแล้ว";
							}else{ 
								if($positiondate >= 5){
									return "คาดว่าจะได้รับ ม.ว.ม.";
								}
							}
						}else {
							if($positiondate >= 3){
								return "คาดว่าจะได้รับ ป.ช.";
							}
						}
				}else {
					if($positiondate >= 3){
						return "คาดว่าจะได้รับ ป.ม.";
					}
				}
		}else{
			if($sum >= 5){
				return "คาดว่าจะได้รับ ท.ช.";
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

function generate8()//ข้าราชการเปลี่ยนสถานะระดับ 1
{
	$usr_id = 34;
	$pos_id = 9;
	$usr_dateforwork = 2547;
	$currentdate = 2561;
	$sum = $currentdate-$usr_dateforwork;
	$sign_date = 2559;
	$positiondate = $currentdate-$sign_date;
	$yearofposition = 2550;
	$duty = $currentdate-$yearofposition;
	$count_dec[13] = 1 ;
	$count_dec[14] = 0 ;
	
	$salary = 120000;
	if($pos_id == 9){//เช็คตำแหน่ง
		if($count_dec[13] == 1){//เช็คเครื่องอะไรแล้ว
		
				if($count_dec[14] == 1){
						return "ได้รับเครื่องราชสูงสุดแล้ว";
				}else {
					if($duty >= 5){
						return "คาดว่าจะได้รับ ร.ท.ช.";
					}
				}
		}else{
			if($sum >= 5){
				return "คาดว่าจะได้รับ ร.ง.ม.";
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

function generate9()//ข้าราชการเปลี่ยนสถานะระดับ 2
{
	$usr_id = 34;
	$pos_id = 2;
	$usr_dateforwork = 2547;
	$currentdate = 2561;
	$sum = $currentdate-$usr_dateforwork;
	$sign_date = 2559;
	$positiondate = $currentdate-$sign_date;
	$yearofposition = 2550;
	$duty = $currentdate-$yearofposition;
	$count_dec[1] = 1 ;
	$count_dec[2] = 0 ;
	
	$salary = 120000;
	if($pos_id == 2){//เช็คตำแหน่ง
		if($count_dec[1] == 1){//เช็คเครื่องอะไรแล้ว
		
				if($count_dec[2] == 1){
						return "ได้รับเครื่องราชสูงสุดแล้ว";
				}else {
					if($duty >= 5){
						return "คาดว่าจะได้รับ บ.ช.";
					}
				}
		}else{
			if($sum >= 5){
				return "คาดว่าจะได้รับ บ.ม.";
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

function generate10()//ข้าราชการเปลี่ยนสถานะระดับ 3 และ 4
{
	$usr_id = 34;
	$pos_id = 10;
	$usr_dateforwork = 2547;
	$currentdate = 2561;
	$sum = $currentdate-$usr_dateforwork;
	$sign_date = 2559;
	$positiondate = $currentdate-$sign_date;
	$yearofposition = 2550;
	$duty = $currentdate-$yearofposition;
	$count_dec[3] = 1 ;
	$count_dec[4] = 0 ;
	
	$salary = 120000;
	if($pos_id == 10){//เช็คตำแหน่ง
		if($count_dec[3] == 1){//เช็คเครื่องอะไรแล้ว
		
				if($count_dec[4] == 1){
						return "ได้รับเครื่องราชสูงสุดแล้ว";
				}else {
					if($duty >= 5){
						return "คาดว่าจะได้รับ จ.ช.";
					}
				}
		}else{
			if($sum >= 5){
				return "คาดว่าจะได้รับ จ.ม.";
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

function generate11()//ข้าราชการเปลี่ยนสถานะระดับ 5 และ 6
{
	$usr_id = 34;
	$pos_id = 11;
	$usr_dateforwork = 2547;
	$currentdate = 2561;
	$sum = $currentdate-$usr_dateforwork;
	$sign_date = 2559;
	$positiondate = $currentdate-$sign_date;
	$yearofposition = 2550;
	$duty = $currentdate-$yearofposition;
	$count_dec[5] = 1 ;
	$count_dec[6] = 0 ;
	
	$salary = 120000;
	if($pos_id == 11){//เช็คตำแหน่ง
		if($count_dec[5] == 1){//เช็คเครื่องอะไรแล้ว
		
				if($count_dec[6] == 1){
						return "ได้รับเครื่องราชสูงสุดแล้ว";
				}else {
					if($duty >= 5){
						return "คาดว่าจะได้รับ ต.ช.";
					}
				}
		}else{
			if($sum >= 5){
				return "คาดว่าจะได้รับ ต.ม.";
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

function generate12()//ข้าราชการเปลี่ยนสถานะระดับ 7 และ 8
{
	$usr_id = 34;
	$pos_id = 12;
	$usr_dateforwork = 2547;
	$currentdate = 2561;
	$sum = $currentdate-$usr_dateforwork;
	$sign_date = 2559;
	$positiondate = $currentdate-$sign_date;
	$yearofposition = 2550;
	$duty = $currentdate-$yearofposition;
	$count_dec[7] = 1 ;
	$count_dec[8] = 0 ;
	
	$salary = 120000;
	if($pos_id == 12){//เช็คตำแหน่ง
		if($count_dec[7] == 1){//เช็คเครื่องอะไรแล้ว
		
				if($count_dec[8] == 1){
						return "ได้รับเครื่องราชสูงสุดแล้ว";
				}else {
					if($duty >= 5){
						return "คาดว่าจะได้รับ ท.ช.";
					}
				}
		}else{
			if($sum >= 5){
				return "คาดว่าจะได้รับ ท.ม.";
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

function generate13()//ข้าราชการเปลี่ยนสถานะระดับ 8
{
	$usr_id = 34;
	$pos_id = 13;
	$usr_dateforwork = 2545;
	$currentdate = 2561;
	$sum = $currentdate-$usr_dateforwork;
	$sign_date = 2555;
	$positiondate = $currentdate-$sign_date;
	$yearofposition = 2550;
	$duty = $currentdate-$yearofposition;
	$count_dec[8] = 1 ;
	$count_dec[9] = 0 ;
	
	$salary = 120000;
	if($pos_id == 13){//เช็คตำแหน่ง
		if($count_dec[8] == 1){//เช็คเครื่องอะไรแล้ว
		
				if($count_dec[9] == 1){
						return "ได้รับเครื่องราชสูงสุดแล้ว";
				}else {
					if($salary >= 42170 && $positiondate >= 5){
						return "คาดว่าจะได้รับ ป.ม.";
					}
				}
		}else{
			if($sum >= 5){
				return "คาดว่าจะได้รับ ท.ช.";
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

/*function generate14()//ข้าราชการเปลี่ยนสถานะระดับ 9
{
	$usr_id = 34;
	$pos_id = 14;
	$usr_dateforwork = 2545;
	$currentdate = 2561;
	$sum = $currentdate-$usr_dateforwork;
	$sign_date = 2555; //ปีที่ได้เครื่องราชล่าสุด
	$positiondate = $currentdate-$sign_date;
	$yearofposition = 2550;
	$duty = $currentdate-$yearofposition;
	$count_dec[8] = 1 ;
	$count_dec[9] = 1 ;
	$count_dec[10] = 0 ;
	$count_dec[11] = 0 ;
	
	$salary = 120000;
	if($pos_id == 14){//เช็คตำแหน่ง
		if($count_dec[8] == 1){//เช็คเครื่องอะไรแล้ว
		
				if($count_dec[9] == 1){
						if($count_dec[10] == 1){
								if($count_dec[11] == 1){
										return "ได้รับเครื่องราชสูงสุดแล้ว";
								}else {
										if($positiondate >= 3){
											return "คาดว่าจะได้รับ ม.ว.ม.";
									}
								}
						}else {
							if($positiondate >= 3){
									return "คาดว่าจะได้รับ ป.ช.";
								}
						}
				}else {
					if($positiondate >= 3){
						return "คาดว่าจะได้รับ ป.ม.";
					}
				}
		}else{
			if($sum >= 5){
				return "คาดว่าจะได้รับ ท.ช.";
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}
function generate15()//ข้าราชการเปลี่ยนสถานะระดับ 10
{
	$usr_id = 34;
	$pos_id = 14;
	$usr_dateforwork = 2545;
	$currentdate = 2561;
	$sum = $currentdate-$usr_dateforwork;
	$sign_date = 2555; //ปีที่ได้เครื่องราชล่าสุด
	$positiondate = $currentdate-$sign_date;
	$yearofposition = 2550;
	$duty = $currentdate-$yearofposition;
	$count_dec[8] = 1 ;
	$count_dec[9] = 1 ;
	$count_dec[10] = 0 ;
	$count_dec[11] = 0 ;
	
	$salary = 120000;
	if($pos_id == 14){//เช็คตำแหน่ง
		if($count_dec[8] == 1){//เช็คเครื่องอะไรแล้ว
		
				if($count_dec[9] == 1){
						if($count_dec[10] == 1){
								if($count_dec[11] == 1){
										return "ได้รับเครื่องราชสูงสุดแล้ว";
								}else {
										if($positiondate >= 3){
											return "คาดว่าจะได้รับ ม.ว.ม.";
									}
								}
						}else {
							if($positiondate >= 3){
									return "คาดว่าจะได้รับ ป.ช.";
								}
						}
				}else {
					if($positiondate >= 3){
						return "คาดว่าจะได้รับ ป.ม.";
					}
				}
		}else{
			if($sum >= 5){
				return "คาดว่าจะได้รับ ท.ช.";
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

function generate16()//ข้าราชการเปลี่ยนสถานะระดับ 11
{
	$usr_id = 34;
	$pos_id = 14;
	$usr_dateforwork = 2545;
	$currentdate = 2561;
	$sum = $currentdate-$usr_dateforwork;
	$sign_date = 2555; //ปีที่ได้เครื่องราชล่าสุด
	$positiondate = $currentdate-$sign_date;
	$yearofposition = 2550;
	$duty = $currentdate-$yearofposition;
	$count_dec[8] = 1 ;
	$count_dec[9] = 1 ;
	$count_dec[10] = 0 ;
	$count_dec[11] = 0 ;
	
	$salary = 120000;
	if($pos_id == 14){//เช็คตำแหน่ง
		if($count_dec[8] == 1){//เช็คเครื่องอะไรแล้ว
		
				if($count_dec[9] == 1){
						if($count_dec[10] == 1){
								if($count_dec[11] == 1){
										return "ได้รับเครื่องราชสูงสุดแล้ว";
								}else {
										if($positiondate >= 3){
											return "คาดว่าจะได้รับ ม.ว.ม.";
									}
								}
						}else {
							if($positiondate >= 3){
									return "คาดว่าจะได้รับ ป.ช.";
								}
						}
				}else {
					if($positiondate >= 3){
						return "คาดว่าจะได้รับ ป.ม.";
					}
				}
		}else{
			if($sum >= 5){
				return "คาดว่าจะได้รับ ท.ช.";
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}
*/

function generate17()//พนักงานตำแหน่งประจำแผนกหรือเทียบเท่า
{
	$usr_id = 34;
	$pos_id = 17;
	$usr_dateforwork = 2530;
	$currentdate = 2561;
	$sum = $currentdate-$usr_dateforwork;//วันที่เข้าทำงาน
	$sign_date = 2550; //ปีที่ได้เครื่องราชล่าสุด
	$positiondate1 = $currentdate-$sign_date;
	$positiondate2 = $currentdate-($sign_date+5);   
	$positiondate3 = $currentdate-($sign_date+5+5);

	$yearofposition = 2550;
	$duty = $currentdate-$yearofposition;
	$count_dec[1] = 1 ;
	$count_dec[2] = 1 ;
	$count_dec[3] = 1 ;
	$count_dec[4] = 0 ;
	
	$salary = 120000;
	if($pos_id == 17){//เช็คตำแหน่ง
		if($count_dec[1] == 1){//เช็คเครื่องอะไรแล้ว
		
				if($count_dec[2] == 1){
						if($count_dec[3] == 1){
								if($count_dec[4] == 1){
										return "ได้รับเครื่องราชสูงสุดแล้ว";
								}else {
										if($positiondate3 >= 5){
											return "คาดว่าจะได้รับ จ.ช.";
									}
								}
						}else {
							if($positiondate2 >= 5){
									return "คาดว่าจะได้รับ จ.ม.";
								}
						}
				}else {
					if($positiondate1 >= 5){
						return "คาดว่าจะได้รับ บ.ช.";
					}
				}
		}else{
			if($sum >= 5){
				return "คาดว่าจะได้รับ บ.ม.";
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

function generate18()//พนักงานหัวหน้าแผนกหรือเทียบเท่า
{
	$usr_id = 34;
	$pos_id = 18;
	$usr_dateforwork = 2530;
	$currentdate = 2561;
	$sum = $currentdate-$usr_dateforwork;//วันที่เข้าทำงาน
	$sign_date = 2550; //ปีที่ได้เครื่องราชล่าสุด
	$positiondate1 = $currentdate-$sign_date;
	$positiondate2 = $currentdate-($sign_date+5);   
	

	$yearofposition = 2550;
	$duty = $currentdate-$yearofposition;
	$count_dec[3] = 1 ;
	$count_dec[4] = 1 ;
	$count_dec[5] = 1 ;

	
	$salary = 120000;
	if($pos_id == 18){//เช็คตำแหน่ง
		if($count_dec[3] == 1){//เช็คเครื่องอะไรแล้ว
		
				if($count_dec[4] == 1){
						if($count_dec[5] == 1){
									return "ได้รับเครื่องราชสูงสุดแล้ว";
								
						}else {
							if($positiondate2 >= 5){
									return "คาดว่าจะได้รับ ต.ม.";
								}
						}
				}else {
					if($positiondate1 >= 5){
						return "คาดว่าจะได้รับ จ.ช.";
					}
				}
		}else{
			if($sum >= 5){
				return "คาดว่าจะได้รับ จ.ม.";
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

function generate19()//ผู้ช่วยศาสตราจารย์หรืออาจารย์
{
	$usr_id = 34;
	$pos_id = 19;
	$usr_dateforwork = 2530;
	$currentdate = 2561;
	$sum = $currentdate-$usr_dateforwork;//วันที่เข้าทำงาน
	$sign_date = 2545; //ปีที่ได้เครื่องราชล่าสุด
	$positiondate1 = $currentdate-$sign_date;
	$positiondate2 = $currentdate-($sign_date+5);   
	$positiondate3 = $currentdate-($sign_date+5+5);

	$yearofposition = 2550;
	$duty = $currentdate-$yearofposition;
	$count_dec[4] = 1 ;
	$count_dec[5] = 1 ;
	$count_dec[6] = 1 ;
	$count_dec[7] = 0 ;
	
	$salary = 120000;
	if($pos_id == 19){//เช็คตำแหน่ง
		if($count_dec[4] == 1){//เช็คเครื่องอะไรแล้ว
		
				if($count_dec[5] == 1){
						if($count_dec[6] == 1){
								if($count_dec[7] == 1){
										return "ได้รับเครื่องราชสูงสุดแล้ว";
								}else {
										if($positiondate3 >= 5){
											return "คาดว่าจะได้รับ ท.ม.";
									}
								}
						}else {
							if($positiondate2 >= 5){
									return "คาดว่าจะได้รับ ต.ช.";
								}
						}
				}else {
					if($positiondate1 >= 5){
						return "คาดว่าจะได้รับ ต.ม.";
					}
				}
		}else{
			if($sum >= 5){
				return "คาดว่าจะได้รับ จ.ช.";
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

function generate20()//ผู้ช่วยอธิการบดี รองคณบดี หรือตำแหน่งเทียบเท่า
{
	$usr_id = 34;
	$pos_id = 20;
	$usr_dateforwork = 2530;
	$currentdate = 2561;
	$sum = $currentdate-$usr_dateforwork;//วันที่เข้าทำงาน
	$sign_date = 2545; //ปีที่ได้เครื่องราชล่าสุด
	$positiondate1 = $currentdate-$sign_date;
	$positiondate2 = $currentdate-($sign_date+5);   

	$yearofposition = 2550;
	$duty = $currentdate-$yearofposition;
	$count_dec[5] = 1 ;
	$count_dec[6] = 1 ;
	$count_dec[7] = 1 ;

	
	$salary = 120000;
	if($pos_id == 20){//เช็คตำแหน่ง
		if($count_dec[5] == 1){//เช็คเครื่องอะไรแล้ว
		
				if($count_dec[6] == 1){
						if($count_dec[7] == 1){
								return "ได้รับเครื่องราชสูงสุดแล้ว";
						}else {
							if($positiondate2 >= 5){
									return "คาดว่าจะได้รับ ท.ม.";
								}
						}
				}else {
					if($positiondate1 >= 5){
						return "คาดว่าจะได้รับ ต.ช.";
					}
				}
		}else{
			if($sum >= 5){
				return "คาดว่าจะได้รับ ต.ม.";
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

function generate21()//รองศาสตราจารย์
{
	$usr_id = 34;
	$pos_id = 21;
	$usr_dateforwork = 2530;
	$currentdate = 2561;
	$sum = $currentdate-$usr_dateforwork;//วันที่เข้าทำงาน
	$sign_date = 2545; //ปีที่ได้เครื่องราชล่าสุด
	$positiondate1 = $currentdate-$sign_date;
	$positiondate2 = $currentdate-($sign_date+5);   
	$positiondate3 = $currentdate-($sign_date+5+5);

	$yearofposition = 2550;
	$duty = $currentdate-$yearofposition;
	$count_dec[5] = 1 ;
	$count_dec[6] = 0 ;
	$count_dec[7] = 0 ;
	$count_dec[8] = 0 ;
	
	$salary = 120000;
	if($pos_id == 21){//เช็คตำแหน่ง
		if($count_dec[5] == 1){//เช็คเครื่องอะไรแล้ว
		
				if($count_dec[6] == 1){
						if($count_dec[7] == 1){
								if($count_dec[8] == 1){
										return "ได้รับเครื่องราชสูงสุดแล้ว";
								}else {
										if($positiondate3 >= 5){
											return "คาดว่าจะได้รับ ท.ช.";
									}
								}
						}else {
							if($positiondate2 >= 5){
									return "คาดว่าจะได้รับ ท.ม.";
								}
						}
				}else {
					if($positiondate1 >= 5){
						return "คาดว่าจะได้รับ ต.ช.";
					}
				}
		}else{
			if($sum >= 5){
				return "คาดว่าจะได้รับ ต.ม.";
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

function generate22()//รองอธิการบดี คณบดี หรือ ตำแหน่งเทียบเท่า
{
	$usr_id = 34;
	$pos_id = 22;
	$usr_dateforwork = 2530;
	$currentdate = 2561;
	$sum = $currentdate-$usr_dateforwork;//วันที่เข้าทำงาน
	$sign_date = 2545; //ปีที่ได้เครื่องราชล่าสุด
	$positiondate1 = $currentdate-$sign_date;
	$yearofposition = 2550;
	$duty = $currentdate-$yearofposition;
	$count_dec[7] = 0 ;
	$count_dec[8] = 0 ;
	
	$salary = 120000;
	if($pos_id == 22){//เช็คตำแหน่ง
		if($count_dec[5] == 1){//เช็คเครื่องอะไรแล้ว
		
				if($count_dec[6] == 1){
						return "ได้รับเครื่องราชสูงสุดแล้ว";
				}else {
					if($positiondate1 >= 5){
						return "คาดว่าจะได้รับ ท.ช.";
					}
				}
		}else{
			if($sum >= 5){
				return "คาดว่าจะได้รับ ท.ม.";
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

function generate23()//ศาสตราจารย์
{
	$usr_id = 34;
	$pos_id = 23;
	$usr_dateforwork = 2530;
	$currentdate = 2561;
	$sum = $currentdate-$usr_dateforwork;//วันที่เข้าทำงาน
	$sign_date = 2545; //ปีที่ได้เครื่องราชล่าสุด
	$positiondate1 = $currentdate-$sign_date;
	$positiondate2 = $currentdate-($sign_date+5);   
	$positiondate3 = $currentdate-($sign_date+5+3);

	$yearofposition = 2550;
	$duty = $currentdate-$yearofposition;
	$count_dec[7] = 1 ;
	$count_dec[8] = 0 ;
	$count_dec[9] = 0 ;
	$count_dec[10] = 0 ;
	
	$salary = 120000;
	if($pos_id == 23){//เช็คตำแหน่ง
		if($count_dec[7] == 1){//เช็คเครื่องอะไรแล้ว
		
				if($count_dec[8] == 1){
						if($count_dec[9] == 1){
								if($count_dec[10] == 1){
										return "ได้รับเครื่องราชสูงสุดแล้ว";
								}else {
										if($positiondate3 >= 3){
											return "คาดว่าจะได้รับ ป.ช.";
									}
								}
						}else {
							if($positiondate2 >= 3){
									return "คาดว่าจะได้รับ ป.ม.";
								}
						}
				}else {
					if($positiondate1 >= 5){
						return "คาดว่าจะได้รับ ท.ช.";
					}
				}
		}else{
			if($sum >= 5){
				return "คาดว่าจะได้รับ ท.ม.";
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

function generate24()//อธิการบดี หรือ ตำแหน่งเทียบเท่า
{
	$usr_id = 34;
	$pos_id = 24;
	$usr_dateforwork = 2530;
	$currentdate = 2561;
	$sum = $currentdate-$usr_dateforwork;//วันที่เข้าทำงาน
	$sign_date = 2545; //ปีที่ได้เครื่องราชล่าสุด
	$positiondate1 = $currentdate-$sign_date;
	$positiondate2 = $currentdate-($sign_date+5);   
	

	$yearofposition = 2550;
	$duty = $currentdate-$yearofposition;
	$count_dec[7] = 1 ;
	$count_dec[8] = 0 ;
	$count_dec[9] = 0 ;

	
	$salary = 120000;
	if($pos_id == 24){//เช็คตำแหน่ง
		if($count_dec[7] == 1){//เช็คเครื่องอะไรแล้ว
		
				if($count_dec[8] == 1){
						if($count_dec[9] == 1){
								return "ได้รับเครื่องราชสูงสุดแล้ว";
						}else {
							if($positiondate2 >= 3){
									return "คาดว่าจะได้รับ ป.ม.";
								}
						}
				}else {
					if($positiondate1 >= 5){
						return "คาดว่าจะได้รับ ท.ช.";
					}
				}
		}else{
			if($sum >= 5){
				return "คาดว่าจะได้รับ ท.ม.";
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

function generate25()//อธิการบดี หรือ ตำแหน่งเทียบเท่า
{
	$usr_id = 34;
	$pos_id = 25;
	$usr_dateforwork = 2530;
	$currentdate = 2561;
	$sum = $currentdate-$usr_dateforwork;//วันที่เข้าทำงาน
	$sign_date = 2545; //ปีที่ได้เครื่องราชล่าสุด
	$positiondate1 = $currentdate-$sign_date;
	$positiondate2 = $currentdate-($sign_date+5);   
	

	$yearofposition = 2550;
	$duty = $currentdate-$yearofposition;
	$count_dec[1] = 1 ;
	$count_dec[2] = 0 ;
	$count_dec[3] = 0 ;

	
	$salary = 120000;
	if($pos_id == 25){//เช็คตำแหน่ง
		if($count_dec[1] == 1){//เช็คเครื่องอะไรแล้ว
		
				if($count_dec[2] == 1){
						if($count_dec[3] == 1){
								return "ได้รับเครื่องราชสูงสุดแล้ว";
						}else {
							if($positiondate2 >= 5){
									return "คาดว่าจะได้รับ จ.ม.";
								}
						}
				}else {
					if($positiondate1 >= 5){
						return "คาดว่าจะได้รับ บ.ช.";
					}
				}
		}else{
			if($sum >= 8){
				return "คาดว่าจะได้รับ บ.ม.";
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}
function generate26()//อธิการบดี หรือ ตำแหน่งเทียบเท่า

{
	$usr_id = 34;
	$pos_id = 26;
	$usr_dateforwork = 2530;
	$currentdate = 2561;
	$sum = $currentdate-$usr_dateforwork;//วันที่เข้าทำงาน
	$sign_date = 2545; //ปีที่ได้เครื่องราชล่าสุด
	$positiondate1 = $currentdate-$sign_date;
	$positiondate2 = $currentdate-($sign_date+5);   
	

	$yearofposition = 2550;
	$duty = $currentdate-$yearofposition;
	$count_dec[2] = 1 ;
	$count_dec[3] = 0 ;
	$count_dec[4] = 0 ;

	
	$salary = 120000;
	if($pos_id == 26){//เช็คตำแหน่ง
		if($count_dec[2] == 1){//เช็คเครื่องอะไรแล้ว
		
				if($count_dec[3] == 1){
						if($count_dec[4] == 1){
								return "ได้รับเครื่องราชสูงสุดแล้ว";
						}else {
							if($positiondate2 >= 5){
									return "คาดว่าจะได้รับ จ.ช.";
								}
						}
				}else {
					if($positiondate1 >= 5){
						return "คาดว่าจะได้รับ จ.ม.";
					}
				}
		}else{
			if($sum >= 8){
				return "คาดว่าจะได้รับ บ.ช.";
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}
?>