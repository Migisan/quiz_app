'use strict';

$(function(){
  /* 共通 */
  // transiton回避策
  $('body').removeClass('preload');

  // ハンバーガーメニュー
  $('#hamburger').click(function(){
    console.log('ハンバーガーメニュークリックされました');
    if($(this).hasClass('active')){
      $(this).removeClass('active');
      $('#nav_menu').removeClass('open');
    }else{
      $(this).addClass('active');
      $('#nav_menu').addClass('open');
    }
    $('#hamburger_mask').toggle();
  });

  // ハンバーガーメニュー背景
  $('#hamburger_mask').click(function(){
    if($('#hamburger').hasClass('active')){
      $('#hamburger').removeClass('active');
      $('#nav_menu').removeClass('open');
      $(this).hide();
    }
  });

  // 削除確認
  $('#delete_btn').click(function(){
		if(!window.confirm('本当に削除しますか？')){
			return false;
		}
	});

  /* レスポンシブ */
  // タッチイベント 
  // $('a')
  // .on('touchstart',function(){
  //   $(this).addClass('sp_hover');
  // }).on('touchend',function(){
  //   $(this).removeClass('sp_hover');
  // });
});