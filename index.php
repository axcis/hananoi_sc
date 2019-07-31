<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>花野井サッカークラブ オフィシャルサイト</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<link rel="stylesheet" href="_css/html5reset-1.6.1.css" />
    <link rel="icon" href="_images/icon/favicon.png">
    <link rel="apple-touch-icon" href="_images/icon/apple-touch-icon.png" />
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="_css/style.css" />
	<link rel="stylesheet" href="_css/style-sp.css" media="only screen and (min-width: 0px) and (max-width: 1024px)" />
<!-- 	<link rel="stylesheet" href="_css/style-tb.css" media="only screen and (min-width: 481px) and (max-width: 768px)"/>
<link rel="stylesheet" href="_css/style-ipad.css" media="only screen and (min-width: 769px) and (max-width: 1024px)"/> -->
	<link rel="stylesheet" href="_css/style-pc.css" media="only screen and (min-width: 1025px) "/>
	<link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Shrikhand" rel="stylesheet">
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="_js/functions.js"></script>
	<script type="text/javascript" src="_js/jquery.bxslider.js"></script>
	<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<script>
	$(function(){
		$('.bxslider').bxSlider({
			auto:true,
			mode:'fade',
			speed:1000,
			slideWidth:2000,
			pager: false,
			moveSlides:1,
			slideMargin:0
		});
	});
	</script>
	<script type="text/javascript" src="_js/jquery.matchHeight.js"></script>
	<script>
	$(function(){
		$('#coach-contents dl').matchHeight();
		// 見出しをクリックするとコンテンツを開閉する
		$('.subContent h4').on('click', function() {
			$(this).next('div:not(:animated)').slideToggle();
			$(this).children('span').toggleClass('open');
		});
	});
	</script>
</head>
<body>
<div class="part-1">
	<div id="title-box" class="cf">
		<div id="site-title">
			<h1>千葉 柏	花野井サッカークラブ オフィシャルサイト</h1>
			<div id="logo"><img src="_image/logo.png" alt="花野井サッカークラブ"></div>
		</div>
		<nav>
			<ul class="cf">
				<li><a href="#notice">お知らせ</a></li>
				<li><a href="#team">チーム紹介</a></li>
				<li><a href="#practice">練習について</a></li>
				<li><a href="#coach">コーチ紹介</a></li>
				<li><a href="#now">更新情報</a></li>
				<li><a href="#contact">お問い合せ</a></li>
			</ul>
		</nav>
	</div>
</div>
<div id="mv-wrap">
<div id="mv">
	<ul class="bxslider">
	<li>楽しい。だから、強くなる。</li>
	<li>楽しい。だから、強くなる。</li>
	<li>楽しい。だから、強くなる。</li>
	<li>楽しい。だから、強くなる。</li>
	<li>楽しい。だから、強くなる。</li>
	<li>楽しい。だから、強くなる。</li>
	</ul>
</div>
</div>
<div id="event">
	<p><a href="#new-member"><i class="fa fa-forward"></i>新メンバー大<span class="p120">大</span><span class="p150">大</span>募集中<i class="fa fa-exclamation"></i><i class="fa fa-backward"></i></a></p>
</div>

<?php 
	//お知らせ取得
	try {
		//TODO: 環境に合わせて適宜変更する
		$db = new PDO("mysql:host=localhost;dbname=hananoi", "root", "daw2ghuc");
		$db->query("SET NAMES UTF8");
		
		$sql = "SELECT id, notice_name, notice_detail from notice";
		$sql .= " WHERE published_date >= '". date('Y-m-d'). "'";
		$sql .= " ORDER BY regist_date DESC";
		
		$result = $db->query($sql);
		
		$db = null;
		
	} catch (Exception $e) {
		echo "接続失敗: " . $e->getMessage() . "\n";
		exit();
	}
?>

