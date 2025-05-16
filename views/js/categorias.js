$("#form-categoria").submit(function (e) {
    e.preventDefault();
    var datos = new FormData($(this)[0])
    console.log("guardar")

    $.ajax({
        url: 'ajax/ajaxCategoria.php',
        type: 'POST',
        data: datos,
        processData: false,
        contentType: false,
        success: function (respuesta){
            if(respuesta.trim() == "ok"){
                console.log("Guardado "+respuesta)
                alert("Ingresado con éxito")
            }
            
        }
    })
})