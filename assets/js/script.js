$(function(){
   $("#view-area").css('overflow-y','hidden').css("height", "100vh")

   $("#button-group a").bind('click', function(){
      
      let link = $(this).attr('data-link');
      $("#button-group a").removeClass('active')
      $(this).addClass('active')
      
      $("#view-area").attr('src', link)

   });

});