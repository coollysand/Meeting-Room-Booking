<?

header('Content-Type: text/html; charset=tis-620');
$id	=	$_GET["id"];
list($year,$month)	=	split("-",$id);

## �Դ function ���ѹ�ش���¢ͧ��͹������ ##
function lastday($m, $y) {
  for ($i=28; $i<=32; $i++) {
    if (checkdate($m, $i, $y) == 0) {
      return $i - 1;
    }
  }
}
## �Դ function ���ѹ�ش���¢ͧ��͹������ ##

## ������͹������
$month_name_th = array("���Ҥ�", "����Ҿѹ��", "�չҤ�", "����¹", "����Ҥ�", "�Զع�¹", "�á�Ҥ�", "�ԧ�Ҥ�", "�ѹ��¹", "���Ҥ�", "��Ȩԡ�¹", "�ѹ�Ҥ�");


## �� Link ��͹ ##

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

## �� Link ��͹ ##


## ������������ Calendar ���� ##
$calendar_return =<<<NINEAUM
	<div id="c_head">
		<div id="c_back"><a href="javascript:getcalendar('$backyear-$backmonth');" class="clink">&lt;&lt;</a></div>
		<div id="c_month">$month_name_print $year_print</div>
		<div id="c_next"><a href="javascript:getcalendar('$nextyear-$nextmonth');" class="clink">&gt;&gt;</a></div>
	</div>
NINEAUM;
## ������������ Calendar ���� ##

## �Ҩӹǹ�ѹ���͹��� ###
$lastday	=	lastday($month,$year);
## �Ҩӹǹ�ѹ���͹��� ###

## ���ѹ�á�ͧ�ѻ���� ##
$FTime	= getdate(date(mktime(0, 0, 0, $month, 1, $year)));
$wday	= $FTime["wday"];
## ���ѹ�á�ͧ�ѻ���� ##

## ��� �ѹ ##
$calendar_return .=<<<NINEAUM

<ul>
	<li><span class="c_h_day">�.</span></li>
	<li><span class="c_h_day">�.</span></li>
	<li><span class="c_h_day">�.</span></li>
	<li><span class="c_h_day">��.</span></li>
	<li><span class="c_h_day">�.</span></li>
	<li><span class="c_h_day">�.</span></li>
	<li><span class="c_h_day">��.</span></li>

NINEAUM;
## ��� �ѹ ##

### ǹ 42 �ͺ���ҧ li ##
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
### ǹ 42 �ͺ���ҧ li ##
$calendar_return .="</ul>\n";













echo "$calendar_return\n";







?>