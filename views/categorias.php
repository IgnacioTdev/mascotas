<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.0/css/dataTables.dataTables.min.css">
  </head>
  <body>
  

    <div class="container">
        <h1>Categorias</h1>

        <div class="col6">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#categoriasModal"> Nueva Categoria</button>
        </div>

        <hr>

        <table id="myTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>1</td>
                    <td>Juguetes</td>
                    <td>editar eliminar</td>
                </tr>

            </tbody>
        </table>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="categoriasModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Categoria</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
        <form action="" id="form-categoria" method="POST">

            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Nombre Categoría</label>
                <input type="text" class="form-control" id="formGroupExampleInput"
                name="categoria" placeholder="Ingrese una categoria" required>
            </div>

            <input type="hidden" name="tipoOperacion" value="nuevaCategoria">

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>

        </form>
        </div>
    </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>

    <script>
        let table = new DataTable('#myTable');
    </script>

    <script src="views/js/categorias.js"></script>

  </body>
</html>