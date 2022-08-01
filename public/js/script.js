'use strict';
/* BMI表示欄のもっと見るボタンの処理 */
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
  console.log(b_list);
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
      console.log(p_list);
  }
});

// 削除機能のconfirm実装
$( '.delete' ).on( 'click',function(event) {
  if(confirm('本当に削除しますか？')) {
} else{
  event.preventDefault();
} });