$(function(){
var topBtn=$('#pageTop');
topBtn.hide();
 
//◇ボタンの表示設定
$(window).scroll(function(){
  if($(this).scrollTop()>80){
    //---- 画面を80pxスクロールしたら、ボタンを表示する
    topBtn.fadeIn();
  }else{
    //---- 画面が80pxより上なら、ボタンを表示しない
    topBtn.fadeOut();
  } 
});
 
// ◇ボタンをクリックしたら、スクロールして上に戻る
topBtn.click(function(){
  $('body,html').animate({
  scrollTop: 0},300);
  return false;
});

});

$(function() {
     $("#menuNav").click(function() {
           $("#overlay").fadeIn();　/*ふわっと表示*/
 });
     $("#close,#overlay li").click(function() {
           $("#overlay").fadeOut();　/*ふわっと消える*/
 });
});