<div id="notice" class="contents-part cf">
	<h2><span>Notice</span> / お知らせ</h2>
	<div id="notice-contents" class="cf">
		<?php 
		foreach ($result as $row) { ?>
			<div id="sub<?php echo $row['id']?>" class="subContent">
				<h4><span><?php echo $row['notice_name']?></span></h4>
				<div class="subInner">
					<?php echo nl2br($row['notice_detail'])?>
				</div>
			</div>
		<?php }?>
	</div>
</div>

<div id="team" class="contents-part cf">
<h2><span>Team</span> / チーム紹介</h2>
<div id="representative-msg" class="cf">
	<div id="representative-img">
		<img src="_image/representative.png" alt="">
		<p>代表挨拶(野川 亮之)</p>
	</div>
	<div id="representative-p" class="cf">
	<p>我が花野井サッカークラブは柏市北部にあり、創立1984年（昭和59年）6月25日から今年で35年目を迎え、幼稚園から小学6年生までの元気いっぱいのチームです。<br>	
	ボランティアチームとして指導員のライセンスを所得し複数のお父さんコーチにも審判員のライセンスを所得して土日には楽しくCoachingを行っています。<br>
	チームの特徴としては、少年サッカーチームにしては珍しく2つのグラウンドを使用しています。<br>
	花野井小学校グラウンドと柏ビレジ運動広場で、柏ビレジ運動広場は芝のようなコートと、小学生コートしては80M×50Mの広さを誇り、のびのび練習することが可能です。</p>
	</div>
</div>
</div>
<div id="about">
<ul class="front-nav cf">
<li>
	<a href="#practice">Practice<span>練習について</span></a>
</li>
<li>
	<a href="#coach">Coach<span>コーチ紹介</span></a>
</li>
<li>
	<a href="#contact">Contact<span>お問い合せ</span></a>
</li>
</ul>
</div>
<div id="now" class="contents-part cf">
<h2><span>Now</span>/ 更新情報</h2>
<div id="now-contents">
	<div id="newspaper">
		<a href="">
<!-- 	<a href="_image/sample.pdf" target="blank"> -->
	<p id="newspaper-title"><i class="fa fa-chevron-circle-up mar5"></i>花野井通信はこちら
	</p>
	<p id="newspaper-p">Coming Soon…</p>
<!-- 	<p id="newspaper-p">Hananoi News</p>
	 -->	</a>
</div>

<div id="fbBox">
	<p id="fb-title">最新情報はFacebookでチェック<i class="fa fa-check-circle mal5"></i></p>
	<div class="fb-page">
		<img src="_image/fb-sample.jpg">
	</div>
<!-- <div class="fb-page" data-href="https://www.facebook.com/miraitasu.IT/" data-tabs="timeline" data-width="320" data-height="215" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/miraitasu.IT/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/miraitasu.IT/">sample</a></blockquote></div> -->
</div>
<div id="past-blog">
	<p id="blog-title"><i class="fa fa-chevron-circle-up mar5"></i>過去のBlogはこちら</p>
		<a href="https://blog.goo.ne.jp/since1984-8701" target="blank">
		<img src="_image/blog-banner.png" alt="花野井SCサポーターBlog">
		</a>
</div>
</div>
</div>
<div id="practice" class="contents-part cf">
<h2><span>Practice</span> / 練習について</h2>
<div id="practice-contents" class="cf">
<div id="practice-contents1-2" class="cf mab80">
<div class="practice-sb01">
	<p class="practice-sbt">練習時間</p>
	<dl>
		<dt>第2・第4土曜日 花野井小学校校庭にて</dt>
		<dd class="mab20">
			<ul>
			<li><i class="fa fa-caret-right mar5"></i>9時～12時（3～6年)</li>
			<li><i class="fa fa-caret-right mar5"></i>9時～11時（幼～2年)</li>
			</ul>
			<p>※練習内容によって練習時間は変わることがあります。</p>
		</dd>
		<dt>日曜日 花野井小学校校庭にて</dt>
		<dd class="mab20">
			<ul>
			<li><i class="fa fa-caret-right mar5"></i>9時～13時（3～6年)</li>
			<li><i class="fa fa-caret-right mar5"></i>9時～12時（幼～2年)</li>
			</ul>
			<p>※練習内容によって練習時間は変わることがあります。</p>
		</dd>
		<dt>祝日 ビレッジ運動場にて</dt>
		<dd>
			<ul>
			<li><i class="fa fa-caret-right mar5"></i>9時～13時（3～6年)</li>
			<li><i class="fa fa-caret-right mar5"></i>9時～12時（幼～2年)</li>
			</ul>
			<p>※練習内容によって練習時間は変わることがあります。</p>
		</dd>
	</dl>
