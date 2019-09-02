<!DOCTYPE html>

<html lang="ja">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>お知らせ一覧</title>
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
	#main-contents {
		padding: 10px;
	}
	#main-wrapper {
		margin: 10px auto;
	}
	#description {
		display: inline-block;
	}
	#description p {
		font-size: 20px;
		font-weight: bold;
	}
	#list-area {
		width: auto;
		position: relative;
		margin: 10px auto;
	}
	#notice-table {
		width: 1000px;
	}
	.list-table {
		width: 100%;
	}
	.list-table thead {
		background: #ccc;
	}
	.list-table thead td {
		border: 1px solid #B8B8B8;
		text-align: center;
		vertical-align: middle;
	}
	.list-table tbody {
		background: #fff;
	}
	.list-table tbody td {
		border: 1px solid #B8B8B8;
		text-align: center;
		vertical-align: middle;
		height: 30px;
	}
	.list-table tbody td a{
		color: #5D5B5B;
	}
	#regist {
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
		text-decoration: none;
	}
	
</style>

<script type="text/javascript">
	$(function() {
		$('#notice-table').responsiveTable();
	});

	$.fn.responsiveTable = (function() {
		var $window = $(window);
		return function() {
			var $el = this;
			var $table = this.find('>table');
			var onResize = function() {
				var width = $table.outerWidth();
				var height = $table.outerHeight();
				var $parent = $el.parent();
				var containerWidth = $parent.width();
				var ratio = containerWidth / width;
				if (ratio < 1) {
					$el.height(height * ratio);
					$table.css('transform', 'scale(' + ratio + ')');
				} else {
					$el.height('');
					$table.css('transform', '');
				}
			};
			$table.css('transformOrigin', '0 0');
			$window.on('resize', onResize);
			onResize();
		};
	}());
</script>

	<div id="main-contents">
		<div id="main-wrapper">
			<div id="notice-area">
				<div id="description"><p>お知らせ一覧</p></div>
				<div id="list-area">
					<div id="notice-table">
						<a href="input.php?id=0" id="regist">登録</a>
						<table class="list-table tablesorter">
							<thead>
								<tr class="list-head">
									<td class="width-100">編集</td>
									<td class="width-300">タイトル</td>
									<td class="width-100">掲載日</td>
									<td class="width-120">掲載期日</td>
								</tr>
							</thead>
							<?php 
								//お知らせ取得
								try {
									//TODO: 環境に合わせて適宜変更する
									$db = new PDO("mysql:host=localhost;dbname=hananoi", "root", "daw2ghuc");
									$db->query("SET NAMES UTF8");
									
									$sql = "SELECT id, notice_name, regist_date, published_date from notice";
									$sql .= " WHERE published_date >= '". date('Y-m-d'). "'";
									$sql .= " ORDER BY regist_date DESC";
									
									$result = $db->query($sql);
									
									$db = null;
									
								} catch (Exception $e) {
									echo "接続失敗: " . $e->getMessage() . "\n";
									exit();
								}
							?>
							<tbody id="container">
								<?php 
								foreach ($result as $row) { ?>
									<tr>
										<td><a href="input.php?id=<?php echo $row['id']?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
										<td><?php echo $row['notice_name']?></td>
										<td><?php echo date('Y年n月j日', strtotime($row['regist_date']))?></td>
										<td><?php echo date('Y年n月j日', strtotime($row['published_date']))?></td>
									</tr>
								<?php }?>
							</tbody>
						</table>
					</div>
					<div class="holder" id="pager"></div>
					</div>
			</div>
		</div>
	</div>
	</body>
</html>