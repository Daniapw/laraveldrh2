$(function(){
   $("#editar_review").click(function(){

      $("#review-usuario").toggleClass("d-none", 1000);
      $("#form-review").toggleClass("d-none");

      $("#texto_review_editar").text($("#texto_review_original").text());

      //Cambiar texto del boton
      if($("#texto-boton").text()=="Dejar de editar") 
         $("#texto-boton").text("Editar");
      else
         $("#texto-boton").text("Dejar de editar");


      //Cambiar icono y color del boton
      $("#icono-btn-editar").toggleClass("fa-times");
      $("#icono-btn-editar").toggleClass("fa-edit");

      $("#editar_review").toggleClass("btn-primary");
      $("#editar_review").toggleClass("btn-danger");

   });
});