</div>
<div class="practice-sb02">
	<p class="practice-sbt">持ち物</p>
	<dl>
		<dt>練習時の持ち物</dt>
		<dd class="mab20">
			<ul class="cf">
			<li>(1)ボール</li>
			<li>(2)スパイク</li>
			<li>(3)すねあて</li>
			<li>(4)水筒(スポーツドリンクなど)</li>
			<li>(5)タオル</li>
			<li>(6)着替え</li>
			</ul>
		</dd>
		<dt>試合時の持ち物</dt>
		<dd>
			<p class="attention">※試合用ユニフォーム着用</p>
			<ul class="cf">
			<li>(1)ボール</li>
			<li>(2)スパイク</li>
			<li>(3)すねあて</li>
			<li>(4)試合用ボトル(氷のみ半分入れる)</li>
			<li>(5)汗拭きタオル</li>
			<li>(6)着替え</li>
			<li>(7)練習用ユニフォーム</li>
			<li>(8)昼食(おにぎりのみ)</li>
			<li>(9)500mlのペットボトルに水を凍らせたもの</li>
			<li><span class="col-or">夏季</span>…帽子、氷のブロック(固まり)</li>
			<li><span class="col-bl">冬季</span>…手袋、防寒着</li>
			<li><span class="attention">注意</span>…移動時は運動靴を着用</li>
			</ul>
	</dd>
	</dl>
</div>
</div>
<div class="practice-sb03 cf">
	<div id="kids01">
	<img src="_image/kids02.png" alt="">
	</div>
	<p class="practice-sbt">注意事項</p>
	<ul class="cf">
		<li><i class="fa fa-check mar5 attention"></i>全ての持ち物に記名をして下さい！</li>
		<li><i class="fa fa-check mar5 attention"></i>夏季の練習時は、飲み物を1.5リットル以上持たせてください。</li>
		<li><i class="fa fa-check mar5 attention"></i>帽子着用も熱中症予防になります。 </li>
		<li><i class="fa fa-check mar5 attention"></i>グラウンドは2つあります。確認してから家を出ましょう。</li>
		<li><i class="fa fa-check mar5 attention"></i>試合は集合時間から始まっています。遅刻しないよう、忘れ物しないようにね！</li>
		<li><i class="fa fa-check mar5 attention"></i>家に帰ったら、ユニフォームの泥や砂を家の中にばらまかないように注意しよう。</li>
		<li><i class="fa fa-check mar5 attention"></i>いつもユニフォームを洗ってくれているお母さんに感謝しよう！</li>
		<li><i class="fa fa-check mar5 attention"></i>練習後は手洗い、うがいは忘れずに。</li>
		<li><i class="fa fa-check mar5 attention"></i>練習では水分補給が重要なポイント。ドリンクの入った水筒を忘れずに！</li>
		<li><i class="fa fa-check mar5 attention"></i>低学年は靴のひもが結べるように家で練習してね！</li>
		<li><i class="fa fa-check mar5 attention"></i>雨の日はメール連絡が入ります。</li>
		<li>当番の保護者の方、よろしくお願いします。</li>
	</ul>
