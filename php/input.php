<?php
$id = $_GET['id'];

$notice_name = "";
$notice_detail = "";
$published_date = "";

if ($id > 0) {
	//お知らせ取得
	try {
		//TODO: 環境に合わせて適宜変更する
		$db = new PDO("mysql:host=localhost;dbname=hananoi", "root", "daw2ghuc");
		$db->query("SET NAMES UTF8");
		
		$sql = "SELECT id, notice_name, notice_detail, published_date from notice";
		$sql .= " WHERE id = '". $id. "'";
		
		$stmt = $db->query($sql);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$notice_name = $result['notice_name'];
		$notice_detail = $result['notice_detail'];
		$published_date = $result['published_date'];
		
		$db = null;
		
	} catch (Exception $e) {
		echo "接続失敗: " . $e->getMessage() . "\n";
		exit();
	}
}
?>

<!DOCTYPE html>

<html lang="ja">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>お知らせ登録</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<link rel="stylesheet" href="../_css/html5reset-1.6.1.css" />
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css" rel="stylesheet" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="//code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
</head>
<body>

<style type="text/css">
	.ui-datepicker-calendar tr td:first-child a {
		background-image: none;
		background: #d21616;
		color: #FFFFFF;
	}
	.ui-datepicker-calendar tr td:last-child a {
		background-image: none;
		background: #0b84d2;
		color: #FFFFFF;
	}
	#main-content {
		padding: 50px 0;
		z-index: 0;
	}
	.event-list {
		width: 95%;
		margin:0 auto;
	}
	.event-list .input{
		max-width: 800px;
	}
	.input input,
	.input textarea{
		width: 100%;
	}
	.event-content{
		background: #fff;
		padding: 1em 1em 2em;
		margin-bottom: 1em;
		border-bottom: dotted 1px #ccc;
	}
	.input dl{
		width: 100%;
		margin: 0 auto;
	}
	
	.input dt{
		margin: 0 auto 1em;
		border-left: solid 10px #444;
		padding-left: .5em;
	}
	
	.input dd{
		margin-bottom: 2em;
	}
	.input dd span{
		display: block;
		margin-top: 10px;
		font-size: 13px;
		color: #aaa;
	}
	.req{
		position: relative;
		top: -1px;
		background: #c62121;
		color: #fff;
		font-size: 11px;
		padding: 2px 4px;
		margin-left: 1em;
		border-radius: 2px;
	}
	.spacer {
		height: 10px;
	}
	.input .btn_regist{
		display: block;
		margin: 0 auto;
		color: #fff;
		padding: 0 4em;
		background: #d21616;
		border: 0;
		border-radius: 5px;
		cursor: pointer;
		height: 44px;
		line-height: 44px;
		width: 150px;
	}
</style>

<script type="text/javascript">
	$(function() {
		$(".datepicker").datepicker({
			dateFormat: "yy-mm-dd"
		});
	});
</script>

<div id="main-content">
	<div class="event-list">
		<form name="inputform" class="input" method="post" action="post.php">
			<input type="hidden" name="id" value="<?php echo $id ?>">
			<dl>
				<dt>タイトル<span class="req">必須</span> ※全角50文字以内</dt>
				<dd><input type="text" name="notice_name" size="50" value="<?php echo $notice_name ?>"></dd>
				<dt>詳細<span class="req">必須</span></dt>
				<dd><textarea name="notice_detail" cols=80 rows=10 /><?php echo $notice_detail ?></textarea></dd>
				<dt>期間<span class="req">必須</span></dt>
				<dd><input class="datepicker" type="text" name="published_date" readonly value="<?php echo $published_date ?>"></dd>
				<dt>認証パスワード<span class="req">必須</span></dt>
				<dd><input type="password" name="password" size="50" value=""></dd>
			</dl>
			<p align="center">
				<input type="submit" class="btn_regist" value="登録">
			</p>
		</form>
	</div>
	<div class="spacer"></div>
</div>
</body>

</html>