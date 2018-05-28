<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('port'))
{
    function pre_var_dump($var = '')
    {
    	echo '<pre>';
    	var_dump($var);
    	echo '</pre>';
        return;
    }   

    function pre_print_r($var = '')
    {
    	echo '<pre>';
    	print_r($var);
    	echo '</pre>';
        return;
    } 

    function pre_var_export($var = '')
    {
    	echo '<pre>';
    	var_export($var);
    	echo '</pre>';
        return;
    } 

    //function for chang Mysal date format to thai format Ex.27/5/2557
    function mysql_date_to_thai1($originalDate= '')
    {
		$newDate = date("d/n/", strtotime($originalDate));
		$newYear = date('Y', strtotime($originalDate))+543;
    	return  $newDate.$newYear;
    }

    //function for chang Mysal date format to thai format Ex.27/05/2557
    function mysql_date_to_thai2($originalDate= '')
    {
		$newDate = date("d/m/", strtotime($originalDate));
		$newYear = date('Y', strtotime($originalDate))+543;
    	return  $newDate.$newYear;
    }


    //function for chang Mysal date format to thai format Ex.27 พฤษภาคม 2557
    function mysql_date_to_thai3($originalDate= '')
    {
    	$ThMonth = array ('', 'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฏาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม' );
		$newDay = date('d ', strtotime($originalDate));
		$newYear = date('Y', strtotime($originalDate))+543;
		$newMonth = $ThMonth[date('n', strtotime($originalDate))];
    	return  $newDay.$newMonth.' '.$newYear;
    }

    //function for chang Mysal date format to thai format Ex.27พ.ค.2557
    function mysql_date_to_thai4($originalDate= '')
    {
        date_default_timezone_set('Asia/Jakarta');
    	$ThMonth = array('', 'ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.', 'พ.ย.','ธ.ค.');
		$newDay = date('d', strtotime($originalDate));
		$newYear = date('Y', strtotime($originalDate))+543;
		$newMonth = $ThMonth[date('n', strtotime($originalDate))];
    	return  $newDay.' '.$newMonth.' '.$newYear;
    }

    function mysql_date_to_year($originalDate= '')
    {
        date_default_timezone_set('Asia/Jakarta');
        $newYear = date('Y', strtotime($originalDate));
        return  $newYear;
    }

    //function for chang Mysal date format to thai format Ex.อ27พ.ค.2557
    function mysql_date_to_thai5($originalDate= '')
    {
    	$thaismalldate=array('อา','จ','อ','พ','พฤ','ศ','ส');
    	$ThMonth = array('', 'ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.', 'พ.ย.','ธ.ค.');
		$newDay = $thaismalldate[date('w', strtotime($originalDate))].date('j', strtotime($originalDate));
		$newMonth = $ThMonth[date('n', strtotime($originalDate))];
		$newYear = date('Y', strtotime($originalDate))+543;
    	return  $newDay.$newMonth.$newYear;
    }

    //function for chang Mysal date format to thai format Ex.วันอังคารที่ 27 พฤษภาคม พ.ศ.2557
    function mysql_date_to_thai6($originalDate= '')
    {
    	$thaiDate = array('อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์');
    	$ThMonth = array ('', 'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฏาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม' );
		$newDay = $thaiDate[date('w', strtotime($originalDate))];
		$newMonth = $ThMonth[date('n', strtotime($originalDate))];
		$newYear = date('Y', strtotime($originalDate))+543;
    	return  'วัน'.$newDay.'ที่ '.date ('d').' '.$newMonth.' พ.ศ.'.$newYear;;
    }

    function thaidatepicker_to_mysql_date($date, $sp="-") {
        // Copy Form ppm_splitDateDb4
        list($dd, $mm, $yy) = preg_split("[/|-]", $date);
        $yy -= 543;
        return $yy."$sp".$mm."$sp".$dd;
    }

    function mysql_date_to_thaidatepicker($originalDate= '') {
        $newDate = date("d/m/", strtotime($originalDate));
        $newYear = date('Y', strtotime($originalDate))+543;
        return  $newDate.$newYear;
    }

    function thaidate( $format = '', $timestamp = '', $be = true ) {
        $timestamp=strtotime($timestamp);
        if ( $timestamp == null ) {$timestamp = time();}
        // month values
        $en_month_long = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );
        $en_month_short = array( 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' );
        $th_month_long = array( 'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม' );
        $th_month_short = array( 'ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.' );
        // day values
        $en_day_long = array( 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday' );
        $en_day_short = array( 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat' );
        $th_day_long = array( 'อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์' );
        $th_day_short = array( 'อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.' );
        // convert year to buddha era (rg. 2554, 2555, 2556)?
        if ( $be == true ) {
            if ( mb_strpos( $format, 'o' ) !== false ) {
                $year = ( date( 'o', $timestamp )+543 );
                $format = str_replace( 'o', $year, $format );
            } elseif ( mb_strpos( $format, 'Y' ) !== false ) {
                $year = ( date( 'Y', $timestamp )+543 );
                $format = str_replace( 'Y', $year, $format );
            } elseif ( mb_strpos( $format, 'y' ) !== false) {
                $year = ( date( 'y', $timestamp )+43 );
                $format = str_replace( 'y', $year, $format );
            }
            unset( $year );
        }
        // replace eng to thai from long to short
        $thaidate = date( $format, $timestamp );
        if ( mb_strpos( $format, 'F' ) !== false ) {
            $thaidate = str_replace( $en_month_long, $th_month_long, $thaidate );
        } else {
            $thaidate = str_replace( $en_month_short, $th_month_short, $thaidate );
        }
        $thaidate = str_replace( $en_day_long, $th_day_long, $thaidate );
        $thaidate = str_replace( $en_day_short, $th_day_short, $thaidate );
        unset( $en_month_long, $en_month_short, $th_month_long, $th_month_short, $en_day_long, $en_day_short, $th_day_long, $th_day_short );
        return $thaidate;
    }// thaidate

}
