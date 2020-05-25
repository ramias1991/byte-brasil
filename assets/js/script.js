$(function(){
   $(".add_edit_curso").bind("click", function(){
      var link = $(this).attr('href')
      $.ajax({
         url:link,
         type:'GET',
         success:function(html){
            $(".modal-content").html(html)
         }
      })
   })

});