$(function(){
   $(".add_edit_curso_vaga").bind("click", function(e){
      e.preventDefault()
      let link = $(this).attr('href')
      $.ajax({
         url:link,
         type:'GET',
         success:function(html){
            $(".modal-content").html(html)
         }
      })
   })

   $('.anuncia-vaga').bind('click', function(e){
      e.preventDefault()
      
      let link = $(this).attr('data-link')

      $.ajax({
         url:link,
         type:'GET',
         success:function(html){
            $(".modal-content-anunciar-vaga").html(html)
         }
      })
   })

   $('.alterar-senha').bind('click', function(e){
      e.preventDefault();
      
      let link = $(this).attr('href');

      $.ajax({
         url:link,
         type:'GET',
         success:function(html){
            $('.modal-content-editar-senha').html(html)
         }
      })

   })

   $('.excluir-btn').bind('click', function(e){
      e.preventDefault()
      var cursoVaga = $(this).attr('data-link')
      var link = $(this).attr('href')
      if(cursoVaga == 'Curso'){
         var confirma = window.confirm("Você deseja realmente excluir este "+cursoVaga+"?")
      } else if (cursoVaga == 'Vaga'){
         var confirma = window.confirm("Você deseja realmente excluir esta "+cursoVaga+"?")
      }

      if(confirma){
         window.location.href = link
      }
   })

});