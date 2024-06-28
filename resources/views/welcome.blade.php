<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <script src="https://kit.fontawesome.com/f07df2721d.js" crossorigin="anonymous"></script>

</head>

<body>
  <h1 class="text-center p 3">--CRUD Usuario--</h1>


  <!-- Modal Ingresar -->
  <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"> Ingresar Datos</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('usuario.store')}}" method="post">
            @csrf

            <!--<div class="mb-3">
          <label for="id" class="form-label">Id</label>
          <input type="text" class="form-control" id="txtid" name="id">

        </div>-->

            <div class="mb-3">
              <label for="apodo" class="form-label">Apodo</label>
              <input type="texto" class="form-control" id="txtapodo" name="apodo">

            </div>
            <div class="mb-3">
              <label for="contrasenha" class="form-label">Contrasenha</label>
              <input type="texto" class="form-control" id="txtcontrasenha" name="contrasenha">

            </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        </form>
      </div>
    </div>
  </div>


  <div class="p-5 table-responsive">
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregar"> Agregar usuario </button>
    <table class="table table-striped table-bordered  table-hover">

      <thead class="bg-primary text-white">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">APODO</th>
          <th scope="col">CONTRASENHA</th>
          <th></th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        @foreach ($datos as $item)
        <tr>
          <th>{{$item->id}} </th>
          <td>{{$item->apodo}}</td>
          <td>{{$item->contrasenha}}</td>
          <td>
            <a href="" data-bs-toggle="modal" data-bs-target="#modalEditar{{$item->id}}" class="btn btn-warning btn-sn"><i class="fa-solid fa-pen-to-square"></i></a>
            <a href="" class="btn btn-danger btn-sn"><i class="fa-solid fa-trash"></i></a>
          </td>

          <!-- Modal modificar -->
          <div class="modal fade" id="modalEditar{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar los Datos</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{route('usuario.update')}}" method="post">
                    <div class="mb-3">
                      <label for="id" class="form-label">Id</label>
                      <input type="text" class="form-control" id="txtid" name="id" value="{{ $item->id }}" required>

                    </div>

                    <div class="mb-3">
                      <label for="apodo" class="form-label">Apodo</label>
                      <input type="texto" class="form-control" id="txtapodo" name="apodo"  value="{{ $item->apodo }}" required>

                    </div>
                    <div class="mb-3">
                      <label for="contrasenha" class="form-label">Contrasenha</label>
                      <input type="texto" class="form-control" id="txtcontrasenha" name="contrasenha"  value="{{ $item->contrasenha}}" required>
                        
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary">Modificar</button>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>
        </tr>

        @endforeach
      </tbody>
    </table>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>