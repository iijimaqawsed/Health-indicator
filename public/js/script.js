'use strict';

/* ===== BMI表示欄のもっと見るボタンの処理 ===== */
/* ここには、表示するリストの数を指定します。 */
var moreNum = 5;

/* 表示するリストの数以降のリストを隠しておきます。 */
$('.b-list-item:nth-child(n + ' + (moreNum + 1) + ')').addClass('is-hidden');

/* 全てのリストを表示したら「もっとみる」ボタンをフェードアウトします。 */
$('.b-list-btn').on('click', function() {
  $('.b-list-item.is-hidden').slice(0, moreNum).removeClass('is-hidden');
  if ($('.b-list-item.is-hidden').length === 0) {
    $('.b-list-btn').fadeOut();
  }
});

/* リストの数が、表示するリストの数以下だった場合、「もっとみる」ボタンを非表示にします。 */
$(function() {
  var b_list = $(".table .b-list-item").length;
  if (b_list-1 < moreNum) {
    $('.b-list-btn').addClass('is-btn-hidden');
  }
});

/* PFC表示欄のもっと見るボタンの処理 */
$('.p-list-item:nth-child(n + ' + (moreNum + 1) + ')').addClass('is-hidden');

$('.p-list-btn').on('click', function() {
  $('.p-list-item.is-hidden').slice(0, moreNum).removeClass('is-hidden');
  if ($('.p-list-item.is-hidden').length === 0) {
    $('.p-list-btn').fadeOut();
  }
});

$(function() {
  var p_list = $(".table .p-list-item").length;
    if (p_list-1 < moreNum) {
      $('.p-list-btn').addClass('is-btn-hidden');
  }
});

/* ===== 削除機能 =====  */
$( '.delete' ).on( 'click',function(event) {
  if(confirm('本当に削除しますか？')) {

    // 削除ボタンの親要素trを取得
    var element = $(this).parent().parent();
    // クラス名の取得
    var ele_class = element.attr('class');

    // 取得した親要素のクラス名によって変数に入れる値を変える
    if(ele_class === 'b-list-item'){
      // ajaxでアクセスするURL(ルーティングの削除メソッド)に使う部品の生成
      var id = element.data('bmi-id');
      var target = '/bmi/';
    } else if(ele_class === 'p-list-item') {
      var id = element.data('pfc-id');
      var target = '/pfc/';
    }
    console.log(target);
    console.log(id);

    //ajax処理スタート
    $.ajax({
      headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      },
      url: target + id + '/delete',
      method: 'GET',
      id: id,
      success: function(){
        element.addClass('result-hidden');
      },
      error: function(){
        //通信が失敗した場合の処理
      }
    });

    // aタグによるURLの変更（＃）、画面上部に移動動作をキャンセル
    return false;

} else{
  event.preventDefault();
} });

/* ===== ハンバーガーメニュー =====  */
$(".openbtn1").click(function () {//ボタンがクリックされたら
  $(this).toggleClass('active');//ボタン自身に activeクラスを付与し
    $("#g-nav").toggleClass('panelactive');//ナビゲーションにpanelactiveクラスを付与
});

$("#g-nav a").click(function () {//ナビゲーションのリンクがクリックされたら
    $(".openbtn1").removeClass('active');//ボタンの activeクラスを除去し
    $("#g-nav").removeClass('panelactive');//ナビゲーションのpanelactiveクラスも除去
});