</div>
</div>
</div>
<div id="coach" class="contents-part cf">
<h2><span>Coach</span> / コーチ紹介</h2>
<p class="coach-hmsg">ワクワクするから、もっと挑戦したくなる。<br>
一緒に楽しく練習しよう！</p>
<div id="coach-contents" class="cf">
	<dl class="cf">
		<dt>ヘッド・3年コーチ</dt>
		<dd class="coach-img"><img src="_image/coach/nogawa-coach.png" alt="野川コーチ"></dd>
		<dd class="coach-name">野川コーチ</dd>
		<dd>
			<ul class="cf">
			<li>4級審判員</li>
			<li>D級公認指導者</li>
			<li>ライセンス</li>
			</ul>
		</dd>
	</dl>
	<dl class="cf">
		<dt>幼・1・２年コーチ</dt>
		<dd class="coach-img"><img src="_image/coach/mori-coach.png" alt="森コーチ"></dd>
		<dd class="coach-name">森コーチ</dd>
		<dd>
			<ul class="cf">
			<li>---</li>
			</ul>
		</dd>
	</dl>
	<dl class="cf">
		<dt>幼・1・２年コーチ</dt>
		<dd class="coach-img"><img src="_image/coach/kakuta-coach.png" alt="角田コーチ"></dd>
		<dd class="coach-name">角田コーチ</dd>
		<dd>
			<ul class="cf">
			<li>---</li>
			</ul>
		</dd>
	</dl>
	<dl class="cf">
		<dt>幼・1・２年コーチ</dt>
		<dd class="coach-img"><img src="_image/coach/kanano-coach.png" alt="金野コーチ"></dd>
		<dd class="coach-name">金野コーチ</dd>
		<dd>
			<ul class="cf">
			<li>---</li>
			</ul>
		</dd>
	</dl>
	<dl class="cf">
		<dt>３年コーチ</dt>
		<dd class="coach-img"><img src="_image/coach/suzuki-coach.png" alt="鈴木コーチ"></dd>
		<dd class="coach-name">鈴木コーチ</dd>
		<dd>
			<ul class="cf">
			<li>---</li>
			</ul>
		</dd>
	</dl>
	<dl class="cf">
		<dt>4年コーチ</dt>
		<dd class="coach-img"><img src="_image/coach/kashiwagi-coach.png" alt="柏木コーチ"></dd>
		<dd class="coach-name">柏木コーチ</dd>
		<dd>
			<ul class="cf">
			<li>---</li>
			</ul>
		</dd>
	</dl>
	<dl class="cf">
		<dt>コーチ</dt>
		<dd class="coach-img"><img src="_image/coach/anzai-coach.png" alt="安斎コーチ"></dd>
		<dd class="coach-name">安斎コーチ</dd>
		<dd>
			<ul class="cf">
			<li>---</li>
			</ul>
		</dd>
	</dl>
	<dl class="cf">
		<dt>コーチ</dt>
		<dd class="coach-img"><img src="_image/coach/ogawa-coach.png" alt="小川コーチ"></dd>
		<dd class="coach-name">小川コーチ</dd>
		<dd>
			<ul class="cf">
			<li>---</li>
			</ul>
		</dd>
	</dl>
	<dl class="cf">
		<dt>コーチ</dt>
		<dd class="coach-img"><img src="_image/coach/katase-coach.png" alt="片瀬コーチ"></dd>
		<dd class="coach-name">片瀬コーチ</dd>
		<dd>
			<ul class="cf">
			<li>---</li>
			</ul>
		</dd>
	</dl>
	<dl class="cf">
		<dt>コーチ</dt>
		<dd class="coach-img"><img src="_image/coach/maesaki-coach.png" alt="前崎コーチ"></dd>
		<dd class="coach-name">前崎コーチ</dd>
		<dd>
			<ul class="cf">
			<li>---</li>
			</ul>
		</dd>
	</dl>
	<dl class="cf">
		<dt>コーチ</dt>
		<dd class="coach-img"><img src="_image/coach/noda-coach.png" alt="野田コーチ"></dd>
		<dd class="coach-name">野田コーチ</dd>
		<dd>
			<ul class="cf">
			<li>---</li>
			</ul>
		</dd>
	</dl>
