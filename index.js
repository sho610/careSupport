// ハンバーガー
$(".hamburger-btn").click(function(){
  $(this).toggleClass("active")
  $(".header-item-wrap").toggleClass("active");
  $("header").toggleClass("active");
  // $(".heading").toggleClass("active");
})



//アコーディオン
// if($(window).width() >= 768){
//   $(".acc-title").on({
//     "mouseenter":function() {
//       // $(this).toggleClass("open");
//       // $(this).css("color","#005CAF");
//       // $(this).find("img").attr("src","./assets/img/tab_arrow_b.png")
//       $(".acc-content").css("display","block");
//     },
//     "mouseleave":function(){
//       // $(this).toggleClass("open");
//       // $(this).css("color","#333333");
//       // $(this).find("img").attr("src","./assets/img/tab_arrow.png")
//       $(".acc-content").css("display","none");
//     }
//   })
// }else{
//   $(".acc-title").on("click", function () {
//     // クリックした次の要素を開閉
//     $(this).children(".acc-content").slideToggle(300);
//     // タイトルにopenクラスを付け外しして矢印の向きを変更
//     $(this).toggleClass("open", 300);
//   });
// }

