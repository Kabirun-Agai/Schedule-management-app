<?php

//曜日取得関数 引数は int 曜日の数字
function week_cquisition_int($week){
	if($week=="0"){
		$week_string = "(日)";
	}else if($week=="1"){
		$week_string = "(月)";
	}else if($week=="2"){
		$week_string = "(火)";
	}else if($week=="3"){
		$week_string = "(水)";
	}else if($week=="4"){
		$week_string = "(木)";
	}else if($week=="5"){
		$week_string = "(金)";
	}else if($week=="6"){
		$week_string = "(土)";
	}
	return $week_string;
}
//ページ読込前の設定部分

///////////////////////////////////
//$display_date の日付を変えるとその日のページに変わる & 変数初期化・設定
//////////////////////////////////
$get_display_date = $_GET['first_day_of_month'];
if($get_display_date == null){
 //$_GET['first_day_of_month'];がnullだった場合は本日の日付
 $display_date = date("Y-m-1");//表示日時　ページを開いた時に表示される月の最初の日付 例：2017-05-01 必ずその月の1日が指定される。このページは月で管理していているので、ページを開いた当日の日付ではなく、当日の月の1日を入れる。じゃないと3月31から1ヶ月引くと3月2日になるバグが発生するから
}else{
 //$_GET['first_day_of_month']入ってた場合はその日付
 $display_date = $get_display_date;
}
//表示されている日から一週間の曜日を、数値で配列化 表示されてる日が、$week_int_array[0] 次の日が $week_int_array[1]
//文字、例:日 月 火 水 木 金 土 というように配列化 $week_strings_array[] //カレンダーに曜日を表示するときに使う
//表示されている日から一週間を、Ymd例（20170508）こういった型で出力する $week_display_date_Ymd_array 　htmeタグのid属性やname属性で使う
$week_d = $display_date;
$week_int_array = array();
$week_strings_array = array();
$week_display_date_Ymd_array = array();
for($i = 0; $i < 7; $i++){
	array_push($week_int_array, date("w",strtotime($week_d))); //配列に追加
	array_push($week_strings_array, mb_substr(week_cquisition_int($i),1,1)); //配列に追加　mb_substr()メソッドは文字を置き換えたり抜出するPHPの関数 参考サイト：http://cms.helog.jp/php/substr-multi-byte/
	array_push($week_display_date_Ymd_array,date("Ymd",strtotime($week_d)));//配列に追加
	
	$week_d = date("Y-m-d", strtotime($week_d.' +1 day'));//while文で回す為に$week_d変数を、１日インクリメントする
}
	

?>

<html>
<head>
</head>
<body>

<h2>月間スケジュール</h2>
<!-- 何月を表示 -->
<div>
<!-- 一ヶ月前のページへのリンク -->
<a href="index.php?first_day_of_month=<?php echo date('Y-m-1',strtotime("-1 month",strtotime($display_date))); ?>"><<</a>
<!-- /一ヶ月前のページへのリンク -->
<?php echo date('Y-n',strtotime($display_date)); ?>
<!-- 一ヶ月後のページへのリンク -->
<a href="index.php?first_day_of_month=<?php echo date('Y-m-1',strtotime("+1 month",strtotime($display_date))); ?>">>></a>
<!-- /一ヶ月後のページへのリンク -->
</div>
<!-- /何月を表示 -->
<br/>
<!-- リストフォームボックス -->
<div>

<table border="1">
  <tr>
    <td>1</td>
    <td>2</td>
  </tr>
</table>


</body>
</html>