</div>
</div>
<div id="new-member" class="contents-part cf">
<h2><span>NewMember</span></h2>
<div id="newmem-contents">
	<div class="nemem-hmsg">
	<p>花野井サッカークラブで<br>一緒にプレイしてくれる部員を大募集<i class="fa fa-exclamation mal5"></i><i class="fa fa-exclamation mal5"></i></p>
	</div>
	<div id="new-member01">
		<div id="new-member01-img">
		<img src="_image/new-member.png" alt="">
		</div>
		<div class="new-mem-msg01">
		<p>少しでもサッカーに興味がある人はもちろん、見学だけしてみたい人もＯＫ!!<br>
		入会希望または質問等は<a href="#contact">お問い合せ<i class="fa fa-envelope mal5"></i></a>にてお気軽にご連絡ください。<br>
		いろんな商品が貰えるミニサッカー大会なども随時開催しております。<br>
		無理な勧誘は致しませんのでご安心ください。<br>
	    コーチ・スタッフ一同ご連絡をお待ちしております。</p>
	    </div>
	    <div class="new-mem-msg02">
		<dl>
			<dt>時間</dt>
			<dd>第1・3土曜日と毎日曜日の9時～最大13時</dd>
			<dd class="mab10">(曜日・学年によって変わります。<a href="#practice">詳しくはコチラ<i class="mal5 fa fa-arrow-circle-right"></i></a>)</dd>
			<dt>場所</dt>
			<dd>花野井小学校または花野井中学予定地(柏ビレジ)</dd>
		</dl>
	    </div>
	</div>
	<div id="new-mem-contact">
	    <p><a href="#contact">見学・入会に関する<br>
	    	お問い合せはこちらから</a></p>
	</div>
</div>
</div>
<div id="contact" class="contents-part cf">
<h2><span>Contact</span> / お問い合せ</h2>
<div id="contact-contents">
<!-- 	<p class="contact-msg">花野井サッカークラブに関するご質問や<br>
<span class="br-as">ご相談等のお問い合せは</span>下記のフォームからお送り下さい。</p> -->
	<p class="contact-msg">お問い合せフォームはただいま準備中です。<br>
	少々お待ちください。</p>
<!-- 	<form action="sendmail.php" method="post">
<dl>
	<dt>お名前</dt>
	<dd><input type="text"></dd>
	<dt>メールアドレス</dt>
	<dd><input type="text"></dd>
	<dt>お問い合せ内容</dt>
	<dd><textarea name="" id="" cols="30" rows="10"></textarea></dd>
</dl>
<div id="entry-btn">
<button type="submit">送信</button>
</div>
</form> -->
</div>
</div>
<footer><p><small>Copyright (c) 花野井サッカークラブ All Rights Reserved.</small></p></footer>
<!-- <p id="pageTop"><a href=""><img src="_image/menu-top.png" alt="ページトップへ"></a></p>
<p id="menuNav"><img src="_image/menu-navi.png" alt="ページトップへ"></p> -->
<p id="pageTop"><a href="">TOP</a></p>
<p id="menuNav">MENU</p>
<div id="overlay">
<p id="close"><i class="fa fa-times mar5" aria-hidden="true"></i>CLOSE</p>
<ul>
	<li><a href="#notice">Notice<span>お知らせ</span></a></li>
	<li><a href="#team">Team<span>チーム紹介</span></a></li>
	<li><a href="#practice">Practice<span>練習について</span></a></li>
	<li><a href="#coach">Coach<span>コーチ紹介</span></a></li>
	<li><a href="#now">Now<span>更新情報</span></a></li>
	<li><a href="#new-member">Member<span>メンバー募集</span></a></li>
	<li><a href="#contact">Contact<span>お問い合せ</span></a></li>
</ul>
</div>
</body>
</html>