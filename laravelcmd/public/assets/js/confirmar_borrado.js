$(function(){

    //Activar tooltips
    $("[data-toggle='tooltip']").tooltip();

    //Mensaje de confirmacion de borrado
    $(".form_borrado_panel").submit(function(e){
        //Obtener nombre del boton pulsado
        var nombre_boton_pulsado=$("button[type=submit][clicked=true]");

        console.log(nombre_boton_pulsado);

        //Cambiar texto segun nombre del boton pulsado
        switch(nombre_boton_pulsado){
            case 'btn_delete_usuario':{
                texto="¡Atención, va a borrar un usuario! Se borrarán también todas las opiniones escritas por ese usuario. Esta acción es irreversible, ¿desea continuar?";
                break;
            }
            case 'btn_delete_libro':{
                texto="¡Atención, va a borrar un libro! Se borrarán también todas las opiniones que los usuarios han escrito para ese libro y se eliminará de la lista de favoritos de todos los usuarios" +
                    ". Esta acción es irreversible, ¿desea continuar?";
                break;
            }
            case 'btn_delete_categoria':{
                texto="¡Atención, va a borrar una categoria! Se borrarán también todos los libros pertenecientes a esa categoria" +
                    ". Esta acción es irreversible, ¿desea continuar?";
                break;
            }
            default:{
                texto="Va a borrar un elemento: tenga en cuenta que esta acción es irreversible. ¿Desea continuar?";
                break;
            }
        }

        //Mostrar mensaje
        var respuesta=confirm(texto);

        if (respuesta)
            this.submit();
        else
            e.preventDefault();

    });
});