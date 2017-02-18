<?

header('Content-Type: text/html; charset=tis-620');
$id	=	$_GET["id"];
list($year,$month)	=	split("-",$id);

## เปิด function หาวันสุดท้ายของเดือนเอาไว้ ##
function lastday($m, $y) {
  for ($i=28; $i<=32; $i++) {
    if (checkdate($m, $i, $y) == 0) {
      return $i - 1;
    }
  }
}
## เปิด function หาวันสุดท้ายของเดือนเอาไว้ ##

## ชื่อเดือนภาษาไทย
$month_name_th = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");


## หา Link เดือน ##

$month_name_print	=	$month_name_th[$month-1];
$year_print			=	$year+543;

  if ($month == 1) {
    $backmonth = 12;
	$backyear  = $year-1;
    $nextmonth = $month+1;
	$nextyear  = $year;
  }
  elseif ($month == 12) {
    $backmonth = $month-1;
	$backyear  = $year;
	$nextmonth = 1;
	$nextyear  = $year+1;
  }else{
    $backmonth = $month-1;
	$backyear  = $year;
    $nextmonth = $month+1;
	$nextyear  = $year;  
  }

## หา Link เดือน ##


## ได้ขอ้มูลแปะหัว Calendar แล้ว ##
$calendar_return =<<<NINEAUM
	<div id="c_head">
		<div id="c_back"><a href="javascript:getcalendar('$backyear-$backmonth');" class="clink">&lt;&lt;</a></div>
		<div id="c_month">$month_name_print $year_print</div>
		<div id="c_next"><a href="javascript:getcalendar('$nextyear-$nextmonth');" class="clink">&gt;&gt;</a></div>
	</div>
NINEAUM;
## ได้ขอ้มูลแปะหัว Calendar แล้ว ##

## หาจำนวนวันในเดือนนี้ ###
$lastday	=	lastday($month,$year);
## หาจำนวนวันในเดือนนี้ ###

## หาวันแรกของสัปดาห์ ##
$FTime	= getdate(date(mktime(0, 0, 0, $month, 1, $year)));
$wday	= $FTime["wday"];
## หาวันแรกของสัปดาห์ ##

## หัว วัน ##
$calendar_return .=<<<NINEAUM

<ul>
	<li><span class="c_h_day">จ.</span></li>
	<li><span class="c_h_day">อ.</span></li>
	<li><span class="c_h_day">พ.</span></li>
	<li><span class="c_h_day">พฤ.</span></li>
	<li><span class="c_h_day">ศ.</span></li>
	<li><span class="c_h_day">ส.</span></li>
	<li><span class="c_h_day">อา.</span></li>

NINEAUM;
## หัว วัน ##

### วน 42 รอบสร้าง li ##
$runday =1;
for ($i=1;$i<=42;$i++) {
	if ($i<$wday) {
		$calendar_return .="<li><span class=\"c_day\">&nbsp;</span></li>\n";
	}elseif($runday <= $lastday){
		$calendar_return .="<li><span class=\"c_day\">$runday</span></li>\n";
		$runday++;
	}else{
		$calendar_return .="<li><span class=\"c_day\">&nbsp;</span></li>\n";	
	}

}
### วน 42 รอบสร้าง li ##
$calendar_return .="</ul>\n";













echo "$calendar_return\n";







?>