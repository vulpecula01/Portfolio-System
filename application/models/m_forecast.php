<?php

class M_forecast extends Port_model {

	function generate_pos_1($usr_id)//ข้าราชการระดับปฏิบัติงาน
{
	// $usr_id = 34;

	// $currentdate = 2561;
	// $sum = $currentdate-$usr_dateforwork;
	// $sign_date = 2550;
	// $positiondate = $currentdate-$sign_date;
	

	$port_user = $this->get_user_by_id($usr_id)[0]; //เรียกไอดี user
	$port_user['pos_id'] = (int) $port_user['pos_id'];
	

	$salary = $port_user['usr_salary']; //เรียกเงินเดือน
	
	$usr_dateforwork = $port_user['usr_dateforwork']; // ปีที่เข้าทำงาน
	$sum = ( date('Y')+543 ) - $usr_dateforwork;//ปีล่าสุด - ปีที่ทำงาน
	
	
	
	$DEC_ID = (int) @$this->get_dec_by_id($usr_id)[0]['dec_id'];
	
	if($port_user['pos_id'] == 1){//เช็คตำแหน่ง
		if($DEC_ID >= 1){//เช็คเครื่องอะไรแล้ว
		
				if($DEC_ID >= 2){
					
						if($DEC_ID >= 3){
							if($DEC_ID >= 4){
									// return "ได้รับเครื่องราชสูงสุดแล้ว";
									return 4;
							}else{ 
								if($salary >= 10190 && $sum >= 10){
									// return "คาดว่าจะได้รับ จ.ช.";
									return 4;
								} 
							}
						}else {
							if($salary >= 10190){
								// return "คาดว่าจะได้รับ จ.ม.";
								return 3;
							}
						}
				}else {

					if($salary < 10190 && $sum >= 10){
						// return "คาดว่าจะได้รับ บ.ช.";
						return 2;
					} 
				}
		}else{
			if($sum >= 5){
				// return "คาดว่าจะได้รับ บ.ม.";
				return 1;
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

	function generate_pos_2($usr_id)//ข้าราชการระดับชำนาญงาน
{
	// $usr_id = 34;

	// $currentdate = 2561;
	// $sum = $currentdate-$usr_dateforwork;
	// $sign_date = 2550;
	// $positiondate = $currentdate-$sign_date;
	

	$port_user = $this->get_user_by_id($usr_id)[0]; //เรียกไอดี user
	$port_user['pos_id'] = (int) $port_user['pos_id'];
	

	$salary = $port_user['usr_salary']; //เรียกเงินเดือน
	$usr_dateforwork = $port_user['usr_dateforwork']; // ปีที่เข้าทำงาน
	$sum = ( date('Y')+543 ) - $usr_dateforwork;//ปีล่าสุด - ปีที่ทำงาน
	
	
	
	$DEC_ID = (int) @$this->get_dec_by_id($usr_id)[0]['dec_id'];
	
	if($port_user['pos_id'] == 3){//เช็คตำแหน่ง
		if($DEC_ID >= 5){//เช็คเครื่องอะไรแล้ว
		
				if($DEC_ID >= 6){
					
									return 6;
							}else{ 
								if($sum >= 10){
									// return "คาดว่าจะได้รับ จ.ช.";
									return 6;
								} 
							}
						
		}else{
			if($sum >= 5){
				// return "คาดว่าจะได้รับ บ.ม.";
				return 5;
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}
function generate_pos_3($usr_id)//ข้าราชการระดับอาวุโส
{
	// $usr_id = 34;

	// $currentdate = 2561;
	// $sum = $currentdate-$usr_dateforwork;
	// $sign_date = 2550;
	// $positiondate = $currentdate-$sign_date;
	

	$port_user = $this->get_user_by_id($usr_id)[0]; //เรียกไอดี user
	$port_user['pos_id'] = (int) $port_user['pos_id'];
	

	$salary = $port_user['usr_salary']; //เรียกเงินเดือน
	$usr_dateforwork = $port_user['usr_dateforwork']; // ปีที่เข้าทำงาน
	$sum = ( date('Y')+543 ) - $usr_dateforwork;//ปีล่าสุด - ปีที่ทำงาน
	
	
	
	$DEC_ID = (int) @$this->get_dec_by_id($usr_id)[0]['dec_id'];
	
	if($port_user['pos_id'] == 4){//เช็คตำแหน่ง
		if($DEC_ID >= 7){//เช็คเครื่องอะไรแล้ว
		
				if($DEC_ID >= 8){
					
									return 8;
							}else{ 
								if($sum >= 10){
									// return "คาดว่าจะได้รับ จ.ช.";
									return 8;
								} 
							}
						
		}else{
			if($sum >= 5){
				// return "คาดว่าจะได้รับ บ.ม.";
				return 7;
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}
function generate_pos_4($usr_id)//ข้าราชการระดับปฏิบัติการ
{
	// $usr_id = 34;

	// $currentdate = 2561;
	// $sum = $currentdate-$usr_dateforwork;
	// $sign_date = 2550;
	// $positiondate = $currentdate-$sign_date;
	

	$port_user = $this->get_user_by_id($usr_id)[0]; //เรียกไอดี user
	$port_user['pos_id'] = (int) $port_user['pos_id'];
	

	$salary = $port_user['usr_salary']; //เรียกเงินเดือน
	$usr_dateforwork = $port_user['usr_dateforwork']; // ปีที่เข้าทำงาน
	$sum = ( date('Y')+543 ) - $usr_dateforwork;//ปีล่าสุด - ปีที่ทำงาน
	
	
	
	$DEC_ID = (int) @$this->get_dec_by_id($usr_id)[0]['dec_id'];
	
	if($port_user['pos_id'] == 5){//เช็คตำแหน่ง
		if($DEC_ID >= 8){//เช็คเครื่องอะไรแล้ว
		
				return 8;
						
		}else{
			if($sum >= 5){
				// return "คาดว่าจะได้รับ บ.ม.";
				return 8;
			}
		}
	}
	
	return 'เงื่อนไขไม่ตรง';
}
	function generate_pos_5($usr_id)//ข้าราชการระดับปฏิบัติการ
{
	// $usr_id = 34;

	// $currentdate = 2561;
	// $sum = $currentdate-$usr_dateforwork;
	// $sign_date = 2550;
	// $positiondate = $currentdate-$sign_date;
	

	$port_user = $this->get_user_by_id($usr_id)[0]; //เรียกไอดี user
	$port_user['pos_id'] = (int) $port_user['pos_id'];
	

	$salary = $port_user['usr_salary']; //เรียกเงินเดือน
	$usr_dateforwork = $port_user['usr_dateforwork']; // ปีที่เข้าทำงาน
	$sum = ( date('Y')+543 ) - $usr_dateforwork;//ปีล่าสุด - ปีที่ทำงาน
	
	
	
	$DEC_ID = (int) @$this->get_dec_by_id($usr_id)[0]['dec_id'];
	
	if($port_user['pos_id'] == 6){//เช็คตำแหน่ง
		if($DEC_ID >= 6){//เช็คเครื่องอะไรแล้ว
		
				if($DEC_ID >= 7){
					
						if($DEC_ID >= 8){
							
									return 8;
							
						}else {
							if($salary >= 53080){
								
								return 8;
							}
						}
				}else {

					if($salary >= 22140){
						
						return 7;
					} 
				}
		}else{
			if($sum >= 5){
				
				return 6;
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}
function generate_pos_6($usr_id)//ข้าราชการระดับเชียญชาญพิเศษ
{
	// $usr_id = 34;

	// $currentdate = 2561;
	// $sum = $currentdate-$usr_dateforwork;
	// $sign_date = 2550;
	// $positiondate = $currentdate-$sign_date;
	

	$port_user = $this->get_user_by_id($usr_id)[0]; //เรียกไอดี user
	$port_user['pos_id'] = (int) $port_user['pos_id'];
	

	$salary = $port_user['usr_salary']; //เรียกเงินเดือน
	$usr_dateforwork = $port_user['usr_dateforwork']; // ปีที่เข้าทำงาน
	$sum = ( date('Y')+543 ) - $usr_dateforwork;//ปีล่าสุด - ปีที่ทำงาน
	
	
	
	$DEC_ID = (int) @$this->get_dec_by_id($usr_id)[0]['dec_id'];
	
	if($port_user['pos_id'] == 7){//เช็คตำแหน่ง
		if($DEC_ID >= 8){//เช็คเครื่องอะไรแล้ว
		
				if($DEC_ID >= 9){
					
						return 9;
							
						
				}else {

					if($salary >= 53080 && $sum >= 10){
						
						return 9;
					} 
				}
		}else{
			if($sum >= 5){
				
				return 8;
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}
function generate_pos_7($usr_id)//ข้าราชการระดับเชียญชาญ
{
	// $usr_id = 34;

	// $currentdate = 2561;
	// $sum = $currentdate-$usr_dateforwork;
	// $sign_date = 2550;
	// $positiondate = $currentdate-$sign_date;
	

	$port_user = $this->get_user_by_id($usr_id)[0]; //เรียกไอดี user
	$port_user['pos_id'] = (int) $port_user['pos_id'];
	

	$salary = $port_user['usr_salary']; //เรียกเงินเดือน
	$usr_dateforwork = $port_user['usr_dateforwork']; // ปีที่เข้าทำงาน
	$sum = ( date('Y')+543 ) - $usr_dateforwork;//ปีล่าสุด - ปีที่ทำงาน
	
	
	
	$DEC_ID = (int) @$this->get_dec_by_id($usr_id)[0]['dec_id'];
	
	if($port_user['pos_id'] == 8){//เช็คตำแหน่ง
		if($DEC_ID >= 8){//เช็คเครื่องอะไรแล้ว
		
				if($DEC_ID >= 9){
					
						if($DEC_ID >= 10){
							if($DEC_ID >= 11){
									
									return 11;
							}else{ 
								if($sum >= 16){
								
									return 11;
								} 
							}
						}else {
							if($salary >= 11){
							
								return 10;
							}
						}
				}else {

					if($sum >= 8){
						
						return 9;
					} 
				}
		}else{
			if($sum >= 5){
				
				return 8;
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}
function generate_pos_8($usr_id)//ข้าราชการเปลี่ยนสถานะระดับ 1
{
	// $usr_id = 34;

	// $currentdate = 2561;
	// $sum = $currentdate-$usr_dateforwork;
	// $sign_date = 2550;
	// $positiondate = $currentdate-$sign_date;
	

	$port_user = $this->get_user_by_id($usr_id)[0]; //เรียกไอดี user
	$port_user['pos_id'] = (int) $port_user['pos_id'];
	

	$salary = $port_user['usr_salary']; //เรียกเงินเดือน
	$usr_dateforwork = $port_user['usr_dateforwork']; // ปีที่เข้าทำงาน
	$sum = ( date('Y')+543 ) - $usr_dateforwork;//ปีล่าสุด - ปีที่ทำงาน
	
	
	
	$DEC_ID = (int) @$this->get_dec_by_id($usr_id)[0]['dec_id'];
	
	if($port_user['pos_id'] == 9){//เช็คตำแหน่ง
		if($DEC_ID >= 13){//เช็คเครื่องอะไรแล้ว
		
				if($DEC_ID >= 14){
					
						return 14;
							
				}else {
					if($sum >= 10){
						
						return 14;
					} 
				}
		}else{
			if($sum >= 5){
				
				return 13;
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}
function generate_pos_9($usr_id)//ข้าราชการเปลี่ยนสถานะระดับ 2
{

	

	$port_user = $this->get_user_by_id($usr_id)[0]; //เรียกไอดี user
	$port_user['pos_id'] = (int) $port_user['pos_id'];
	

	$salary = $port_user['usr_salary']; //เรียกเงินเดือน
	$usr_dateforwork = $port_user['usr_dateforwork']; // ปีที่เข้าทำงาน
	$sum = ( date('Y')+543 ) - $usr_dateforwork;//ปีล่าสุด - ปีที่ทำงาน
	
	
	
	$DEC_ID = (int) @$this->get_dec_by_id($usr_id)[0]['dec_id'];
	
	if($port_user['pos_id'] == 2){//เช็คตำแหน่ง
		if($DEC_ID >= 1){//เช็คเครื่องอะไรแล้ว
		
				if($DEC_ID >= 2){
					
						return 2;
							
				}else {
					if($sum >= 10){
						
						return 2;
					} 
				}
		}else{
			if($sum >= 5){
				
				return 1;
			}
		}
	}
	
	return 'เงื่อนไขไม่ตรง';
}
function generate_pos_10($usr_id)//ข้าราชการเปลี่ยนสถานะระดับ 3 และ 4
{

	

	$port_user = $this->get_user_by_id($usr_id)[0]; //เรียกไอดี user
	$port_user['pos_id'] = (int) $port_user['pos_id'];
	

	$salary = $port_user['usr_salary']; //เรียกเงินเดือน
	$usr_dateforwork = $port_user['usr_dateforwork']; // ปีที่เข้าทำงาน
	$sum = ( date('Y')+543 ) - $usr_dateforwork;//ปีล่าสุด - ปีที่ทำงาน
	
	
	
	$DEC_ID = (int) @$this->get_dec_by_id($usr_id)[0]['dec_id'];
	
	if($port_user['pos_id'] == 10){//เช็คตำแหน่ง
		if($DEC_ID >= 3){//เช็คเครื่องอะไรแล้ว
		
				if($DEC_ID >= 4){
					
						return 4;
							
				}else {
					if($sum >= 10){
						
						return 4;
					} 
				}
		}else{
			if($sum >= 5){
				
				return 3;
			}
		}
	}


	return 'เงื่อนไขไม่ตรง';
}
function generate_pos_11($usr_id)//ข้าราชการเปลี่ยนสถานะระดับ 5 และ 6
{

	

	$port_user = $this->get_user_by_id($usr_id)[0]; //เรียกไอดี user
	$port_user['pos_id'] = (int) $port_user['pos_id'];
	

	$salary = $port_user['usr_salary']; //เรียกเงินเดือน
	$usr_dateforwork = $port_user['usr_dateforwork']; // ปีที่เข้าทำงาน
	$sum = ( date('Y')+543 ) - $usr_dateforwork;//ปีล่าสุด - ปีที่ทำงาน
	
	
	
	$DEC_ID = (int) @$this->get_dec_by_id($usr_id)[0]['dec_id'];
	
	if($port_user['pos_id'] == 11){//เช็คตำแหน่ง
		if($DEC_ID >= 5){//เช็คเครื่องอะไรแล้ว
		
				if($DEC_ID >= 6){
					
						return 6;
							
				}else {
					if($sum >= 10){
						
						return 6;
					} 
				}
		}else{
			if($sum >= 5){
				
				return 5;
			}
		}
	}


	return 'เงื่อนไขไม่ตรง';
}
function generate_pos_12($usr_id)//ข้าราชการเปลี่ยนสถานะระดับ 7 และ 8
{

	

	$port_user = $this->get_user_by_id($usr_id)[0]; //เรียกไอดี user
	$port_user['pos_id'] = (int) $port_user['pos_id'];
	

	$salary = $port_user['usr_salary']; //เรียกเงินเดือน
	$usr_dateforwork = $port_user['usr_dateforwork']; // ปีที่เข้าทำงาน
	$sum = ( date('Y')+543 ) - $usr_dateforwork;//ปีล่าสุด - ปีที่ทำงาน
	
	
	
	$DEC_ID = (int) @$this->get_dec_by_id($usr_id)[0]['dec_id'];
	
	if($port_user['pos_id'] == 12){//เช็คตำแหน่ง
		if($DEC_ID >= 7){//เช็คเครื่องอะไรแล้ว
		
				if($DEC_ID >= 8){
					
						return 8;
							
				}else {
					if($sum >= 10){
						
						return 8;
					} 
				}
		}else{
			if($sum >= 5){
				
				return 7;
			}
		}
	}


	return 'เงื่อนไขไม่ตรง';
}
function generate_pos_13($usr_id)//ข้าราชการเปลี่ยนสถานะระดับ  8 ผู้บังคับบัญชา
{

	

	$port_user = $this->get_user_by_id($usr_id)[0]; //เรียกไอดี user
	$port_user['pos_id'] = (int) $port_user['pos_id'];
	

	$salary = $port_user['usr_salary']; //เรียกเงินเดือน
	$usr_dateforwork = $port_user['usr_dateforwork']; // ปีที่เข้าทำงาน
	$sum = ( date('Y')+543 ) - $usr_dateforwork;//ปีล่าสุด - ปีที่ทำงาน
	
	
	
	$DEC_ID = (int) @$this->get_dec_by_id($usr_id)[0]['dec_id'];
	
	if($port_user['pos_id'] == 13){//เช็คตำแหน่ง
		if($DEC_ID >= 8){//เช็คเครื่องอะไรแล้ว
		
				if($DEC_ID >= 9){
					
						return 9;
							
				}else {
					if($salary >= 42170 && $sum >= 10){
						
						return 9;
					} 
				}
		}else{
			if($sum >= 5){
				
				return 8;
			}
		}
	}


	return 'เงื่อนไขไม่ตรง';
}
function generate_pos_14($usr_id)//ข้าราชการระดับ 9
{
	
	

	$port_user = $this->get_user_by_id($usr_id)[0]; //เรียกไอดี user
	$port_user['pos_id'] = (int) $port_user['pos_id'];
	

	$salary = $port_user['usr_salary']; //เรียกเงินเดือน
	$usr_dateforwork = $port_user['usr_dateforwork']; // ปีที่เข้าทำงาน
	$sum = ( date('Y')+543 ) - $usr_dateforwork;//ปีล่าสุด - ปีที่ทำงาน
	
	
	
	$DEC_ID = (int) @$this->get_dec_by_id($usr_id)[0]['dec_id'];
	
	if($port_user['pos_id'] == 14){//เช็คตำแหน่ง
		if($DEC_ID >= 8){//เช็คเครื่องอะไรแล้ว
		
				if($DEC_ID >= 9){
					
						if($DEC_ID >= 10){
							if($DEC_ID >= 11){
									
									return 11;
							}else{ 
								if($sum >= 16){
								
									return 11;
								} 
							}
						}else {
							if($sum >= 11){
							
								return 10;
							}
						}
				}else {

					if($sum >= 8){
						
						return 9;
					} 
				}
		}else{
			if($sum >= 5){
				
				return 8;
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}
function generate_pos_15($usr_id)//ข้าราชการระดับ 10
{
	
	

	$port_user = $this->get_user_by_id($usr_id)[0]; //เรียกไอดี user
	$port_user['pos_id'] = (int) $port_user['pos_id'];
	

	$salary = $port_user['usr_salary']; //เรียกเงินเดือน
	$usr_dateforwork = $port_user['usr_dateforwork']; // ปีที่เข้าทำงาน
	$sum = ( date('Y')+543 ) - $usr_dateforwork;//ปีล่าสุด - ปีที่ทำงาน
	
	
	
	$DEC_ID = (int) @$this->get_dec_by_id($usr_id)[0]['dec_id'];
	
	if($port_user['pos_id'] == 15){//เช็คตำแหน่ง
		if($DEC_ID >= 1){//เช็คเครื่องอะไรแล้ว
		
				if($DEC_ID >= 2){
					
						if($DEC_ID >= 3){
							if($DEC_ID >= 4){
									
									if($DEC_ID >= 5){
									
											if($DEC_ID >= 6){
									
												if($DEC_ID >= 7){
									
													if($DEC_ID >= 8){
									
														if($DEC_ID >= 9){
									
															if($DEC_ID >= 10){
									
																if($DEC_ID >= 11){
									
																	if($DEC_ID >= 12){
									
																			return 12;
																	}else{ 
																		if($sum >= 56){
								
																			return 12;
																		} 
																	}
																}else{ 
																	if($sum >= 51){
								
																		return 11;
																	} 
																}
														}else{ 
															if($sum >= 48){
								
																return 10;
															} 
														}
														}else{ 
															if($sum >= 45){
								
																return 9;
															} 
														}
													}else{ 
														if($sum >= 40){
								
														return 8;
														} 
													}
												}else{ 
													if($sum >= 35){
								
														return 7;
													} 
												}
											}else{ 
												if($sum >= 30){
								
													return 6;
												} 
											}
									}else{ 
										if($sum >= 25){
								
											return 5;
										} 
									}
							}else{ 
								if($sum >= 20){
								
									return 4;
								} 
							}
						}else {
							if($sum >= 15){
							
								return 3;
							}
						}
				}else {

					if($sum >= 10){
						
						return 2;
					} 
				}
		}else{
			if($sum >= 5){
				
				return 1;
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}
function generate_pos_16($usr_id)//ข้าราชการระดับ 11
{
	
	

	$port_user = $this->get_user_by_id($usr_id)[0]; //เรียกไอดี user
	$port_user['pos_id'] = (int) $port_user['pos_id'];
	

	$salary = $port_user['usr_salary']; //เรียกเงินเดือน
	$usr_dateforwork = $port_user['usr_dateforwork']; // ปีที่เข้าทำงาน
	$sum = ( date('Y')+543 ) - $usr_dateforwork;//ปีล่าสุด - ปีที่ทำงาน
	
	
	
	$DEC_ID = (int) @$this->get_dec_by_id($usr_id)[0]['dec_id'];
	
	if($port_user['pos_id'] == 16){//เช็คตำแหน่ง
		if($DEC_ID >= 9){//เช็คเครื่องอะไรแล้ว
		
				if($DEC_ID >= 10){
					
						if($DEC_ID >= 11){
							if($DEC_ID >= 12){
									
									return 12;
							}else{ 
								if($sum >= 14){
								
									return 12;
								} 
							}
						}else {
							if($sum >= 11){
							
								return 11;
							}
						}
				}else {

					if($sum >= 8){
						
						return 10;
					} 
				}
		}else{
			if($sum >= 5){
				
				return 9;
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}
function generate_pos_17($usr_id)//พนักงานประจำตำแหน่งหรือเทียบเท่า
{
	
	

	$port_user = $this->get_user_by_id($usr_id)[0]; //เรียกไอดี user
	$port_user['pos_id'] = (int) $port_user['pos_id'];
	

	$salary = $port_user['usr_salary']; //เรียกเงินเดือน
	$usr_dateforwork = $port_user['usr_dateforwork']; // ปีที่เข้าทำงาน
	$sum = ( date('Y')+543 ) - $usr_dateforwork;//ปีล่าสุด - ปีที่ทำงาน
	
	
	
	$DEC_ID = (int) @$this->get_dec_by_id($usr_id)[0]['dec_id'];
	
	if($port_user['pos_id'] == 17){//เช็คตำแหน่ง
		if($DEC_ID >= 1){//เช็คเครื่องอะไรแล้ว
		
				if($DEC_ID >= 2){
					
						if($DEC_ID >= 3){
							if($DEC_ID >= 4){
									
									return 4;
							}else{ 
								if($sum >= 20){
								
									return 4;
								} 
							}
						}else {
							if($sum >= 15){
							
								return 3;
							}
						}
				}else {

					if($sum >= 10){
						
						return 2;
					} 
				}
		}else{
			if($sum >= 5){
				
				return 1;
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}
function generate_pos_18($usr_id)//หัวหน้าแผนกหรือเทียบเท่า
{
	
	

	$port_user = $this->get_user_by_id($usr_id)[0]; //เรียกไอดี user
	$port_user['pos_id'] = (int) $port_user['pos_id'];
	

	$salary = $port_user['usr_salary']; //เรียกเงินเดือน
	$usr_dateforwork = $port_user['usr_dateforwork']; // ปีที่เข้าทำงาน
	$sum = ( date('Y')+543 ) - $usr_dateforwork;//ปีล่าสุด - ปีที่ทำงาน
	
	
	
	$DEC_ID = (int) @$this->get_dec_by_id($usr_id)[0]['dec_id'];
	
	if($port_user['pos_id'] == 18){//เช็คตำแหน่ง
		if($DEC_ID >= 3){//เช็คเครื่องอะไรแล้ว
		
				if($DEC_ID >= 4){
					
						if($DEC_ID >= 5){
								return 5;
						}else {
							if($sum >= 15){
							
								return 5;
							}
						}
				}else {

					if($sum >= 10){
						
						return 4;
					} 
				}
		}else{
			if($sum >= 5){
				
				return 3;
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

function generate_pos_19($usr_id)//ผู้ช่วยศาสตราจารย์หรืออาจารย์
{
	
	

	$port_user = $this->get_user_by_id($usr_id)[0]; //เรียกไอดี user
	$port_user['pos_id'] = (int) $port_user['pos_id'];
	

	$salary = $port_user['usr_salary']; //เรียกเงินเดือน
	$usr_dateforwork = $port_user['usr_dateforwork']; // ปีที่เข้าทำงาน
	$sum = ( date('Y')+543 ) - $usr_dateforwork;//ปีล่าสุด - ปีที่ทำงาน
	
	
	
	$DEC_ID = (int) @$this->get_dec_by_id($usr_id)[0]['dec_id'];
	
	if($port_user['pos_id'] == 19){//เช็คตำแหน่ง
		if($DEC_ID >= 4){//เช็คเครื่องอะไรแล้ว
		
				if($DEC_ID >= 5){
					
						if($DEC_ID >= 6){
								if($DEC_ID >= 7){
									return 7;
								}else {
									if($sum >= 20){
							
									return 7;
									}
								}
						}else {
							if($sum >= 15){
							
								return 6;
							}
						}
				}else {

					if($sum >= 10){
						
						return 5;
					} 
				}
		}else{
			if($sum >= 5){
				
				return 4;
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

function generate_pos_20($usr_id)//ผู้ช่วยอธิการบดี รองคณบดี หรือตำแหน่งเทียบเท่า
{
	
	

	$port_user = $this->get_user_by_id($usr_id)[0]; //เรียกไอดี user
	$port_user['pos_id'] = (int) $port_user['pos_id'];
	

	$salary = $port_user['usr_salary']; //เรียกเงินเดือน
	$usr_dateforwork = $port_user['usr_dateforwork']; // ปีที่เข้าทำงาน
	$sum = ( date('Y')+543 ) - $usr_dateforwork;//ปีล่าสุด - ปีที่ทำงาน
	
	
	
	$DEC_ID = (int) @$this->get_dec_by_id($usr_id)[0]['dec_id'];
	
	if($port_user['pos_id'] == 20){//เช็คตำแหน่ง
		if($DEC_ID >= 5){//เช็คเครื่องอะไรแล้ว
		
				if($DEC_ID >= 6){
					
						if($DEC_ID >= 7){
								return 7;
						}else {
							if($sum >= 15){
							
								return 7;
							}
						}
				}else {

					if($sum >= 10){
						
						return 6;
					} 
				}
		}else{
			if($sum >= 5){
				
				return 5;
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

function generate_pos_21($usr_id)//รองศาสตราจารย์
{
	
	

	$port_user = $this->get_user_by_id($usr_id)[0]; //เรียกไอดี user
	$port_user['pos_id'] = (int) $port_user['pos_id'];
	

	$salary = $port_user['usr_salary']; //เรียกเงินเดือน
	$usr_dateforwork = $port_user['usr_dateforwork']; // ปีที่เข้าทำงาน
	$sum = ( date('Y')+543 ) - $usr_dateforwork;//ปีล่าสุด - ปีที่ทำงาน
	
	
	
	$DEC_ID = (int) @$this->get_dec_by_id($usr_id)[0]['dec_id'];
	
	if($port_user['pos_id'] == 21){//เช็คตำแหน่ง
		if($DEC_ID >= 5){//เช็คเครื่องอะไรแล้ว
		
				if($DEC_ID >= 6){
					
						if($DEC_ID >= 7){
								if($DEC_ID >= 8){
									return 8;
								}else {
									if($sum >= 20){
							
									return 8;
									}
								}
						}else {
							if($sum >= 15){
							
								return 7;
							}
						}
				}else {

					if($sum >= 10){
						
						return 6;
					} 
				}
		}else{
			if($sum >= 5){
				
				return 5;
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

function generate_pos_22($usr_id)//รองอธิการบดี คณบดี หรือ ตำแหน่งเทียบเท่า
{
	
	

	$port_user = $this->get_user_by_id($usr_id)[0]; //เรียกไอดี user
	$port_user['pos_id'] = (int) $port_user['pos_id'];
	

	$salary = $port_user['usr_salary']; //เรียกเงินเดือน
	$usr_dateforwork = $port_user['usr_dateforwork']; // ปีที่เข้าทำงาน
	$sum = ( date('Y')+543 ) - $usr_dateforwork;//ปีล่าสุด - ปีที่ทำงาน
	
	
	
	$DEC_ID = (int) @$this->get_dec_by_id($usr_id)[0]['dec_id'];
	
	if($port_user['pos_id'] == 22){//เช็คตำแหน่ง
		if($DEC_ID >= 7){//เช็คเครื่องอะไรแล้ว
		
				if($DEC_ID >= 8){
					
						return 8;
				}else {

					if($sum >= 10){
						
						return 8;
					} 
				}
		}else{
			if($sum >= 5){
				
				return 7;
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

function generate_pos_23($usr_id)//ศาสตราจารย์
{
	
	

	$port_user = $this->get_user_by_id($usr_id)[0]; //เรียกไอดี user
	$port_user['pos_id'] = (int) $port_user['pos_id'];
	

	$salary = $port_user['usr_salary']; //เรียกเงินเดือน
	$usr_dateforwork = $port_user['usr_dateforwork']; // ปีที่เข้าทำงาน
	$sum = ( date('Y')+543 ) - $usr_dateforwork;//ปีล่าสุด - ปีที่ทำงาน
	
	
	
	$DEC_ID = (int) @$this->get_dec_by_id($usr_id)[0]['dec_id'];
	
	if($port_user['pos_id'] == 23){//เช็คตำแหน่ง
		if($DEC_ID >= 7){//เช็คเครื่องอะไรแล้ว
		
				if($DEC_ID >= 8){
					
						if($DEC_ID >= 9){
								if($DEC_ID >= 10){
									return 10;
								}else {
									if($sum >= 21){
							
									return 10;
									}
								}
						}else {
							if($sum >= 18){
							
								return 9;
							}
						}
				}else {

					if($sum >= 10){
						
						return 8;
					} 
				}
		}else{
			if($sum >= 5){
				
				return 7;
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

function generate_pos_24($usr_id)//อธิการบดี หรือ ตำแหน่งเทียบเท่า
{
	
	

	$port_user = $this->get_user_by_id($usr_id)[0]; //เรียกไอดี user
	$port_user['pos_id'] = (int) $port_user['pos_id'];
	

	$salary = $port_user['usr_salary']; //เรียกเงินเดือน
	$usr_dateforwork = $port_user['usr_dateforwork']; // ปีที่เข้าทำงาน
	$sum = ( date('Y')+543 ) - $usr_dateforwork;//ปีล่าสุด - ปีที่ทำงาน
	
	
	
	$DEC_ID = (int) @$this->get_dec_by_id($usr_id)[0]['dec_id'];
	
	if($port_user['pos_id'] == 24){//เช็คตำแหน่ง
		if($DEC_ID >= 7){//เช็คเครื่องอะไรแล้ว
		
				if($DEC_ID >= 8){
					
						if($DEC_ID >= 9){
								return 9;
						}else {
							if($sum >= 13){
							
								return 9;
							}
						}
				}else {

					if($sum >= 10){
						
						return 8;
					} 
				}
		}else{
			if($sum >= 5){
				
				return 7;
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

function generate_pos_25($usr_id)//ลุกจ้างประจำระดับ 1
{
	
	

	$port_user = $this->get_user_by_id($usr_id)[0]; //เรียกไอดี user
	$port_user['pos_id'] = (int) $port_user['pos_id'];
	

	$salary = $port_user['usr_salary']; //เรียกเงินเดือน
	$usr_dateforwork = $port_user['usr_dateforwork']; // ปีที่เข้าทำงาน
	$sum = ( date('Y')+543 ) - $usr_dateforwork;//ปีล่าสุด - ปีที่ทำงาน
	
	
	
	$DEC_ID = (int) @$this->get_dec_by_id($usr_id)[0]['dec_id'];
	
	if($port_user['pos_id'] == 25){//เช็คตำแหน่ง
		if($DEC_ID >= 1){//เช็คเครื่องอะไรแล้ว
		
				if($DEC_ID >= 2){
					
						if($DEC_ID >= 3){
								return 3;
						}else {
							if($sum >= 18){
							
								return 3;
							}
						}
				}else {

					if($sum >= 13){
						
						return 2;
					} 
				}
		}else{
			if($sum >= 8){
				
				return 1;
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}

function generate_pos_26($usr_id)//ลูกจ้างประจำระดับ 2
{
	
	

	$port_user = $this->get_user_by_id($usr_id)[0]; //เรียกไอดี user
	$port_user['pos_id'] = (int) $port_user['pos_id'];
	

	$salary = $port_user['usr_salary']; //เรียกเงินเดือน
	$usr_dateforwork = $port_user['usr_dateforwork']; // ปีที่เข้าทำงาน
	$sum = ( date('Y')+543 ) - $usr_dateforwork;//ปีล่าสุด - ปีที่ทำงาน
	
	
	
	$DEC_ID = (int) @$this->get_dec_by_id($usr_id)[0]['dec_id'];
	
	if($port_user['pos_id'] == 26){//เช็คตำแหน่ง
		if($DEC_ID >= 2){//เช็คเครื่องอะไรแล้ว
		
				if($DEC_ID >= 3){
					
						if($DEC_ID >= 4){
								return 4;
						}else {
							if($sum >= 18){
							
								return 4;
							}
						}
				}else {

					if($sum >= 13){
						
						return 3;
					} 
				}
		}else{
			if($sum >= 8){
				
				return 2;
			}
		}
	}



	return 'เงื่อนไขไม่ตรง';
}
	public function get_user_by_id($usr_id){
		$this->port->where('usr_id', $usr_id);
		$this->port->from('port_user');
		$port_user = $this->port->get();
		return $port_user->result_array();
	}
	public function get_dec_by_id($usr_id){
		$this->db->where('usr_id', $usr_id);
		$this->db->from('port_insignia');
		$this->db->order_by('sign_id', "DESC");
		
		$port_insignia = $this->db->get();
		return $port_insignia->result_array();
	}

}


