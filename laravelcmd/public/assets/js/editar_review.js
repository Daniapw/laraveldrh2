$(function(){
   $("#editar_review").click(function(){

      $("#review-usuario").toggleClass("d-none", 1000);
      $("#form-review").toggleClass("d-none");

      $("#texto_review_editar").text($("#texto_review_original").text());

      console.log("hola");

      //Cambiar texto del boton
      if($(this).text()=="Dejar de editar")
         $(this).text("Editar")
      else
         $(this).text("Dejar de editar");
   });
});